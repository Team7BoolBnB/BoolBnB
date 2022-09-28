@extends('layouts.welcome')

@section('page-title', 'Verify Email')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h2>Verifiy your email address</h2>
                        </div>
                        <div class="pt-5">

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="basicBtn bigBtn primaryBtn">{{ __('click here to request another') }}</button>.
                            </form>

                        </div>
                        <div class="pt-5 text-center">
                            <hr>
                            <div class="pt-3">
                                <a href="/login" class="textLink text-decoration-none">
                                    <i class="fa-solid fa-arrow-left pe-2"></i>
                                    Back to login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
