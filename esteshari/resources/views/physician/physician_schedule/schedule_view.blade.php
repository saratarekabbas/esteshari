@extends('layouts.physician_layout')

@section('content')
    <div id='calendar'></div>
    {{--Slot modal--}}
    <div class="modal fade" id="addSlotModal" tabindex="-1" role="dialog" aria-labelledby="addSlotModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSlotModalLabel">Add Slot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSlotForm" action="{{ route('physician.schedule.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="slotTime">Slot Time</label>
                            <input type="time" class="form-control" id="slotTime" name="slot_time" required>
                        </div>
                        <input type="hidden" name="slot_date" id="slotDate" value="">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Slot</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'standard',
                events: {!! $events !!},
                eventClick: function (info) {
                    console.log(info.event);
                },

                dateClick: function (info) {
                    $('#slotDate').val(info.dateStr);
                    $('#addSlotModal').modal('show');
                },

                success: function (response) {
                    // Parse the response to get the slot details
                    var slot = JSON.parse(response);

                    // Create an event object for the new slot
                    var event = {
                        title: 'Slot',
                        start: slot.slot_date + 'T' + slot.slot_time + ':00',
                        allDay: false
                    };

                    // Add the event to the calendar
                    calendar.addEvent(event);

                    // Close the modal and reset the form
                    $('#addSlotModal').modal('hide');
                    form[0].reset();
                }

            });
            calendar.render();
        });


    </script>

    <style>
        /* Custom styles for the calendar */
        /*#calendar {*/
        /*    width: 800px;*/
        /*    margin: 0 auto;*/
        /*}*/

        .fc-toolbar {
            padding: 10px;
        }

        .fc-toolbar-title {
            color: #333;
            font-size: 24px;
        }

        .fc-day-header {
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
            font-size: 14px;
        }

        .fc-day {
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .fc-today {
            background-color: #eaf3ff;
        }

        .fc-event {
            background-color: #007bff;
            color: #fff;
        }

        a {
            text-decoration: none;
            color: #1a1e21;
        }

        a:hover {
            color: #0a58ca;
        }
    </style>
@endsection
