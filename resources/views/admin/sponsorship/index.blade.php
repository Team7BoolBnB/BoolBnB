@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center py-3">
            <a href="{{ route('admin.sponsorship.create') }}" class="btn btn-secondary py-0 px-1">
                <i class="fa-solid fa-eye fa-xs"></i>
                Aggiungi
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Period</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorships as $sponsorship)
                    <tr>
                        <th scope="row">{{ $sponsorship->id }}</th>
                        <td>{{ $sponsorship->name }}</td>
                        <td>{{ $sponsorship->period }}</td>
                        <td>{{ $sponsorship->price }}</td>
                        <td>{{ $sponsorship->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection