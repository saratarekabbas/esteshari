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
            return $validator->errors();
        };
//        insert
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return 'saved successfully';

    }


    protected function getMessages()
    {

        return $messages = [
            'name.required' => "اسم العرض مطلوب",
            'name.unique' => "اسم العرض موجود",
            'price.numeric' => "سعر العرض يجب ان يكون ارقام"
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
