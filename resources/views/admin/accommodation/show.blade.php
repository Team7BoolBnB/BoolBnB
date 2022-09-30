@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <div class="row">
                <div class="col overflow-auto">
                    <div>
                        <h2>{{ $accommodation->title }}</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">

       {{--  <div>
            <img style="border-radius: 2rem;" class="w-100 h-50" src="{{ asset('storage/' . $accommodation->image) }}" alt="{{ $accommodation->title }}">
        </div>
        <div class="row g-5">
            <div class="col">
                <h4 class="font-sm py-4"> Typology: <span class="fst-italic fw-light">{{ $accommodation->typology->name }}</span></h4>
                <div>
                    <p class="py-4"><strong>Description:</strong><br>{{ $accommodation->description }}</p>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <ul class="list-unstyled">
                                <li class="mb-3"><strong>Rooms:</strong><br>{{ $accommodation->rooms }}</li>
                                <li class="mb-3"><strong>Beds:</strong><br>{{ $accommodation->beds }}</li>
                                <li class="mb-3"><strong>Bathrooms:</strong><br>{{ $accommodation->bathrooms }}</li>
                                <li class="mb-3"><strong>Square meters:</strong><br>{{ $accommodation->mt_square }}</li>
                                <li class="mb-3">
                                    @if($accommodation->available == "0")
                                        <strong>Available:</strong><br>No
                                    @else
                                        <strong>Available:</strong><br>Yes
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <span class="mb-3"><strong>Services:</strong></span>
                            <ul class="list-unstyled">
                                @dump($accommodation->service)
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col">
                <h4 class="font-sm py-4 text-end"> {{ $accommodation->address }}</h4>
                <div class="py-4">
                    <img style="border-radius: 2rem;"  class="w-100" src="https://www.google.com/maps/d/thumbnail?mid=1R-z0nvlZTWYN9LH3bxAtMhZScxo&hl=it" alt="">
                </div>
            </div>
        </div> --}}

        <div class="row row-cols-2 g-3">
            <div class="col-8">
                <img width="90%" style="min-height: 300px" class="img-fluid rounded" src="{{ asset('storage/' . $accommodation->image) }}" alt="{{ $accommodation->title }}">
            </div>
            <div id="map" class="col-4 rounded" height="100%">
                <input id="latInput" type="text" class="d-none" value="{{$accommodation->latitude}}">
                <input id="lonInput" type="text" class="d-none" value="{{$accommodation->longitude}}">
            </div>
        </div>
        <div class="row g-5">
            <div class="col">
                <h5 class="font-sm py-4"> Typology: {{ $accommodation->typology->name }}</h5>
            </div>
            <div class="col">
                <h5 class="font-sm py-4 text-end"> {{ $accommodation->address }}</h4>
            </div>
        </div>

        <hr>
        
        <div class="row py-4">
            <div class="col">
                <p><strong>Description:</strong><br>{{ $accommodation->description }}</p>
            </div>
        </div>

        <hr>
        
        <div class="row pt-4 pb-3">
            <div class="col">
                <ul class="list-unstyled d-flex w-100 justify-content-between">
                    <li><h5>Rooms:</h5><p>{{ $accommodation->rooms }}</p></li>
                    <li><h5>Beds:</h5><p>{{ $accommodation->beds }}</p></li>
                    <li><h5>Bathrooms:</h5><p>{{ $accommodation->bathrooms }}</p></li>
                    <li><h5>Square meters:</h5><p>{{ $accommodation->mt_square }}</p></li>
                    <li>
                        @if($accommodation->available == "0")
                            <h5>Available:</h5><p>No</p>
                        @else
                            <h5>Available:</h5><p>Yes</p>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row py-4">
            <div class="col">
                <h5 class="pb-2">Services:</h5>
                    @foreach ($accommodation->services as $item)
                        <p>{{$item->name}}</p>
                    @endforeach
            </div>
        </div>


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
