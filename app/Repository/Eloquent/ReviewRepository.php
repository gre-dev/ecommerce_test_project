<?php

namespace App\Repository\Eloquent;

use App\Model\User;
use App\Repository\ReviewRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Review;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param Review $model
    */
   public function __construct(Review $model)
   {
       parent::__construct($model);
   }

   /**
    * @param integer $id
    * @return Collection
    */
    public function all_reviews_for_product($id) :Collection
    {
        return $this->model->where('product_id',$id)->with('user')->orderBy('id','desc')->get();
    }

}