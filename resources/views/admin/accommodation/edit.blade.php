@extends('layouts.creation')

@section('page-title', 'Edit Accommodation')

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

        <form id="formHandler" action="{{ route('admin.accommodation.update', $accommodation->slug) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <h5>Title</h5>
            <div class="form-floating mb-5">
                <input type="text" class="form-control {{ $errors->has('$title') ? 'is-invalid' : '' }}" name="title"
                    id="titleInput" placeholder="Insert a title..." value="{{ old('title') ?? $accommodation->title }}" required="required">
                <label for="titleInput">Insert a title for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('title') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>
            <div class="d-none">

                <h5>Slug</h5>
                <div class="form-floating mb-5">
                    <input type="text" class="form-control {{ $errors->has('$slug') ? 'is-invalid' : '' }}"
                        name="slug" id="slugInput" placeholder="Insert a slug..." value="{{ old('slug') ?? $accommodation->slug }}">
                    <label for="slugInput">Insert a slug for your accommodation</label>
                    <div class="invalid-feedback">
                        @foreach ($errors->get('slug') as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                </div>
            </div>


            <h5>Image</h5>
            <div class="form-group mb-5">

                <img src="{{asset('storage/'. $accommodation->image)}}" alt="" height="500">
                <div class="d-flex">
                    
                    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"
                        id="image" value="{{$accommodation->image}}" required="required">

                </div>
                <div class="invalid-feedback">
                    @foreach ($errors->get('image') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>


            <h5>Description</h5>
            <div class="form-floating mb-5">
                <textarea type="text" rows="5"
                    class="form-control formTextArea {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                    id="descriptionInput" placeholder="Insert a description..." required="required">{!! old('description') ?? $accommodation->description !!}</textarea>
                <label for="descriptionInput">Insert a description for your accommodation</label>
                <div class="invalid-feedback">
                    @foreach ($errors->get('description') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <hr>

            <h5 class="mt-5 mb-4">Typology</h5>
            <div class="row">
                @foreach ($typologies as $type)
                    <div class="col-6 form-check cardForm mb-4" style="padding-left: 0.5em">
                        <input class="form-check-input d-none @error('typology_id') is-invalid @enderror" type="radio"
                            name="typology_id" required="required" id="{{ $type->id }}" value="{{ $type->id }}" @if(old('typology_id') == $type->id || $accommodation->typology_id == $type->id) checked @endif>
                        <label class="form-check-label basicBtn formBtn px-4 py-3" for="{{ $type->id }}">
                            {{ $type->name }}
                        </label>
                    </div>
                @endforeach
                @error('typology_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <div class="row my-5">

                <div class="col-6">
                    <h5>Bathrooms</h5>
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}"
                            name="bathrooms" id="bathroomsInput" placeholder="Insert number of bathrooms..."
                            value="{{ old('bathrooms') ?? $accommodation->bathrooms }}" required="required">
                        <label for="bathroomsInput">Insert the number of bathrooms</label>
                        <div class="invalid-feedback">
                            @foreach ($errors->get('bathrooms') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <h5>Beds</h5>
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control {{ $errors->has('beds') ? 'is-invalid' : '' }}"
                            name="beds" id="bedsInput" placeholder="Insert number of beds..."
                            value="{{ old('beds') ?? $accommodation->beds }}" required="required">
                        <label for="bedsInput">Insert the number of beds</label>
                        <div class="invalid-feedback">
                            @foreach ($errors->get('beds') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <h5>Rooms</h5>
                    <div class="form-floating">
                        <input type="text" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}"
                            name="rooms" id="roomsInput" placeholder="Insert number of rooms..."
                            value="{{ old('rooms') ?? $accommodation->rooms }}" required="required">
                        <label for="roomsInput">Insert the number of rooms</label>
                        <div class="invalid-feedback">
                            @foreach ($errors->get('rooms') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <h5>Square meters</h5>
                    <div class="form-floating">
                        <input type="number" class="form-control {{ $errors->has('mt_square') ? 'is-invalid' : '' }}"
                            name="mt_square" id="mtSquareInput" placeholder="Insert latitude..."
                            value="{{ old('mt_square') ?? $accommodation->mt_square }}" required="required">
                        <label for="mtSquareInput">Insert the number of square meters</label>
                        <div class="invalid-feedback">
                            @foreach ($errors->get('mt_square') as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            

            <hr>

            <h5 class="mt-5">Address</h5>

            <div class="form-floating mb-5">


                <input class="form-control" list="datalistOptions" name="address" id="exampleDataList" placeholder="Type to search..." value="{{ old('address') ?? $accommodation->address }}" required="required">
                <label for="exampleDataList">Type to search...</label>
                <datalist id="datalistOptions">

                </datalist>

            </div>

            <div class="row d-none">


                <div class="col-6 ">
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control" name="latitude" id="latitudeInput"
                            value="{{ old('latitude') }}" >
                    </div>
                </div>

                {{-- Longitude --}}
                <div class="col-6 ">
                    <div class="form-floating mb-5">
                        <input type="text" class="form-control" name="longitude" id="longitudeInput"
                            value="{{ old('longitude') }}">
                    </div>
                </div>

            </div>
            <hr>

            <div>
                <h5 class="pb-3 mt-5">Insert the services for your accommodation</h5>
            </div>
            <div class="row gx-5 mb-5">
                @foreach ($services as $service)
                    <div class="col-6 form-check cardForm">
                        <input class="form-check-input my-4 d-none" name="services[]" type="checkbox" {{ in_array($service->name,$control) ? 'checked' : '' }}
                            value="{{ $service->id }}" id="{{ $service->name }}">
                        <label class="form-check-label basicBtn formBtn ms-1 px-4 py-3 my-2"
                            for="{{ $service->name }}"><i
                                class="fa-solid pe-2 {{ $service->icon }}"></i>{{ $service->name }}</label>
                    </div>
                @endforeach
            </div>

            <hr>

            <div class="my-5">
                <div class="form-check form-switch">
                    <input class="form-check-input formSwitch" type="checkbox" role="switch" id="availableInput"
                        name="available" checked>
                    <label class="form-check-label" for="availableInput">
                        <h5>Is it visible?</h5>
                    </label>
                </div>
                <div class="invalid-feedback">
                    @foreach ($errors->get('available') as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>

            <hr>

            <button type="submit" class="basicBtn bigBtn primaryBtn mt-5">Save</button>

        </form>

    </div>
@endsection