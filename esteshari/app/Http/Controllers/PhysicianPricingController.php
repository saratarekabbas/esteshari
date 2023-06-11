<?php

namespace App\Http\Controllers;

use App\Models\PhysicianPricing;
use App\Models\PhysicianSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhysicianPricingController extends Controller
{
    public function index()
    {
        $physician = Auth::user();
        $pricing = PhysicianPricing::where('user_id', $physician->id)->first();
        return view('physician.finances.session_pricing', compact('pricing'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'cost' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
            'discountedCost' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|lt:cost|gt:0',
            'currency' => 'required|string',
        ]);

        $cost = number_format($request->input('cost'), 2);
        $discountedCost = $request->input('discountedCost')
            ? number_format($request->input('discountedCost'), 2)
            : null;

        $user = Auth::user();

        $exisitngPricing = PhysicianPricing::where('user_id', $user->id)->first();

        if ($exisitngPricing) {
            $exisitngPricing->cost = $cost;
            $exisitngPricing->discountedCost = $discountedCost;
            $exisitngPricing->currency = $request->input('currency');
            $exisitngPricing->save();
        } else {
            $pricing = new PhysicianPricing();
            $pricing->cost = $cost;
            $pricing->discountedCost = $discountedCost;
            $pricing->currency = $request->input('currency');
            $pricing->user()->associate($user);
            $pricing->save();
        }
        return redirect()->back()->with('success', 'Your session pricing has been updated successfully.');
    }

    public function revenueIndex()
    {
        $physician = Auth::user();
        $schedules = PhysicianSchedule::where('user_id', $physician->id)
            ->where('status', '!=', 'available')->with('patient')
            ->orderBy('slot_date')
            ->orderBy('slot_time')
            ->get();

        return view('physician.finances.revenue_view', compact('schedules'));
    }

}
