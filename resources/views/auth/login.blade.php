@extends('layouts.auth')

@section('content')
    <section class="hero is-fullheight is-medium is-bold">
        <div class="hero-body">
            <div class="container">
                <form method="POST" action="{{ route('login') }}"
                      style="width: 300px; margin-left: auto; margin-right: auto;" id="submitForm">
                    @csrf
                    <h1 class="title is-2 has-text-centered"><span class="underline">{{ __('Login') }}</span></h1><br>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="email" type="email"
                                   class="input form-control @error('email') is-danger @enderror" name="email"
                                   value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus
                                   required>
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
                                   name="password" autocomplete="current-password" placeholder="Password" required>
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                        @error('password')
                        <p class="help is-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="field">
                        <p class="control">
                            <button class="button is-warning is-medium is-fullwidth" type="submit"
                                    id="submitBtn" onclick="doAfterSubmit()">
                                Let me in
                            </button>
                        </p>
                    </div>
                    <br>
                    <div class="field">
                        <p class="control">
                        <div class="columns">
                            <div class="column">
                                <a href="{{ url('/auth/google') }}" class="button is-fullwidth is-light is-rounded">
                                    <span class="icon"><i class="fab fa-google"></i></span>
                                    <span>Google</span>
                                </a>
                            </div>
                            <div class="column">
                                <a href="{{ url('/auth/github') }}" class="button is-fullwidth is-light is-rounded">
                                    <span class="icon"><i class="fab fa-github"></i></span>
                                    <span>Github</span>
                                </a>
                            </div>
                        </div>
                        </p>
                    </div>
                    <hr>
                    <p class="help has-text-centered">
                        Don't have an account? <a href="/register">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
