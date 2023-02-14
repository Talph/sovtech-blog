@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row m-5">
                            <div class="col-lg-12">
                                <div class="p-2">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome! Register to our Blog!</h1>
                                    </div>
                                    @include('partials.alert')
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <small>First name:</small>
                                                <label class="sr-only" for="name">{{ __('First name') }}</label>
                                                <div class="mb-2 mr-sm-2">
                                                    <input id="name" type="text" placeholder="John"
                                                           class="form-control  @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" required autocomplete="name"
                                                           autofocus>
                                                </div>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <small>Surname:</small>
                                                <label class="sr-only" for="surname">{{ __('Surname') }}</label>
                                                <div class="mb-2 mr-sm-2">
                                                    <input id="surname" type="text" placeholder="Doe"
                                                           class="form-control  @error('surname') is-invalid @enderror"
                                                           name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                                                           autofocus>
                                                </div>

                                                @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <small>Email address:</small>
                                                <label class="sr-only" for="email">{{ __('E-Mail Address') }}</label>
                                                <div class="mb-2 mr-sm-2">
                                                    <input id="email" type="email" placeholder="john@shanda.com"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required autocomplete="email">
                                                </div>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <small>Password:</small>
                                                <label class="sr-only" for="password">{{ __('Password') }}</label>
                                                <div class="mb-2 mr-sm-2">
                                                    <input id="password" type="password" placeholder="********"
                                                           class="form-control  @error('password') is-invalid @enderror"
                                                           name="password" required autocomplete="new-password">
                                                </div>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <small>Confirm password:</small>
                                                <label class="sr-only"
                                                       for="password-confirm">{{ __('Confirm Password') }}</label>
                                                <div class="mb-2 mr-sm-2">
                                                    <input id="password-confirm" type="password" placeholder="********"
                                                           class="form-control" name="password_confirmation" required
                                                           autocomplete="new-password">
                                                </div>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">


                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn col-md-12 btn-primary">
                                                    {{ __('Get Started') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <small>By clicking the "Get Started" button, you consent to the use of cookies and similar
                                        technologies described in our <a href="#">Privacy Policy.</a></small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
