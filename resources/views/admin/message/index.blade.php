@extends('layouts.app')

@section('content')
    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Messsages</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">

            {{-- Sidebar --}}

            <div class="col-2 p-0">
                <h5 class="p-3 border border-bottom-1 m-0">Accommodations</h5>
                <div class="col side-bar-message  full-height-message-container border border-col p-0 overflow-auto">

                    <div class="row flex-column">
                        <div class="spacing-column">
                            @foreach ($accommodations as $accommodation)
                                <div class="card">
                                    {{ $accommodation->title }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main section di destra --}}

            <div class="col p-0">
                <h5 class="p-3 border border-bottom-1 m-0">messages</h5>
                <div class="col  full-height-message-container border border-col p-0 overflow-auto">
                    <div class="flex-column messages-section h-100">
                        <div class="container px-5 py-0">
                            <div class="row flex-column">
                                <div class="spacing-column">
                                    @foreach ($accommodations as $accommodation)
                                        @foreach ($accommodation->messages as $message)
                                            <div class="col">{{ $message->email }}</div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 p-0">
                <h5 class="p-3 border border-bottom-1 m-0">Details</h5>
                <div class="col side-bar-message  full-height-message-container border border-col p-0 overflow-auto">
                    <div>
                        <div class="row flex-column">
                            <div class="spacing-column">
                                @foreach ($accommodations as $accommodation)
                                    <div class="card">
                                        {{ $accommodation->description }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
