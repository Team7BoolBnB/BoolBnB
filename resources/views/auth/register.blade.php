@extends('layouts.welcome')

@section('page-title', 'Register')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h2>Nice to meet you!</h2>
                        </div>
                        <div class="pt-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col">

                                        {{-- Name --}}
                                        <div class="form-group row">
                                            <label for="firstName">
                                                <h6>{{ __('Name') }}</h6>
                                            </label>
                                            <div class="pb-4">
                                                <input id="firstName" type="text"
                                                    class="form-control @error('firstName') is-invalid @enderror"
                                                    name="firstName" value="{{ old('firstName') }}" required
                                                    autocomplete="firstName" autofocus>

                                                @error('firstName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">

                                        {{-- Last name --}}
                                        <div class="form-group row">
                                            <label for="lastName">
                                                <h6>{{ __('Surname') }}</h6>
                                            </label>
                                            <div class="pb-4">
                                                <input id="lastName" type="text"
                                                    class="form-control @error('lastName') is-invalid @enderror"
                                                    name="lastName" value="{{ old('lastName') }}" required
                                                    autocomplete="lastName" autofocus>

                                                @error('lastName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- Date --}}
                                <div class="form-group row">
                                    <label for="date">
                                        <h6>{{ __('Date of birth') }}</h6>
                                    </label>

                                    <div class="pb-4">
                                        <input id="date" type="date"
                                            class="form-control @error('dateOfBirth') is-invalid @enderror"
                                            name="dateOfBirth" value="{{ old('dateOfBirth') }}" required
                                            autocomplete="dateOfBirth">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group row">
                                    <label for="email">
                                        <h6>{{ __('E-Mail Address') }}</h6>
                                    </label>

                                    <div class="pb-4">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">

                                        {{-- Password --}}
                                        <div class="form-group row">
                                            <label for="password">
                                                <h6>{{ __('Password') }}</h6>
                                            </label>

                                            <div class="pb-4">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">

                                        {{-- Password confirm --}}
                                        <div class="form-group row">
                                            <label for="password-confirm">
                                                <h6>{{ __('Confirm Password') }}</h6>
                                            </label>

                                            <div class="pb-4">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                {{-- Submit --}}
                                <div class="form-group mb-0 row">
                                    <div class="col-md-8 offset-md-2 d-flex justify-content-center">
                                        <button type="submit" class="basicBtn bigBtn primaryBtn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Redirect to Login and homepage --}}
                        <div class="pt-5 text-center">
                            <div class="pb-3">
                                <p class="d-inline">Already registered?</p>
                                <a href="/login" class="textLink text-decoration-none ps-2">
                                    Login now!
                                </a>
                            </div>
                            <hr>
                            <div class="pt-3">
                                <a href="/" class="textLink text-decoration-none">
                                    <i class="fa-solid fa-arrow-left pe-2"></i>
                                    Back to homepage
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
