@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Accommodations</h2>
        </div>
    </div>

    <div class="container pt-5">

    <div class="container">
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.accommodation.create') }}" class="btn btn-secondary py-0 px-1">
                <i class="fa-solid fa-eye fa-xs"></i>
                Aggiungi
            </a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Address</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accommodations as $sponsorship)
                    <tr>
                        <th scope="row">{{ $sponsorship->title }}</th>
                        <td>{{ $sponsorship->address }}</td>
                        <td>{{ $sponsorship->description }}</td>
                        <td>
                            <a href="{{ route('admin.accommodation.show', $sponsorship->id) }}" class="btn btn-secondary py-0 px-1">
                                <i class="fa-solid fa-eye fa-xs"></i>
                            </a>
                            <a href="{{ route('admin.accommodation.edit', $sponsorship->id) }}" class="btn btn-primary py-0 px-1">
                                <i class="fa-solid fa-pencil fa-xs"></i>
                            </a>
                            {{-- <form action="{{ route('admin.accommodation.destroy', $accommodation->id) }}" method="POST"
                                class="form-delete d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger py-0 px-1">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection