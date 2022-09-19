@extends('layouts.creation')

@section('page-title', 'New Accommodation')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="text-end pb-5">
                    <a href="{{ route('admin.accommodation.index') }}" class="textLink me-2">
                        <i class="fa-solid fa-arrow-left pe-2"></i>
                        Back to accommodations
                    </a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                Errori di validazione:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.accommodation.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <h5>Title</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('$title') ? 'is-invalid' : '' }}" name="title" id="titleInput" placeholder="Insert a title..." value="{{ old('title') }}">
                <label for="titleInput">Insert a title for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('title') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Slug</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('$slug') ? 'is-invalid' : '' }}" name="slug" id="slugInput" placeholder="Insert a slug..." value="{{ old('slug') }}">
                <label for="slugInput">Insert a slug for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('slug') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Description</h5>
            <div class="form-floating mb-5">
                <textarea type="text" rows="5" class="form-control formTextArea {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="descriptionInput" placeholder="Insert a description...">{!! old('description') !!}</textarea>
                <label for="descriptionInput">Insert a description for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('description') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Typology</h5>
            <div class="form-group mb-5">
                <select type="text" name="typology_id" class="form-control @error('typology_id') is-invalid @enderror" value="{{ old('typology_id') }}" required>
                    <option value=""></option>
                    @foreach($typologies as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('typology_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <h5>Image</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="thumbInput" placeholder="Insert an image..." value="{{ old('image') }}">
                <label for="thumbInput">Insert an image for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Address</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="addressInput" placeholder="Insert an address..." value="{{ old('address') }}">
                <label for="addressInput">Insert an address for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('address') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Bathrooms</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" name="bathrooms" id="bathroomsInput" placeholder="Insert number of bathrooms..." value="{{ old('bathrooms') }}">
                <label for="bathroomsInput">Insert the number of bathrooms for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('bathrooms') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Beds</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('beds') ? 'is-invalid' : '' }}" name="beds" id="bedsInput" placeholder="Insert number of beds..." value="{{ old('beds') }}">
                <label for="bedsInput">Insert the number of beds for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('beds') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Rooms</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" name="rooms" id="roomsInput" placeholder="Insert number of rooms..." value="{{ old('rooms') }}">
                <label for="roomsInput">Insert the number of rooms for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('rooms') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Square meters</h5>
            <div class="form-floating mb-5">
                <input type="number" class="form-control {{ $errors->has('mt_square') ? 'is-invalid' : '' }}" name="mt_square" id="mtSquareInput" placeholder="Insert latitude..." value="{{ old('mt_square') }}">
                <label for="mtSquareInput">Insert the number of square meters for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('mt_square') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Latitude</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" name="latitude" id="latitudeInput" placeholder="Insert latitude..." value="{{ old('latitude') }}">
                <label for="latitudeInput">Insert the latitude for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('latitude') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Longitude</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" name="longitude" id="longitudeInput" placeholder="Insert longitude..." value="{{ old('longitude') }}">
                <label for="longitudeInput">Insert the longitude for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('longitude') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <h5>Available</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('available') ? 'is-invalid' : '' }}" name="available" id="availableInput" placeholder="Insert longitude..." value="{{ old('available') }}">
                <label for="availableInput">Is it visible?</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('available') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div>
                <h5>Insert the services for your accommodation</h5>
            </div>
            @foreach($services as $service)
                <div class="form-check">
                        <input class="form-check-input" name="services[]" type="checkbox" value="{{ $service->id }}" id="{{ $service->name }}">
                        <label class="form-check-label" for="flexCheckDefault">{{ $service->name }}</label>
                </div>
            @endforeach


            <button type="submit" class="basicBtn bigBtn primaryBtn mt-5">Save</button>

        </form>

    </div>
@endsection
