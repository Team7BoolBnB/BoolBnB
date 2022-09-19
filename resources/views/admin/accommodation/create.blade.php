@extends('layouts.app')

@section('content')
    <div class="container">

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

            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input type="text" class="form-control {{ $errors->has('$title') ? 'is-invalid' : '' }}" name="title"
                    id="titleInput" placeholder="Insert a title..." value="{{ old('title') }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('title') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="descriptionInput" class="form-label">Description</label>
                <textarea type="text" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                    id="descriptionInput" placeholder="Insert a description...">{!! old('description') !!}</textarea>
                <div class="invalid-feedback">
                    @foreach ($errors->get('description') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            {{-- <div class="mb-3">
                <label for="typologyInput" class="form-label">Typology</label>
                <textarea type="text" class="form-control {{ $errors->has('typology_id') ? 'is-invalid' : '' }}" name="typology_id"
                    id="typologyInput" placeholder="Insert a description...">{!! old('typology_id') !!}</textarea>
                <div class="invalid-feedback">
                    @foreach ($errors->get('typology_id') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div> --}}

            <div class="form-group mb-3">
                <label for="typologyInput" class="form-label">Typology</label>
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

            <div class="mb-3">
                <label for="thumbInput" class="form-label">Image</label>
                <input type="text" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image"
                    id="thumbInput" placeholder="Insert an image..." value="{{ old('image') }}">
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
                    value="{{ old('address') }}">
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
                    value="{{ old('bathrooms') }}">
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
                    value="{{ old('beds') }}">
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
                    value="{{ old('rooms') }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('rooms') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            {{-- cambiare tipologia colonna?  --}}
            <div class="mb-3">
                <label for="mtSquareInput" class="form-label">Square Metre</label>
                <input type="number" class="form-control {{ $errors->has('mt_square') ? 'is-invalid' : '' }}" name="mt_square"
                    id="mtSquareInput" placeholder="Insert latitude..."
                    value="{{ old('mt_square') }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('mt_square') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="latitudeInput" class="form-label">Latitude</label>
                <input type="text" class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" name="latitude"
                    id="latitudeInput" placeholder="Insert latitude..."
                    value="{{ old('latitude') }}">
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
                    value="{{ old('longitude') }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('longitude') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="availableInput" class="form-label">Available</label>
                <input type="text" class="form-control {{ $errors->has('available') ? 'is-invalid' : '' }}" name="available"
                    id="availableInput" placeholder="Insert longitude..."
                    value="{{ old('available') }}">
                <div class="invalid-feedback">
                    @foreach ($errors->get('available') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>


            <button type="submit" class="btn btn-success mt-3 mb-1">Save</button>
            <a href="{{ route('admin.accommodation.index') }}" class="btn btn-secondary mt-3 mb-1">Cancel</a>

        </form>

    </div>
@endsection
