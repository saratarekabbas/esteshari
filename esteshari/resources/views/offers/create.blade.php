@extends('layouts.app')
Add your offer

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<form method="POST" action="{{route('offers.store')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Offer Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter name">
        @error('name')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Offer Price</label>
        <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
        @error('price')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Offer Details</label>
        <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="Enter Details">

        @error('details')
        <small class="form-text text-danger">{{$message}} </small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

