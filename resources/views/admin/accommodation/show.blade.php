@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Accommodation "{{ $accommodation->title }}"</h2>
        </div>
    </div>

    <div class="container pt-5">

        <img src="{{ asset('storage/' . $accommodation->image) }}" alt="{{ $accommodation->title }}" width="100%">

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

                <button type="submit" class="basicBtn bigBtn primaryBtn" data-bs-toggle="modal"
                    data-bs-target="{{ '#' . $accommodation->slug }}" >
                        <i class="fa-regular fa-trash-can"></i>
                        Delete
                    </button>
                
                <a href="{{ route('admin.accommodation.edit', $accommodation->slug) }}" class="basicBtn bigBtn secondaryBtn ms-2">
                    Edit
                </a>
            </div>
        </div>

    </div>
    <div class="modal fade" id="{{$accommodation->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sicuro di voler eliminare la seguente accommodation? {{$accommodation->title}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
              <form class="d-inline-block form-delete"  action="{{ route('admin.accommodation.destroy', $accommodation->slug) }}" method="post">
                @csrf
                @method('DELETE')
                <button  type="submit"  class="btn btn-danger">
                    Cancella definitivamente
                </button>
              </form>
            </div>
        </div>
    </div>
    </div>
@endsection
