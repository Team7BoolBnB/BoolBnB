@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Creazione nuovo ADS</h1>
            </div>

            <div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <form action="{{ route('admin.sponsorship.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Durata sponsorship</label>
                    <select type="text" name="sponsorship_id" class="form-control @error('sponsorship_id') is-invalid @enderror" value="{{ old('sponsorship_id') }}" required>
                        <option value=""></option>
                        @foreach($sponsorships as $ads)
                            <option value="{{ $ads->id }}">{{ $ads->period }}</option>
                        @endforeach
                    </select>
                    @error('sponsorship_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                
                <div class="form-group py-4">
                    <button type="submit" class="btn btn-success mt-3 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        Save
                    </button>
                </div>
                <a href="{{ route('admin.sponsorship.index') }}" class="btn btn-secondary py-0 px-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><line x1="20" y1="12" x2="4" y2="12"></line><polyline points="10 18 4 12 10 6"></polyline></svg>
                    Back
                </a>
            </form>
        </div>
    </div>
</div>
@endsection