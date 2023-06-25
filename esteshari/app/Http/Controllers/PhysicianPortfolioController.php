<?php

namespace App\Http\Controllers;

use App\Models\PhysicianPricing;
use App\Models\User;
use App\Models\UserPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PhysicianPortfolioController extends Controller
{
    public function physicianPortfolioIndex()
    {
        $user = Auth::user();

        $physician = User::where('id', $user->id)->with('personalInformation')->with('workExperience')->first();
        $pricing = PhysicianPricing::where('user_id', $user->id)->first();

        return view('physician.portfolio.portfolio_view', compact('physician','pricing'));
    }

    public function physicianPortfolioAdd(Request $request)
    {
        return view('physician.portfolio.portfolio_manage');
    }

    public function patientPortfolioIndex()
    {
        return view('patient.portfolio.portfolio_view');
    }

    public function patientPortfolioAdd(Request $request)
    {
        return view('patient.portfolio.portfolio_manage');
    }
}
