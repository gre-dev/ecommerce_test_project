<?php
namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;

interface ReviewRepositoryInterface
{
    /**
    * @param integer $id
    * @return collection
    */

    public function all_reviews_for_product($id): Collection;
}