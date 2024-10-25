@extends('layout.dashboard')

@section('content')

    <body class="g-sidenav-show bg-gray-100">


        <div class="main-content position-relative max-height-vh-100 h-100">

            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Update Attendee</p>
                                </div>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('attendees.update', $attendee) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $attendee->name }}" >
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $attendee->email }}" >
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Event</label>
                                                <select name="event_id" class="form-select" >
                                                    @foreach ($events as $event)
                                                        <option value="{{ $event->id }}"
                                                            {{ $attendee->event_id == $event->id ? 'selected' : '' }}>
                                                            {{ $event->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('event_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-auto">Update</button>
                                                <a href="{{ route('attendees.index') }}"
                                                    class="btn btn-danger w-auto">Cancel</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
@endsection
