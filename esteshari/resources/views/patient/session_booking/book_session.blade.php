@extends('layouts.patient_layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
        <h2 class="form-title">Online Consultation with Dr. {{$physician->name}}</h2>
        <div class="row">
            <div class="col-md-8" style="height: 700px;">
                <div class="overflow-auto h-100">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{asset('assets/profile_dr_4.jpg')}}" alt=""
                                         class="img-fluid rounded-start"
                                         style="min-height: 272px; object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h4 class="card-title">Dr. {{$physician->name}}</h4>
                                        <p class="card-text">Obstetrician & Gynocologist, Fertility & Reproductive
                                            Medicine
                                            Specialist</p>
                                        <p class="card-text">English, Bahasa Malaysia</p>
                                        <p class="card-text">15 Years Experience</p>
                                        <div>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                            <i class="fa fa-star star" style="color: #f1b701"></i>
                                        </div>
                                        <div class="text-muted">34 reviews</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">About Doctor</h5>
                                <p class="card-text" style="font-weight: lighter">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                                <h5 class="card-title">About Dr. {{$physician->name}}</h5>
                                <p class="card-text" style="font-weight: lighter; font-size: small">Dr. {{$physician->name}} is a
                                    Consultant Obstetrician, Gynaecologist, and Fertility specialist at TMC
                                    Fertility
                                    Centre.
                                    Previously worked at the General Hos...
                                    <a href="#" class="card-link">See More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="row">
                        <div class="card-body">
                            <h5 class="card-title" style="margin-left: 8px">Choose Date & Time</h5>
                            <p class="card-text text-muted" style="margin-left: 8px">Choose date and time from available
                                slots
                            </p>

                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <i class="fa fa-angle-left fa-2x" style="color:#4a4a4d;" aria-hidden="true"></i>
                                    </td>
                                    @foreach ($dates as $date)
                                        <td style="text-align: center;{{ $date == $currentDate ? 'cursor: pointer; color: #dc6464; border-bottom: 1px solid #dc6464;' : ''}}">
                                            {{ $date }}
                                        </td>
                                    @endforeach
                                    <td style="text-align: center; vertical-align: middle;">
                                        <i class="fa fa-angle-right fa-2x" style="color:#4a4a4d;"
                                           aria-hidden="true"></i>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="6" style="text-align: center; vertical-align: middle;">
                                        <div class="container justify-content-center">
                                            <div class="row row-cols-md-4 g-3">
                                                @if ($slots->isEmpty())
                                                    <div class="col-3">No available slots</div>
                                                @else
                                                    @foreach ($slots as $slot)
                                                        @if ($slot->slot_date == $currentDate)
                                                            @if ($slot->status == "booked")
                                                                <div type="button"
                                                                     class="col-3 booked_slot_items text-muted"
                                                                     data-bs-toggle="modal"
                                                                     data-bs-target="#confirmSlotModal"
                                                                     data-slot-id="{{ $slot->id }}">
                                                                    {{ substr($slot->slot_time, 0, 5) }}
                                                                </div>
                                                            @elseif ($slot->status == "available")
                                                                <div type="button" class="col available_slot_items"
                                                                     data-bs-toggle="modal"
                                                                     data-bs-target="#confirmSlotModal"
                                                                     data-slot-id="{{ $slot->id }}">
                                                                    {{ substr($slot->slot_time, 0, 5) }}
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <script>
                                // Get the current date
                                const currentDate = new Date();

                                // Calculate the next and previous dates
                                function calculateDates(currentDate, direction) {
                                    const dates = [];
                                    for (let i = 0; i < 4; i++) {
                                        const date = new Date(currentDate);
                                        date.setDate(date.getDate() + (i * direction));
                                        dates.push(formatDate(date));
                                    }
                                    return dates;
                                }

                                // Function to format the date as "Day Month Date"
                                function formatDate(date) {
                                    const options = {weekday: 'short', month: 'short', day: 'numeric'};
                                    return date.toLocaleDateString(undefined, options);
                                }

                                // Update the dates in the table
                                function updateDates() {
                                    const dates = calculateDates(currentDate, 1);

                                    // Update the table cells with the dates
                                    const dateCells = document.querySelectorAll('td:not(:first-child):not(:last-child)');
                                    dateCells.forEach((cell, index) => {
                                        cell.textContent = dates[index];
                                    });
                                }

                                // Add event listeners to the previous and next buttons
                                document.querySelector('.fa-angle-left').addEventListener('click', function () {
                                    currentDate.setDate(currentDate.getDate() - 1);
                                    updateDates();
                                    // Add code here to update the available slots for the new current date
                                });

                                document.querySelector('.fa-angle-right').addEventListener('click', function () {
                                    currentDate.setDate(currentDate.getDate() + 1);
                                    updateDates();
                                    // Add code here to update the available slots for the new current date
                                });

                                // Initial update of dates
                                updateDates();


                                // Add event listener to the available slot items
                                const availableSlotItems = document.querySelectorAll('.available_slot_items');
                                availableSlotItems.forEach((item) => {
                                    item.addEventListener('click', function () {
                                        const slotId = this.dataset.slotId; // Get the slot ID from the data attribute
                                        document.getElementById('selectSlotId').value = slotId; // Set the slot ID in the hidden input field
                                    });
                                });

                            </script>

                            <div id="confirmSlotModal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-labelledby="confirmSlotModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmSlotModalLabel">Confirm Slot</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to select this slot?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <form id="selectSlotForm" method="POST" action="{{ route('patient.session_booking') }}">
                                                @csrf
                                                <input type="hidden" name="id" id="selectSlotId">
                                                <button type="submit" class="btn btn-primary">Select</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
