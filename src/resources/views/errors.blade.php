@if ($errors->any())
    <section class="section">
        <div class="container">
            <div class="message is-danger">
                <div class="message-header">
                    <p>Error</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endif