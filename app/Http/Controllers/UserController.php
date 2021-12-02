<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepositoryInterface;
use App\Repository\PlansRepositoryInterface;
use App\Plans;
use App\UsersPlannings;

class UserController extends Controller
{
    private $userRepository;
    private $plansRepository;

    public function __construct(UserRepositoryInterface $userRepository, PlansRepositoryInterface $plansRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->plansRepository = $plansRepository;
    }

    public function createPlans(Request $request, $plansId)
    {
        $plans = Plans::with('images')->where('id', '=', $plansId)->first();

        $user = Auth::user();
        $userPlans = $this->userRepository->findByUserOngoingPlannings($user->id);

        if (!$userPlans) {
            $data = [
                'plans_id' => $plans->id,
                'plans' => $plans->plans,
                'price' => $plans->price,
                'description' => $plans->description,
                'users_id' => $user->id,
                'images_id' => $plans->images->id,
                // 'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ];

            $store = \App\UsersPlannings::create($data);
        }

        return redirect()->route('home');
    }

    public function userDepositCreate(Request $request, $id)
    {
        if (!$id || !$request->deposit) {
            return redirect()->route('home');
        }

        $usersPlannings = UsersPlannings::where('id', '=', $id)->first(['users_plannings.*']);

        $data = [
            'users_plannings_id' => $usersPlannings->id,
            'nominal' => $request->deposit,
            // 'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ];

        $store = \App\UsersPlanningsDeposits::create($data);

        return redirect()->route('home');
    }
}
