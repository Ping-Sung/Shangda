@extends('layouts.frontend.master')

@push('CustomJS')
    {{-- <script src="{{ asset('js/frontend/products/show.js') }}" defer></script> --}}
@endpush

@push('CustomCSS')
    <link href="{{  asset('css/frontend/consumers/login.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<section class="header">
    <div class="container">
        <h2 class="title">客戶登入</h2>
    </div>
    <div class="bg-image"></div>
    <div class="bg-gray"></div>
</section>

<section class="login-form">
    <div class="container login-container">
        <div class="login-content">
            <form method="POST" action="#">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="#">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <a class="btn btn-link" href="#">註冊</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>

@endsection