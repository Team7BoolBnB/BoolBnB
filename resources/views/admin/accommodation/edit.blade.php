@extends('layouts.app')

@section('content')

    <div class="pageHeader d-flex align-items-center">
        <div class="container text-white">
            <h2>Edit "{{ $accommodation->title }}"</h2>
        </div>
    </div>

    <div class="container pt-5">

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

        <form action="{{ route('admin.accommodation.update', $accommodation->id) }}" method="post">

            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" class="form-control {{ $errors->has('$title') ? 'is-invalid' : '' }}" name="title"
                    id="titleInput" placeholder="Insert a title..." value="{{ old('title') ?? $accommodation->title }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('title') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="descriptionInput" class="form-label">Description</label>
                <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                    id="descriptionInput" placeholder="Insert a description...">{!! old('description') ?? $accommodation->description !!}</textarea>
                <div class="invalid-feedback">
                    @foreach ($errors->get('description') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="imageInput" class="form-label">Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image"
                    id="imageInput" placeholder="Insert an image..." value="{{ old('image') ?? $accommodation->image }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="addressInput" class="form-label">Address</label>
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"
                    id="addressInput" placeholder="Insert an address..."
                    value="{{ old('address') ?? $accommodation->address }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('address') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="bathroomsInput" class="form-label">Bathrooms</label>
                <input type="text" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}"
                    name="bathrooms" id="bathroomsInput" placeholder="Insert number of bathrooms..."
                    value="{{ old('bathrooms') ?? $accommodation->bathrooms }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('bathrooms') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="bedsInput" class="form-label">Beds</label>
                <input type="text" class="form-control {{ $errors->has('beds') ? 'is-invalid' : '' }}" name="beds"
                    id="bedsInput" placeholder="Insert number of beds..."
                    value="{{ old('beds') ?? $accommodation->beds }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('beds') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="roomsInput" class="form-label">Rooms</label>
                <input type="text" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" name="rooms"
                    id="roomsInput" placeholder="Insert number of rooms..."
                    value="{{ old('rooms') ?? $accommodation->rooms }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('rooms') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="latitudeInput" class="form-label">Latitude</label>
                <input type="text" class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" name="latitude"
                    id="latitudeInput" placeholder="Insert latitude..."
                    value="{{ old('latitude') ?? $accommodation->latitude }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('latitude') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="longitudeInput" class="form-label">Longitude</label>
                <input type="text" class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" name="longitude"
                    id="longitudeInput" placeholder="Insert longitude..."
                    value="{{ old('longitude') ?? $accommodation->longitude }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('longitude') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="d-flex align-items-center py-5">
                <a href="{{ route('admin.accommodation.index') }}" class="basicBtn bigBtn secondaryBtn me-2">
                    <i class="fa-solid fa-arrow-left pe-2"></i>
                    Cancel
                </a>
                <button type="submit" class="basicBtn bigBtn primaryBtn">Save</button>
            </div>

        </form>

    </div>
@endsection
