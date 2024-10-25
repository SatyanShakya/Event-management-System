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
                                    <p class="mb-0">Update Events</p>
                                </div>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('events.update', $event) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Title</label>
                                                <input class="form-control" type="text" name="title"
                                                    value="{{ $event->title }}" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Description</label>
                                                <input class="form-control" type="text" name="description"
                                                    value="{{ $event->description }}" required>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Date</label>
                                                <input class="form-control" type="date" name="date"
                                                    value="{{ $event->date }}" required>
                                                @error('date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    value="{{ $event->location }}" required>
                                                @error('location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Category</label>
                                                <select name="category_id" class="form-select" required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-auto">Update</button>
                                                <a href="{{ route('events.index') }}"
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
