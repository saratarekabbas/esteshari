@extends('layouts.patient_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Payment for Session with Dr. {{$physician->name}} on {{$session->slot_date}}
            , {{ substr($session->slot_time, 0, 5) }}</h3>
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Biling details</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('patient.booking_confirm') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$session->id}}">
                            <input type="hidden" name="user_id" value="{{$physician->id}}">

                            <h5 class="mb-4">Payment</h5>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                       id="checkoutForm3"
                                       checked/>
                                <label class="form-check-label" for="checkoutForm3">
                                    Credit card
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                       id="checkoutForm4"/>
                                <label class="form-check-label" for="checkoutForm4">
                                    Debit card
                                </label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                       id="checkoutForm5"/>
                                <label class="form-check-label" for="checkoutForm5">
                                    Paypal
                                </label>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="formNameOnCard" required class="form-control"/>
                                        <label class="form-label" for="formNameOnCard">Name on card</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" required id="formCardNumber" class="form-control"/>
                                        <label class="form-label" for="formCardNumber">Credit card number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="date" required id="formExpiration" class="form-control"/>
                                        <label class="form-label" for="formExpiration">Expiration</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="text" required id="formCVV" class="form-control"/>
                                        <label class="form-label" for="formCVV">CVV</label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                Continue to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Online Video Conferencing Session
                                <span>{{$physician->physicianPricing->cost}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    @if($physician->physicianPricing->discountedCost)
                                        <strong>
                                            <p class="mb-0">(Discount)</p>
                                        </strong>
                                </div>
                                <span><strong>{{$physician->physicianPricing->currency}} {{$physician->physicianPricing->discountedCost}}</strong></span>
                                @else
                                    <span><strong>{{$physician->physicianPricing->cost}}</strong></span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
