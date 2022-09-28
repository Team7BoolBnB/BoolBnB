@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Sponsorships</h2>
        </div>
    </div>

    <div class="container pt-5">

        @if (count($sponzorizedAccommodation) <= 0)
        
            <div class="container pt-5">

                <div class="row row-cols-sm-1 row-cols-lg-3 py-4 g-4 justify-content-center">
                    <div class="col col-sm-12">
                        <div>
                            <a class="card_link d-flex flex-column" href="/admin/sponsorship/create/buy">
                                Add New
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container pt-5">
                <div class="row row-cols-sm-1 row-cols-lg-3 py-4 g-4">
                    <div class="col col-sm-12">
                        <div>
                            <a class="card_link card-all d-flex flex-column" href="/admin/sponsorship/create/buy">
                                Add New
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    @foreach ($sponzorizedAccommodation as $accommodation)
                    <div class="col-md-6 col-sm-12">
                        <div class="card_admin">
                           
                           
                            @if((strtotime($accommodation->endTime)-strtotime(now()))>0)
                            <div class="badge available_info">
                                   <span>Active</span>
                                </div>
                                @else
                                <div class="badge not_available_info">
                                    <span>Expired</span>
                                 </div>
                            @endif
                            <div class="accommodation_info">
                                <div class="fs-1">{{$accommodation->title}}</div>
                                <div class="fs-3">{{ $accommodation->name }}</div>
                                <div>{{ $accommodation->period }}</div>
                                <div>{{ $accommodation->price }}</div>
                            </div>
                            <img src="{{ asset('storage/' . $accommodation->image) }}" alt="">
                            
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        @endif
    @endsection
