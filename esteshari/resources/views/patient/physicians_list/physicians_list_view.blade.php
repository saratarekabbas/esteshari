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
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
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
                                        <p class="card-text text-muted">Available next  {{ date('l, jS F Y', strtotime($slot->slot_date)) }}, {{substr($slot->slot_time, 0, 5) }}</p>
                                    @else
                                        <p class="card-text text-muted">No Available Sessions</p>

                                    @endif

                                    <h3 class="mb-0 font-weight-semibold"><s>$250.99</s><strong
                                            class="ms-2 text-danger">$50.99</strong></h3>
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
            {{--            <div class="col">--}}
            {{--                <div class="card h-100">--}}
            {{--                    <img src="{{asset('assets/profile_dr_2.jpg')}}" class="card-img-top" alt="...">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h5 class="card-title">Dr Sara</h5>--}}
            {{--                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive Medicine--}}
            {{--                            Specialist</p>--}}
            {{--                        <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep Singh--}}
            {{--                            Pannu is a--}}
            {{--                            Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC Fertility--}}
            {{--                            Centre.--}}
            {{--                            Previously worked at the General Hos...--}}
            {{--                            <a href="#" class="card-link">See More</a></p>--}}
            {{--                        <h3 class="mb-0 font-weight-semibold"><s>$250.99</s><strong--}}
            {{--                                class="ms-2 text-danger">$50.99</strong></h3>--}}

            {{--                        <div>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                        </div>--}}

            {{--                        <div class="text-muted mb-3">34 reviews</div>--}}

            {{--                        <div class="d-grid gap-2">--}}
            {{--                            <button class="btn btn-primary" type="button">Book Session</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col">--}}

            {{--                <div class="card h-100">--}}
            {{--                    <img src="{{asset('assets/profile_dr_3.jpg')}}" class="card-img-top" alt="...">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h5 class="card-title">Dr Sara</h5>--}}
            {{--                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive Medicine--}}
            {{--                            Specialist</p>--}}
            {{--                        <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep Singh--}}
            {{--                            Pannu is a--}}
            {{--                            Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC Fertility--}}
            {{--                            Centre.--}}
            {{--                            Previously worked at the General Hos...--}}
            {{--                            <a href="#" class="card-link">See More</a></p>--}}
            {{--                        <h3 class="mb-0 font-weight-semibold">$250.99</h3>--}}

            {{--                        <div>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                        </div>--}}

            {{--                        <div class="text-muted mb-3">34 reviews</div>--}}

            {{--                        <div class="d-grid gap-2">--}}
            {{--                            <button class="btn btn-primary" type="button">Book Session</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="col">--}}

            {{--                <div class="card h-100">--}}
            {{--                    <img src="{{asset('assets/profile_dr_3.jpg')}}" class="card-img-top" alt="...">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h5 class="card-title">Dr Sara</h5>--}}
            {{--                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive Medicine--}}
            {{--                            Specialist</p>--}}
            {{--                        <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep Singh--}}
            {{--                            Pannu is a--}}
            {{--                            Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC Fertility--}}
            {{--                            Centre.--}}
            {{--                            Previously worked at the General Hos...--}}
            {{--                            <a href="#" class="card-link">See More</a></p>--}}
            {{--                        <h3 class="mb-0 font-weight-semibold">$250.99</h3>--}}

            {{--                        <div>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                        </div>--}}

            {{--                        <div class="text-muted mb-3">34 reviews</div>--}}

            {{--                        <div class="d-grid gap-2">--}}
            {{--                            <button class="btn btn-primary" type="button">Book Session</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col">--}}

            {{--                <div class="card h-100">--}}
            {{--                    <img src="{{asset('assets/profile_dr_3.jpg')}}" class="card-img-top" alt="...">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h5 class="card-title">Dr Sara</h5>--}}
            {{--                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive Medicine--}}
            {{--                            Specialist</p>--}}
            {{--                        <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep Singh--}}
            {{--                            Pannu is a--}}
            {{--                            Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC Fertility--}}
            {{--                            Centre.--}}
            {{--                            Previously worked at the General Hos...--}}
            {{--                            <a href="#" class="card-link">See More</a></p>--}}
            {{--                        <h3 class="mb-0 font-weight-semibold">$250.99</h3>--}}

            {{--                        <div>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                        </div>--}}

            {{--                        <div class="text-muted mb-3">34 reviews</div>--}}

            {{--                        <div class="d-grid gap-2">--}}
            {{--                            <button class="btn btn-primary" type="button">Book Session</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col">--}}

            {{--                <div class="card h-100">--}}
            {{--                    <img src="{{asset('assets/profile_dr_3.jpg')}}" class="card-img-top" alt="...">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h5 class="card-title">Dr Sara</h5>--}}
            {{--                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive Medicine--}}
            {{--                            Specialist</p>--}}
            {{--                        <p class="card-text" style="font-weight: lighter; font-size: small">Dr. Navdeep Singh--}}
            {{--                            Pannu is a--}}
            {{--                            Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC Fertility--}}
            {{--                            Centre.--}}
            {{--                            Previously worked at the General Hos...--}}
            {{--                            <a href="#" class="card-link">See More</a></p>--}}
            {{--                        <h3 class="mb-0 font-weight-semibold">$250.99</h3>--}}

            {{--                        <div>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                            <i class="fa fa-star star" style="color: #f1b701"></i>--}}
            {{--                        </div>--}}

            {{--                        <div class="text-muted mb-3">34 reviews</div>--}}

            {{--                        <div class="d-grid gap-2">--}}
            {{--                            <button class="btn btn-primary" type="button">Book Session</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--        </div>--}}
        </div>

    </div>
@endsection
