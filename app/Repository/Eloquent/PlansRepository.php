<?php

namespace App\Repository\Eloquent;

use App\Plans;
use App\Repository\PlansRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PlansRepository extends BaseRepository implements PlansRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param Plans $model
    */
   public function __construct(Plans $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }

   public function findById($id)
   {
        return Plans::find($id)->first();
   }
}
