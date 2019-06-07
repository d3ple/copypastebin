@extends('layouts.auth')

@section('content')
    <section class="hero is-fullheight is-medium is-bold">
        <div class="hero-body">
            <div class="container">
                <form method="POST" action="{{ route('register') }}"
                      style="width: 300px; margin-left: auto; margin-right: auto;" id="submitForm">
                    @csrf
                    <h1 class="title is-2 has-text-centered"><span class="underline">{{ __('Register') }}</span></h1><br>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="name" type="text" class="input form-control @error('name') is-danger @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Name') }}" autofocus required>
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                        </p>
                        @error('name')
                        <p class="help is-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="email" type="email" class="input form-control @error('email') is-danger @enderror"
                                   name="email"
                                   value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('E-Mail Address') }}" required>
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                        </p>
                        @error('email')
                        <p class="help is-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password" type="password"
                                   class="input form-control @error('password') is-danger @enderror"
                                   name="password" autocomplete="new-password" placeholder="{{ __('Password') }}" required>
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                        @error('password')
                        <p class="help is-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation"
                                   autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" required>
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <button class="button is-warning is-medium is-fullwidth" id="submitBtn" onclick="doAfterSubmit()">
                                Let me in
                            </button>
                        </p>
                    </div>
                    <br>
                    <div class="field">
                        <p class="control">
                        <div class="columns">
                            <div class="column">
                                <a href="{{ url('/auth/twitter') }}" class="button is-fullwidth is-light is-rounded">
                                    <span class="icon"><i class="fab fa-github"></i></span>
                                    <span>Twitter</span>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ url('/auth/github') }}" class="button is-fullwidth is-light is-rounded">
                                    <span class="icon"><i class="fab fa-twitter"></i></span>
                                    <span>Github</span>
                                </a>
                            </div>
                        </div>
                        </p>
                    </div>
                    <hr>
                    <p class="help has-text-centered">
                        Already have an account? <a href="/login">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
