<?php

namespace App\Repository\Eloquent;

use App\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\UsersPlannings;
use App\UsersPlanningsDeposits;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
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

   public function findByUserOngoingPlannings($userId)
   {
        $result = DB::table('users_plannings')
            ->select('users_plannings.*', 'images.id as images_id', 'images.file_path')
            ->join('images', 'users_plannings.images_id', '=', 'images.id')
            ->whereRaw('TIMESTAMPDIFF(DAY,users_plannings.created_at,CURDATE()) < 365')
            ->where('users_id', '=', $userId)
            ->first();

        return $result;
   }

   public function findByIdUsersPlannings($usersPlanningsId)
   {
        $result = UsersPlannings::find($usersPlanningsId)->first();

        return $result;
   }

   public function findUserTransactionByUsersPlanningsId($usersPlanningsId)
   {
        $result = DB::table('users_plannings_deposits')
            ->select('*')
            ->where('users_plannings_id', '=', $usersPlanningsId)
            ->get();

        return $result;
   }
}
