@extends('layouts.app')

@section('content')
    <div class="container">
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
                @foreach ($accommodationn as $sponsorship)
                    <tr>
                        <th scope="row">{{ $sponsorship->title }}</th>
                        <td>{{ $sponsorship->address }}</td>
                        <td>{{ $sponsorship->description }}</td>
                        <td>
                            <a href="{{ route('admin.accommodation.show', $accommodation->id) }}" class="btn btn-secondary py-0 px-1">
                                <i class="fa-solid fa-eye fa-xs"></i>
                            </a>
                            <a href="{{ route('admin.accommodation.edit', $accommodation->id) }}" class="btn btn-primary py-0 px-1">
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