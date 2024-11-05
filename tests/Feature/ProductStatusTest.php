<?php

namespace Tests\Feature;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductStatusTest extends TestCase
{
    use RefreshDatabase;

    public function testCanUpdatesProductStatusAndDate()
    {
        $product = Product::factory()->create([
            "name" => "Test Product",
            "price" => 100.00,
            "stock" => 10,
            "description" => "Test Description",
            "status" => ProductStatus::IN_STOCK,
        ]);

        $this->json("POST", route("products.updateStatus", $product->id), [
            "status" => ProductStatus::OUT_OF_STOCK,
        ])
            ->assertStatus(200);

        $this->assertEquals(ProductStatus::OUT_OF_STOCK, $product->fresh()->status);
        $this->assertNotNull($product->fresh()->status_updated_at);
    }

    public function testCanNotUpdateDateIfStatusIsUnchanged()
    {
        $product = Product::factory()->create([
            "name" => "Test Product",
            "price" => 100.00,
            "stock" => 10,
            "description" => "Test Description",
            "status" => ProductStatus::IN_STOCK,
            "status_updated_at" => now(),
        ]);

        $initialUpdatedAt = $product->status_updated_at;

        $this->json("POST", route("products.updateStatus", $product->id), [
            "status" => ProductStatus::IN_STOCK,
        ])
            ->assertStatus(200);

        $this->assertEquals(ProductStatus::IN_STOCK, $product->fresh()->status);
        $this->assertEquals($initialUpdatedAt, $product->fresh()->status_updated_at);
    }

    public function testFailsIfStatusIsInvalid()
    {
        $product = Product::factory()->create([
            "name" => "Test Product",
            "price" => 100.00,
            "stock" => 10,
            "description" => "Test Description",
            "status" => ProductStatus::IN_STOCK,
        ]);


        $this->json("POST", route("products.updateStatus", $product->id), [
            "status" => "invalid-status",
        ])
            ->assertStatus(422);
    }
}
