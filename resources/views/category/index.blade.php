@extends('layout.dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Category Table</h6>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Create</a>
                    </div>

                    @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                @endif


                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0" style="table-layout: fixed; width: 100%;">
                                <colgroup>
                                    <col style="width: 15%;">
                                    <col style="width: 30%;">
                                    <col style="width: 35%;">

                                </colgroup>
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            S.N</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td
                                                style="max-width: 300px; word-wrap: break-word; white-space: normal; overflow: hidden;">
                                                <p class="text-xs font-weight-bold mb-0"> {{ $loop->iteration }}</p>
                                            </td>
                                            <td
                                                style="max-width: 300px; word-wrap: break-word; white-space: normal; overflow: hidden;">
                                                <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                            </td>

                                            <td class="align-middle">
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-info me-2">Edit</a>

                                                <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                                    id="delete-form-{{ $category->id }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="ShowAlert({{ $category->id }})">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function ShowAlert(categoryId) {
            Swal.fire({
                title: "Delete?",
                text: "Are you sure you want to delete this ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${categoryId}`).submit();
                }
            });
        }
    </script>
@endsection
