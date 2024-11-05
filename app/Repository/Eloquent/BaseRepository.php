<?php   

namespace App\Repository\Eloquent;   

use App\Repository\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{     
    /**      
     * @var Model      
     */     
     protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
   /**
    *
    * @return Collection
    */
    public function all() :Collection
    {
        return $this->model->all();
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
       /**
    * @param array $attributes
    *@param integer $id
    * @return Model
    */
    public function update(array $attributes , $id): Model
    {
        return $this->model->create($attributes , $id);
    }
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

     
    public function delete($id)
    {
        return $this->model->delete($id);
    }
}