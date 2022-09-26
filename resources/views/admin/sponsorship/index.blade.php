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
                <div class="row row-cols-3 py-4 g-4 justify-content-center">
                    <div class="col">
                        <div>
                            <a class="card_link d-flex flex-column" href="{{ route('admin.sponsorship.create') }}">
                                <h5>Add New</h5>
                                <i class="fa-solid fa-square-plus fa-2xl pt-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row row-cols-3 py-4 g-4">
                    <div class="col">
                        <div>
                            <a class="card_link d-flex flex-column" href="{{ route('admin.sponsorship.create') }}">
                                <h5>Add New</h5>
                                <i class="fa-solid fa-square-plus fa-2xl pt-3"></i>
                            </a>
                        </div>
                    </div>

                    @foreach ($sponzorizedAccommodation as $accommodation)
                        <div class="col">
                            <div class="card_admin">
                                @if($accommodation->available == "0")
                                    <h6 class=" badge not_available_info">Not Visible</h6>
                                @else
                                    <h6 class=" badge available_info">Visible</h6>
                                @endif
                                <div class="accommodation_info">
                                    <div class="fs-3">{{ $accommodation->title }}</div>
                                    <div>{{ $accommodation->address }}</div>
                                    {{-- <div>{{ $accommodation->startTime }} - {{ $accommodation->endTime }}</div> --}}
                                </div>
                                <img class="img-fluid" src="{{ $accommodation->image }}" alt="">
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
                                    <form class="d-inline-block" action="{{ route('admin.accommodation.destroy', $accommodation->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleteButton">
                                            <a class="link_admin text-decoration-none" href="#" class="">
                                                <i class="fa-regular fa-trash-can fa-xl"></i>
                                            </a>
                                        </button>
                                    </form>
                                    <a class="link_admin text-decoration-none" href="{{ route('admin.sponsorship.create', $accommodation->id) }}"
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


                </div>
            </div>
        @endif
    @endsection
