@extends('layouts.app')

@section('content')
    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Dashboard</h2>
        </div>
    </div>

    {{-- accommodations section --}}
    @if (!$visible)
        <div class="container py-5 mt-5 mb-5">
            @include('admin/partials/noContent')
        </div>
    @else
        <div class="container pt-5">
            <h3>Your accommodations</h3>
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 py-4 ">

                @foreach ($accommodations as $accommodation)
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="card_admin mb-4">

                            @if ($accommodation->available == '0')
                                <h6 class=" badge not_available_info">Not Visible</h6>
                            @else
                                <h6 class=" badge available_info">Visible</h6>
                            @endif

                            <div class="accommodation_info text-white">
                                <h3>{{ $accommodation->title }}</h3>
                                <p>{{ $accommodation->address }}</p>
                            </div>

                            <img class="img-fluid" src="{{ asset('storage/' . $accommodation->image) }}" alt="">

                            <div class="links_card_admin">

                                {{-- show --}}
                                <a class="link_admin text-decoration-none"
                                    href="{{ route('admin.accommodation.show', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-eye fa-xl"></i>
                                </a>

                                {{-- edit --}}
                                <a class="link_admin text-decoration-none"
                                    href="{{ route('admin.accommodation.edit', $accommodation->slug) }}"
                                    class="btn btn-primary">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </a>

                                {{-- delete --}}
                                <button type="button" class="deleteButton" data-bs-toggle="modal"
                                    data-bs-target="{{ '#' . $accommodation->slug }}">
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

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div>
                        <a class="card_link card-all card-all-index"
                            href="{{ route('admin.accommodation.index', $accommodation->slug) }}">
                            <h6>See all</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    {{-- sponsorships section --}}
    @if (count($sponzorizedAccommodation) <= 0)
        <div class="container py-5">
            @include('admin/partials/noContent')
        </div>
    @else
        <div class="container pt-5">
            <h3>Latest sponsorships</h3>
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 py-4 ">

                @foreach ($sponzorizedAccommodation as $accommodation)
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div class="card_admin mb-4">

                            @if (strtotime($accommodation->endTime) - strtotime(now()) > 0)
                                <div class="badge available_info">
                                    <h6 class="mb-0">Active</h6>
                                </div>
                            @else
                                <div class="badge not_available_info">
                                    <h6 class="mb-0">Expired</h6>
                                </div>
                            @endif

                            <div class="accommodation_info_sponsor text-white">
                                <div>
                                    <h3>{{ $accommodation->title }}</h3>
                                    <p>{{ $accommodation->name }}</p>
                                    <div>
                                        <span>Start: {{  date('d/m/Y', strtotime($accommodation->startTime)) }}</span>
                                        <span> - </span>
                                        <span>End: {{  date('d/m/Y', strtotime($accommodation->endTime)) }}</span>
                                    </div>
                                </div>
                            </div>

                            <img src="{{ asset('storage/' . $accommodation->image) }}" alt="">

                        </div>
                    </div>
                @endforeach


                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div>
                        <a class="card_link card-all card-all-index"
                            href="{{ route('admin.sponsorship.index', $accommodation->slug) }}">
                            <h6>See all</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


@include('admin/partials/ModalFade')
