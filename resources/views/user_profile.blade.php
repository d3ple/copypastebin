@extends('layouts.main')

@section('content')
    <h1 class="title">
        User profile
    </h1>
    <form method="POST" action="/profile" >
        @method('PATCH')
        @csrf
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Email</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="input email" name="email"
                               value="{{ auth()->user()->email }}" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Name</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="name" value="{{ auth()->user()->name }}" placeholder="input name" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user-circle"></i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @if(!auth()->user()->auth_provider)
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Password</label>
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="password"
                               placeholder="leave empty if you don't want to change">
                        <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Confirm password</label>
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="password_confirmation"
                               placeholder="leave empty if you don't want to change">
                        <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endif
        <button class="button is-warning" type="submit">Update profile</button>
    </form>
@endsection