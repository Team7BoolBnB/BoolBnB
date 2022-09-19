@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Sponsorships</h2>
        </div>
    </div>

    <div class="container pt-5">
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.sponsorship.create') }}" class="btn btn-secondary py-0 px-1">
                <i class="fa-solid fa-eye fa-xs"></i>
                Aggiungi
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Accommodation title</th>
                    <th scope="col">Accommodation Address</th>
                    <th scope="col">Type</th>
                    <th scope="col">Period</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Ends on</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($accommodations as $accommodation)
                    @foreach ($accommodation->sponsorship as $sponsorship)
                        <tr>
                            <td scope="col">{{ $accommodation->title }}</td>
                            <td scope="col">{{ $accommodation->address }}</td>
                            <td scope="col">{{ $sponsorship->name }}</td>
                            <td scope="col">{{ $sponsorship->period }}</td>
                            <td scope="col">{{ $sponsorship->price }}</td>
                            <td scope="col">{{ $sponsorship->created_at }}</td>
                            {{-- <td scope="col">{{ $sponsorship->endTime }}</td> --}}
                        </tr>
                    @endforeach
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
