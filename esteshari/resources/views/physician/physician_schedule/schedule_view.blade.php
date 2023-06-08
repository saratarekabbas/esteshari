@extends('layouts.physician_layout')

@section('content')

    <div id='calendar'></div>

    {{--Add Slot modal--}}
    <div class="modal fade" id="addSlotModal" tabindex="-1" role="dialog" aria-labelledby="addSlotModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSlotModalLabel">Add a New Schedule Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addSlotForm" action="{{ route('physician.schedule.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="slotTime">Slot Time</label>
                            <input type="time" class="form-control @error('slot_time') is-invalid @enderror"
                                   id="slotTime" name="slot_time" required>
                            @error('slot_time')
                            <span class="invalid-feedback" role="alert">
{{--                                    <strong>{{ $message }}</strong>--}}
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="slot_date" id="slotDate" value="">
                    </div>
                    <div class="modal-footer">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Slot</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Slot Modal -->
    <div id="editSlotModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editSlotModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSlotModalLabel">Edit Schedule Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editSlotForm" method="POST"
                      action="{{ route('physician.schedule.update', ['id' => ':id']) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editSlotId">
                        <div class="form-group">
                            <label for="editSlotDate">Slot Date</label>
                            <input type="date" class="form-control" id="editSlotDate" name="slot_date" required>
                        </div>
                        <div class="form-group">
                            <label for="editSlotTime">Slot Time</label>
                            <input type="time" class="form-control" id="editSlotTime" name="slot_time" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal">Delete Slot
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    Delete Slot Modal--}}
    <div id="confirmDeleteModal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="confirmDeleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this slot?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteSlotForm" method="POST" action="{{ route('physician.schedule.destroy', ['id' => ':id']) }}">
{{--                        <form id="deleteSlotForm" method="POST" action="{{ route('physician.schedule.destroy', ':id') }}">--}}

                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="deleteSlotId">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'listMonth',
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    right: 'listMonth dayGridDay,dayGridWeek,dayGridMonth,dayGridYear',
                },
                editable: true,
                nowIndicator: true,
                selectable: true,
                themeSystem: 'standard',
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                },
                events: {!! $events !!},
                eventClick: function (info) {
                    // Retrieve the event data
                    var event = info.event;

                    // Get the slot date and time from the event
                    var slotId = event.extendedProps.id;

                    var slotDate = event.start.toISOString().slice(0, 10);
                    var slotTime = event.start.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});

                    // Set the action URL for the edit form
                    var editFormAction = '{{ route("physician.schedule.update", ":id") }}';
                    editFormAction = editFormAction.replace(':id', slotId);

                    // Set the values in the edit modal
                    $('#editSlotId').val(slotId);
                    $('#deleteSlotId').val(slotId);
                    $('#editSlotDate').val(slotDate);
                    $('#editSlotTime').val(slotTime);
                    $('#editSlotForm').attr('action', editFormAction);

                    // Show the edit modal
                    $('#editSlotModal').modal('show');

                    // Set the action URL for the delete form
                    var deleteFormAction = '{{ route("physician.schedule.destroy", ":id") }}';
                    deleteFormAction = deleteFormAction.replace(':id', slotId);

                    // Set the value in the delete modal
                    $('#deleteSlotId').val(slotId);
                    $('#deleteSlotForm').attr('action', deleteFormAction);

                    // Show the delete modal
                    // $('#confirmDeleteModal').modal('show');

                },
                dateClick: function (info) {
                    $('#slotDate').val(info.dateStr);
                    $('#addSlotModal').modal('show');
                },

                eventDidMount: function (info) {
                    // Add the database ID as a data attribute to the event element
                    var event = info.event;
                    var databaseId = event.extendedProps.id;
                    $(info.el).attr('data-database-id', databaseId);
                },
                eventAdd: function (info) {
                    // Retrieve the event data
                    var event = info.event;

                    // Get the database ID from the event element
                    var databaseId = $(info.el).attr('data-database-id');

                    // Add the database ID as a property to the event
                    event.extendedProps.id = databaseId;
                },
                eventChange: function (info) {
                    // Retrieve the event data
                    var event = info.event;

                    // Get the database ID from the event element
                    var databaseId = $(info.el).attr('data-database-id');

                    // Update the database ID in the event
                    event.extendedProps.id = databaseId;
                },
                eventRemove: function (info) {
                    // Retrieve the event data
                    var event = info.event;

                    // Remove the database ID from the event
                    delete event.extendedProps.id;
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
