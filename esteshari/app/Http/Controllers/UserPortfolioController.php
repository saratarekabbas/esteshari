<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPortfolio;
use Illuminate\Http\Request;


class UserPortfolioController extends Controller
{
    public function physicianPortfolioIndex()
    {
        return view('physician.portfolio.portfolio_view');
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
