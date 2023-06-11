@extends('layouts.physician_layout')

@section('content')
    <div class="container">
        <h3 class="form-title">Financial Information</h3>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center px-0">
                    <h5 class="card-title">Saved Cards</h5>
                    <a href="" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#addNewCardModal">Add
                        Payment Method</a>
                </div>

                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://i.imgur.com/qHX7vY1.webp" class="rounded" width="70"/>
                        <div class="d-flex flex-column ms-3">
                            <span class="h5 mb-1">Credit Card</span>
                            <span class="small text-muted">1234 XXXX XXXX 2570
                            <span class="badge bg-success mb-1">Current</span>
</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary">Remove Card</button>
                        <button class="btn btn-outline-primary">Make Primary</button>
                    </div>
                </div>

                <div class="mt-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://i.imgur.com/qHX7vY1.webp" class="rounded" width="70"/>
                        <div class="d-flex flex-column ms-3">
                            <span class="h5 mb-1">Credit Card</span>
                            <span class="small text-muted">2344 XXXX XXXX 8880 <span class="badge bg-secondary mb-1">Saved</span></span>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary">Remove Card</button>
                        <button class="btn btn-outline-primary">Make Primary</button>
                    </div>
                </div>

            </div>
        </div>


        <div class="modal fade" id="addNewCardModal" tabindex="-1" aria-labelledby="addNewCardModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Card</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <p class="fw-bold mb-4">Add new card:</p>
                            <div class="form-outline mb-4">
                                <input type="text" id="formControlLgXsd" class="form-control"
                                       value="Anna Doe"/>
                                <label class="form-label" for="formControlLgXsd">Cardholder's Name</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="form-outline">
                                        <input type="text" id="formControlLgXM" class="form-control"
                                               value="1234 5678 1234 5678"/>
                                        <label class="form-label" for="formControlLgXM">Card Number</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-outline">
                                        <input type="password" id="formControlLgExpk" class="form-control"
                                               placeholder="MM/YYYY"/>
                                        <label class="form-label" for="formControlLgExpk">Expire</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-outline">
                                        <input type="password" id="formControlLgcvv" class="form-control"
                                               placeholder="Cvv"/>
                                        <label class="form-label" for="formControlLgcvv">Cvv</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add Card</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
