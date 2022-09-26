@extends('layouts.app')

@section('content')
    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Dashboard</h2>
        </div>
    </div>

    {{-- sezione accommodations --}}
    @if (!$visible)
        <div class="container py-5 mt-5 mb-5">
            @include('admin/partials/noContent')
        </div>
    @else
        <div class="container pt-5">
            <h3>Your apartments</h3>
            <div class="row py-4 ">

                @foreach ($accommodations as $accommodation)
                    <div class="col-sm-5">
                        <div class="card_admin">
                            @if($accommodation->available == "0")
                                <h6 class=" badge not_available_info">Not Visible</h6>
                            @else
                                <h6 class=" badge available_info">Visible</h6>
                            @endif
                            <div class="accommodation_info">
                                <div class="fs-3">{{ $accommodation->title }}</div>
                                <div>{{ $accommodation->address }}</div>
                            </div>
                            
                            <img class="img-fluid" src="{{ asset('storage/' . $accommodation->image) }}" alt="">
                            <div class="links_card_admin">
                                <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.show', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-eye fa-xl"></i>
                                </a>
                                <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.edit', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </a>
                                {{-- link delete --}}


                                <!-- Button trigger modal -->
                                <button type="button" class="deleteButton" data-bs-toggle="modal"
                                    data-bs-target="{{ '#' . $accommodation->slug }}">

                                    <a class="link_admin text-decoration-none">
                                        <i class="fa-regular fa-trash-can fa-xl"></i>
                                    </a>
                                </button>

                                <a class="link_admin text-decoration-none" href="{{ route('admin.sponsorship.create', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-solid fa-rocket fa-xl"></i>
                                </a>
                                {{-- link per le statistiche --}}
                                <a class="link_admin text-decoration-none" href="#" class="btn btn-primary">
                                    <i class="fa-solid fa-chart-column fa-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-sm-2">
                    <div>
                        <a class="card_link" href="{{ route('admin.accommodation.index', $accommodation->slug) }}">See
                            all</a>
                    </div>
                </div>
            </div>
        </div>
    @endif





    {{-- sezione sponsorships --}}
    @if (count($sponzorizedAccommodation) <= 0)
        <div class="container py-5">
            @include('admin/partials/noContent')
        </div>
    @else
        <div class="container pt-5">
            <h3>Latest sponsorships</h3>
            <div class="row py-4 ">

                @foreach ($sponzorizedAccommodation as $accommodation)
                    <div class="col-sm-5">
                        <div class="card_admin">
                            @if($accommodation->available == "0")
                                <h6 class=" badge not_available_info">Not Visible</h6>
                            @else
                                <h6 class=" badge available_info">Visible</h6>
                            @endif
                            <div class="accommodation_info">
                                <div class="fs-3">{{ $accommodation->title }}</div>
                                <div>{{ $accommodation->address }}</div>
                            </div>
                            <img class="img-fluid" src="{{ asset('storage/' . $accommodation->image) }}" alt="">
                            <div class="links_card_admin">
                                <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.show', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-eye fa-xl"></i>
                                </a>
                                <a class="link_admin text-decoration-none" href="{{ route('admin.accommodation.edit', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </a>
                                {{-- link delete --}}
                                <button type="button" class="deleteButton" data-bs-toggle="modal"
                                    data-bs-target="{{ '#' . $accommodation->slug }}">

                                    <a class="link_admin text-decoration-none">
                                        <i class="fa-regular fa-trash-can fa-xl"></i>
                                    </a>
                                </button>
                                <a class="link_admin text-decoration-none"
                                    href="{{ route('admin.sponsorship.create', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-solid fa-rocket fa-xl"></i>
                                </a>
                                {{-- link per le statistiche --}}
                                <a class="link_admin text-decoration-none" href="#" class="btn btn-primary">
                                    <i class="fa-solid fa-chart-column fa-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-sm-2">
                    <div>
                        <a class="card_link" href="{{ route('admin.sponsorship.index', $accommodation->slug) }}">See
                            all</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


@include('admin/partials/ModalFade')
