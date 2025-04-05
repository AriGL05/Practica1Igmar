@extends('template.app')
@section('title')
Verify Code
@endSection
@section('content')
    <div class="signup">
        <form method="POST" action="{{route('index.verifycode.verify', ['userId' => $userId]) }}">
            @csrf
            @method('POST')
            <label>Verify Code</label>
            <div>
                A code was sent to your email. Please insert the code.
            </div>
            <input type="text" name="code" placeholder="Code" required="" minlength="6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" id="sign-button" disabled>Verify</button>
            <div>
                <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}
                    data-callback="enableSubmitButton" data-expired-callback="disableSubmitButton"></div>
            </div>
            <div class="badge bg-primary">
                Server Node: {{ config('app.node') }}
            </div>
        </form>
    </div>
@endsection