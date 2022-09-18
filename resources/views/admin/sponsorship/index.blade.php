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
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Period</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ($accommodation->sponsorship as $sponsorship)
                <td scope="col">{{$sponsorship->id}}</td>
                <td scope="col">{{$sponsorship->type}}</td>
                <td scope="col">{{$sponsorship->period}}</td>
                <td scope="col">{{$sponsorship->price}}</td>
                <td scope="col">{{$sponsorship->created_at}}</td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection