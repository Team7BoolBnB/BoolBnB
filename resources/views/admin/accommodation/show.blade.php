@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Accommodation "{{ $accommodation->title }}"</h2>
        </div>
    </div>

    <div class="container pt-5">

        <img src="{{ $accommodation->image }}" alt="{{ $accommodation->title }}" width="100%">

        <h5 class="pt-4">{{ $accommodation->title }}</h5>

        <p class="py-4"><strong>Description:</strong><br>{{ $accommodation->description }}</p>

        <p><strong>Longitude:</strong><br>{{ $accommodation->longitude }}</p>
        <p><strong>Latitude:</strong><br>{{ $accommodation->latitude }}</p>
        <p><strong>Rooms:</strong><br>{{ $accommodation->rooms }}</p>
        <p><strong>Beds:</strong><br>{{ $accommodation->beds }}</p>
        <p><strong>Bathrooms:</strong><br>{{ $accommodation->bathrooms }}</p>
        <p><strong>Square Metre:</strong><br>{{ $accommodation->mt_square }}</p>
        <p><strong>Available:</strong><br>{{ $accommodation->available }}</p>

        {{-- <div>
            <a href="{{ route('admin.accommodation.edit', $accommodation->id) }}" class="cdBtn btn btn-primary">
                <i class="fa-solid fa-pencil fa-xs"></i> Edit
            </a>
            <form action="{{ route('admin.accommodation.destroy', $accommodation->id) }}" method="POST" class="form-delete d-inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="cdBtn btn btn-danger">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </form>
        </div> --}}

        <div class="d-flex justify-content-between py-5">
            <div>
                <a href="{{ route('admin.accommodation.index') }}" class="basicBtn bigBtn secondaryBtn">
                    <i class="fa-solid fa-arrow-left pe-2"></i>
                    Back
                </a>
            </div>
            <div class="d-flex align-items-center">
                <form action="{{ route('admin.accommodation.destroy', $accommodation->id) }}" method="POST" class="form-delete d-inline">
                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="basicBtn bigBtn primaryBtn">
                        <i class="fa-regular fa-trash-can"></i>
                        Delete
                    </button>
                </form>
                <a href="{{ route('admin.accommodation.edit', $accommodation->id) }}" class="basicBtn bigBtn secondaryBtn ms-2">
                    Edit
                </a>
            </div>
        </div>

    </div>

@endsection
