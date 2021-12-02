<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepositoryInterface;
use App\Repository\PlansRepositoryInterface;
use App\User;
use App\Plans;
use App\UsersPlanningsDeposits;

class HomeController extends Controller
{
    private $userRepository;
    private $plansRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, UserRepositoryInterface $userRepository, PlansRepositoryInterface $plansRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->plansRepository = $plansRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plans = Plans::with('images')->get();
        $user = Auth::user();
        $usersPlannings = $this->userRepository->findByUserOngoingPlannings($user->id);

        $transactionUserPlans = [];
        $total_deposits = 0;

        if($usersPlannings) {
            $transactionUserPlans = UsersPlanningsDeposits::where('users_plannings_id', '=', $usersPlannings->id)->get();

            $deposits = DB::table('users_plannings_deposits')
                ->select('users_plannings_id', DB::raw('SUM(nominal) as total_deposits'))
                ->where('users_plannings_id', '=', $usersPlannings->id)
                ->groupBy('users_plannings_id')
                // ->havingRaw('SUM(price) > ?', [2500])
                ->first();
        }

        return view('home', [
            'plans' => $plans,
            'usersPlannings' => $usersPlannings,
            'transactionUserPlans' => $transactionUserPlans,
            'total_deposits' => $deposits->total_deposits,
        ]);
    }
}
