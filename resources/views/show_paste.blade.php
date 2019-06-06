@extends('layouts.main')

@section('content')
    @if($isExpired)
        <div class="message is-warning">
            <div class="message-body">
                <p><strong>This paste is no longer available.</strong></p>
                It has either expired, been removed by its creator, or removed by one of the Copypastebin staff.
            </div>
        </div>
    @elseif($isPrivate)
        <div class="message is-warning">
            <div class="message-body">
                <p><strong>This paste isn't available.</strong></p>
                The author made this paste private.
            </div>
        </div>
    @else
        <h1 class="title">{{ $paste->title }}
            <span title="Access Type" class="tag is-info">{{ $paste->access_type }}</span>
            <span title="Syntax" class="tag is-primary syntax-type-field">{{ $paste->syntax }}</span>
            <span title="Expiration Time" class="tag is-warning expiration-time-field">{{ $paste->expiration_time }}</span>
        </h1>
        <pre class="paste-container">
            <code class="paste-area {{ $paste->syntax }}">{{ $paste->data }}</code>
        </pre>
    @endif
@endsection