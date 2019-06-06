@extends('layouts.main')

@section('content')
    <h1 class="title">
        Pastes by {{ auth()->user()->name }}
    </h1>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr style="background-color: hsl(48, 100%, 67%);">
                <th>#</th>
                <th>Title</th>
                <th>Syntax</th>
                <th>Creation Time</th>
                <th>Expiration Time</th>
                <th>Access</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userPastes as $pasteItem)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td><a href="/{{ $pasteItem->url }}">{{ $pasteItem->title }}</a></td>
                <td class="syntax-type-field">{{ $pasteItem->syntax }}</td>
                <td>{{ $pasteItem->created_at }}</td>
                <td class="expiration-time-field">{{ $pasteItem->expiration_time }}</td>
                <td>
                    <form method="POST" action="/">
                        @method('PATCH')
                        @csrf
                        <div class="field has-addons ">
                            <div class="control ">
                                <div class="select ">
                                    <select class="selected-access-type" name="access_type"
                                            curvalue="{{ $pasteItem->access_type }}">
                                        <option value="public">Public</option>
                                        <option value="unlisted">Unlisted</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control">
                                <button class="button is-link is-outlined" type="submit">
                                    <span class="icon is-small">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" readonly name="id" value="{{ $pasteItem->id }}"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $userPastes->links() }}
@endsection