@extends('layouts.main')

@section('content')
    <form method="POST" id="submitForm" action="/">
        @csrf
        <div class="columns">
            <div class="column is-four-fifths">
                <textarea class="textarea" placeholder="e.g. Hello world" rows="14" name="data" required></textarea>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label">Title:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input" name="title" value="Untitled"
                               required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Paste Expiration:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="expiration-time" required>
                                <option value='[{"unit": "", "time": ""}]'>Never</option>
                                <option value='[{"unit": "min", "time": "10"}]'>10 minutes</option>
                                <option value='[{"unit": "hour", "time": "1"}]'>1 hour</option>
                                <option value='[{"unit": "hour", "time": "3"}]'>3 hours</option>
                                <option value='[{"unit": "day", "time": "1"}]'>1 day</option>
                                <option value='[{"unit": "week", "time": "1"}]'>1 week</option>
                                <option value='[{"unit": "month", "time": "1"}]'>1 months</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Syntax Highlighting:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="syntax" required>
                                <option value="text hljs">Plain text</option>
                                <option value="html">HTML</option>
                                <option value="javascript">JS</option>
                                <option value="php">PHP</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Access</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="access_type" required>
                                <option value="public">Public</option>
                                <option value="unlisted">Unlisted</option>
                                @if( Auth::check() )
                                    <option value="private">Private</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-warning" id="submitBtn" onclick="doAfterSubmit()" type="submit">
                            <span>Create paste</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection