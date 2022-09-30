@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row ">

        {{-- Sidebar --}}

        <div class="col-2 side-bar-message  full-height-message-container">
            <h3>Accommodations</h3>
            <div class="row flex-column">
                @foreach ($accommodations as $accommodation)
                    <div class="card">
                        {{$accommodation->title}}
                    </div>
                @endforeach
            </div>
            
        </div>

        {{-- Main section di destra --}}

        <div class="col  full-height-message-container">
           <div class="flex-column messages-section h-100">

            {{-- Header destra  con searchbar e pulsanti--}}
                <div class="header-message search-box-messages-section border border-danger">
                    <div class="row justify-content-between ">
                        <div class="col-4"><i class="fa-solid fa-magnifying-glass"></i> <input type="search"></div>
                        <div class="col-3">
                            <div class="row">
                            <div class="col"><input type="checkbox" name="" id=""><span>all</span></div>
                            <div class="col">1-50 di 199</div>
                            <div class="col"> pagination </div>
                           
                        </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="main-message-section border border-info">

                    {{-- sezioni principale spam e ecc --}}
                 
                        <div class="row border border-danger">
                            <div class="col-3">Principale</div>
                            <div class="col-3">Spam</div>
                           
                        </div>
                    


                    {{-- Messaggi --}}
                    <div class="row flex-column">
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                        <div class="col">ciao</div>
                    </div>

                </div>
           </div>
        </div>
    </div>
</div>


@endsection