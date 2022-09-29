@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Sponsorships</h2>
        </div>
    </div>

    <div class="container pt-5">

        @if (count($sponzorizedAccommodation) <= 0)
        
            <div class="container">

                <div class="row row-cols-sm-1 row-cols-lg-3 py-4 g-4 justify-content-center">
                    <div class="col col-sm-12">
                        <div>
                            <a class="card_link d-flex flex-column" href="/admin/sponsorship/create/buy">
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
                            <a class="card_link card-all d-flex flex-column" href="/admin/sponsorship/create/buy">
                                <h6 class="pb-3">Add New</h6>
                                <i class="fa-solid fa-plus fa-2xl"></i>
                            </a>
                        </div>
                    </div>

                    @foreach ($sponzorizedAccommodation as $accommodation)
                    <div class="col-md-6 col-sm-12">
                        <div class="card_admin">

                            @if((strtotime($accommodation->endTime)-strtotime(now()))>0)
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


                </div>
            </div>
        @endif
    @endsection
