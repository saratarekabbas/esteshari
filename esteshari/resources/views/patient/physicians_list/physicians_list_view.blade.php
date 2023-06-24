@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Physicians List</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <button class="btn btn-primary" type="button">Filter</button>
                </div>
            </div>
            @if ($physicians->isEmpty())
                <tr>
                    <td colspan="5">
                        <div class="text-center">No physicians exist.
                        </div>
                    </td>

                </tr>
            @else
                @foreach($physicians as $physician)
                    @php
                        $slots = $physician->physicianSchedule()->where('status', 'available')->get();
                    @endphp
                    @php
                        $slot = $physician->physicianSchedule()
                            ->where('status', 'available')
                            ->whereDate('slot_date', '>=', date('Y-m-d'))
                            ->orderBy('slot_date')
                            ->orderBy('slot_time')
                            ->first();
                    @endphp
                    <form action="{{ route('patient.physicians_list.book') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $physician->id }}">
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/profile_dr_4.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Dr {{ $physician->name }}</h5>
                                    <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive
                                        Medicine
                                        Specialist</p>
                                    <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep
                                        Singh
                                        Pannu is a
                                        Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                        Fertility
                                        Centre.
                                        Previously worked at the General Hos...
                                        <a href="#" class="card-link">See More</a></p>
                                    @if($slot)
                                        <p class="card-text text-muted">Available
                                            next {{ date('l, jS F Y', strtotime($slot->slot_date)) }}
                                            , {{substr($slot->slot_time, 0, 5) }}</p>
                                    @else
                                        <p class="card-text text-muted">No Available Sessions</p>

                                    @endif

                                    @if($physician->physicianPricing)
                                        @if($physician->physicianPricing->discountedCost)
                                            <h3 class="mb-0 font-weight-semibold">
                                                <s>{{$physician->physicianPricing->currency}} {{$physician->physicianPricing->cost}}</s>
                                                <strong
                                                    class="ms-2 text-danger">{{$physician->physicianPricing->currency}} {{$physician->physicianPricing->discountedCost}}</strong>
                                            </h3>
                                        @else
                                            <h3 class="mb-0 font-weight-semibold">
                                                {{$physician->physicianPricing->currency}} {{$physician->physicianPricing->cost}}
                                            </h3>
                                        @endif
                                    @else
                                        <h3 class="mb-0 font-weight-semibold">MYR 0.00
                                        </h3>
                                    @endif
                                    <div>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                        <i class="fa fa-star star" style="color: #f1b701"></i>
                                    </div>

                                    <div class="text-muted mb-3">34 reviews</div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Book Session</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            @endif

        </div>

    </div>
@endsection
