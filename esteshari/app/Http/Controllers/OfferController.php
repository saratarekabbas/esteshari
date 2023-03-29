<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function __construct()
    {

    }

    public function getOffers()
    {
//        get all offers from DB
        return Offer::get();
    }


    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $rules = $this->getRules();//defined ta7t
        $messages = $this->getMessages(); //defined ta7t

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };
//        insert
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);
        return redirect()->back()->with(['success' => 'Offer have been saved successfully']);
    }


    protected function getMessages()
    {

        return $messages = [
            'name.required' => __('messages.offer name required'),
            'name.unique' => __('messages.offer name unique'),
            'price.numeric' => __('messages.offer price numeric'),
            "price.required" => __("messages.offer price required"),
            "details.required" => __("messages.offer details required"),
        ];
    }

    protected function getRules()
    {
        return $rules = [
            //Validation Rules
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];
    }
}
