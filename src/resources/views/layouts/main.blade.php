<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CopyPastebin</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('images/favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
<header>
    <nav class="navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item logo" href="/">
                    <strong>
                        <span class="has-text-primary">
                            <i class="fas fa-paste"></i>
                        </span>
                        <span class="has-text-dark">Copy</span><span class="has-text-primary">Pastebin</span>
                    </strong>
                </a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-white" href="/search">
                            <span class="icon">
                                <i class="fas fa-search"></i>
                            </span>
                        </a>
                        @guest
                            <a class="button is-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="button is-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="dropdown is-hoverable" style="max-width:180px;">
                                <div class="dropdown-trigger" style="overflow-x: hidden;">
                                    <a class="button is-light" aria-haspopup="true" aria-controls="dropdown-menu">
                                        <span>{{ Auth::user()->name }}</span>
                                        <span class="icon is-small">
                                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="/profile" class="dropdown-item">
                                            User Profile
                                        </a>
                                        <a href="/pastes" class="dropdown-item">
                                            User Pastes
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
</header>

@include('errors')

<section class="section">
    <div class="container">
        @yield('content')
    </div>
</section>

<section class="section">
    <div class="container">
        <hr>
        <div class="columns">
            <div class="column">
                <p class="subtitle" style="margin-bottom: 20px;"><b>Recent public pastes:</b></p>
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                    <tr class="is-selected">
                        <th>Title</th>
                        <th>Syntax</th>
                        <th>Expiration Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentPublicPastes as $pasteItem)
                        <tr>
                            <td><a href="/{{ $pasteItem->url }}">{{ $pasteItem->title }}</a></td>
                            <td class="syntax-type-field">{{ $pasteItem->syntax }}</td>
                            <td class="datetime-field">{{ $pasteItem->expiration_time }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="column">
                @auth
                    <p class="subtitle" style="margin-bottom: 20px;"><b>Your recent pastes:</b></p>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                        <tr class="is-selected">
                            <th>Title</th>
                            <th>Access Type</th>
                            <th>Syntax</th>
                            <th>Expiration Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recentPastesOfCurrentUser as $pasteItem)
                            <tr>
                                <td><a href="/{{ $pasteItem->url }}">{{ $pasteItem->title }}</a></td>
                                <td>{{ $pasteItem->access_type }}</td>
                                <td class="syntax-type-field">{{ $pasteItem->syntax }}</td>
                                <td class="datetime-field">{{ $pasteItem->expiration_time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endauth
                @guest
                    <h5 class="subtitle is-5">&#160;</h5>
                    <div class="message is-primary">
                        <div class="message-body">
                            <a href="/login">Login</a> or <a href="/register">register</a> to be able to manage your
                            pastes.
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="content has-text-centered">
        <p>Copypastebin by <a href="https://github.com/d3ple">d3ple</a></p>
    </div>
</footer>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/shades-of-purple.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlightjs-line-numbers.js/2.7.0/highlightjs-line-numbers.min.js"></script>

<script>
    setCurrentAccessTypeForSelectors();
    transformSyntaxTypeFields();
    transformDateTimeFields();
    hljs.initHighlightingOnLoad();
    hljs.initLineNumbersOnLoad();
</script>

</body>
</html>