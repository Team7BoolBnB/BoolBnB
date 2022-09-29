@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Accommodations</h2>
        </div>
    </div>

    <div class="container pt-5">

    @if(!$visible)
        
        <div class="container">
            <div class="row row-cols-sm-1 row-cols-lg-3 py-4 g-4 justify-content-center">
                <div class="col">
                    <div>
                        <a class="card_link d-flex flex-column" href="{{ route('admin.accommodation.create') }}">
                            <h6 class="pb-3">Add New</h6>
                            <i class="fa-solid fa-plus fa-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@else
    
        <div class="container">
            <div class="row row-cols-sm-1 row-cols-lg-3 py-4 g-4">
                <div class="col col-sm-12">
                    <div>
                        <a class="card_link card-all d-flex flex-column" href="{{ route('admin.accommodation.create') }}">
                            <h6 class="pb-3">Add New</h6>
                            <i class="fa-solid fa-plus fa-2xl"></i>
                        </a>
                    </div>
                </div>

                @foreach ($accommodations as $accommodation)
                        <div class="col-md-6 col-sm-12">
                            <div class="card_admin">
                                @if($accommodation->available == "0")
                                    <h6 class=" badge not_available_info">Not Visible</h6>
                                @else
                                    <h6 class=" badge available_info">Visible</h6>
                                @endif
                                <div class="accommodation_info text-white">
                                    <div>
                                        <h3>{{ $accommodation->title }}</h3>
                                        <p>{{ $accommodation->address }}</p>
                                    </div>
                                </div>
                                <img class="img-fluid" src="{{ asset('storage/' . $accommodation->image) }}" alt="">
                                <div class="links_card_admin">

                                    {{-- show --}}
                                    <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.show', $accommodation->slug) }}"
                                        class="btn btn-primary">
                                        <i class="fa-regular fa-eye fa-xl"></i>
                                    </a>

                                    {{-- edit --}}
                                    <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.edit', $accommodation->slug) }}"
                                        class="btn btn-primary">
                                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                    </a>

                                    {{-- delete --}}
                                    <button type="button" class="deleteButton" data-bs-toggle="modal" data-bs-target="{{ '#' . $accommodation->slug }}">
                                        <a class="link_admin text-decoration-none">
                                            <i class="fa-regular fa-trash-can fa-xl"></i>
                                        </a>
                                    </button>

                                    {{-- sponsor --}}
                                    {{-- <a class="link_admin text-decoration-none" href="/admin/sponsorship/create/buy"
                                        class="btn btn-primary">
                                        <i class="fa-solid fa-rocket fa-xl"></i>
                                    </a> --}}

                                    {{-- stats --}}
                                    {{-- <a class="link_admin text-decoration-none" href="#" class="btn btn-primary">
                                        <i class="fa-solid fa-chart-column fa-xl"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    @endif
@endsection

@include('admin/partials/ModalFade')