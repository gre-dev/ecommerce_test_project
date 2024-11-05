<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductReviewTest extends TestCase
{
    use RefreshDatabase;

    public function testCanShowProductWithReviews()
    {
        $user = User::factory()->create();

        $product = Product::factory()->create();

        $review = Review::factory()->create([
            "product_id" => $product->id,
            "user_id" => $user->id,
        ]);

        $response = $this->get(route("products.show", $product->id));

        $response->assertStatus(200)
            ->assertViewIs("products.show")
            ->assertViewHas("product", $product);

        $this->assertCount(1, $product->reviews);
        $this->assertEquals($review->comment, $product->reviews->first()->comment);
    }

    public function testCanStoreReviewForProduct()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $product = Product::factory()->create();

        $rating = random_int(1, 5);

        $reviewData = [
            "rating" => $rating,
        ];

        $response = $this->post(route("products.reviews.store", $product->id), $reviewData);

        $response->assertRedirect(route("products.show", $product->id))
            ->assertSessionHas("success", "Review added successfully.");

        $this->assertDatabaseHas("reviews", [
            "product_id" => $product->id,
            "rating" => $rating,
            "user_id" => $user->id,
        ]);
    }

    public function testCannotStoreInvalidReview()
    {
        $user = $this->actingAs(User::factory()->create());

        $product = Product::factory()->create();

        $invalidReviewData = [
            "rating" => 6,
        ];

        $response = $this->post(route("products.reviews.store", $product->id), $invalidReviewData);

        $response->assertStatus(302);
    }
}
