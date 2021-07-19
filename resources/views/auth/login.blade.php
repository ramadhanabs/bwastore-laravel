@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="page-content page-login">
      <section class="login">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="100">
              <img src="/images/login-picture.png" alt="" class="thumbnail-image w-50 mb-5 mb-lg-0" />
            </div>
            <div class="col-lg-5 align-items-sm-center" data-aos="fade-right" data-aos-delay="100">
                <h4>Belanja kebutuhan utama, <br />semua jadi mudah</h4>
                <form method="POST" action="{{ route('login') }}" class="mt-3">
                @csrf
                    <div class="form-group mt-4">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-success w-75 mt-4">Sign in to my account</button>
                        <a href="{{route('register')}}" class="btn btn-light w-75 mt-2">Sign Up</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

@section('content')
<div class="container invisible">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
