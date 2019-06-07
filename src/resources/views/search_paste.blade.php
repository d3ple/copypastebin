@extends('layouts.main')

@section('content')
    <h1 class="title">
        Search Paste
    </h1>
    <form method="POST" action="/search" id="submitForm">
        @csrf
        <div class="field has-addons">
            <div class="control" style="width:35%;">
                <input class="input" name="query" type="text" placeholder="e.g. Hello world" required>
            </div>
            <div class="control">
                <button class="button is-warning" type="submit" id="submitBtn" onclick="doAfterSubmit()">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <label class="radio">
                    <input type="radio" name="search-type" value="both">
                    by title and content
                </label>
                <label class="radio">
                    <input type="radio" name="search-type" value="content">
                    by content
                </label>
                <label class="radio">
                    <input type="radio" name="search-type" value="title" required>
                    by title
                </label>
            </div>
        </div>
    </form>
    @isset($searchResults)
        @if(sizeof($searchResults) > 0)
        <br><br>
        <h1 class="title">
            Results found for <i>"{{ $searchQuery }}"</i>
        </h1>
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Title</th>
                    <th>Syntax Type</th>
                    <th>Creation Time</th>
                    <th>Expiration Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($searchResults as $pasteItem)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td><a href="/{{ $pasteItem->url }}">{{ $pasteItem->title }}</a></td>
                        <td class="syntax-type-field">{{ $pasteItem->syntax }}</td>
                        <td>{{ $pasteItem->created_at }}</td>
                        <td class="datetime-field">{{ $pasteItem->expiration_time }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <br>
            <div class="message is-info">
                <div class="message-body">
                    <p>Nothing were found for <i>"{{ $searchQuery }}"</i>.</p>
                    <p>Maybe you need to change your search parameters and try again.</p>
                </div>
            </div>
        @endif
    @endisset
@endsection