@extends('template.app')
@section('title')
    Login
@endSection
@section('content')
<div class="signup">
    <form method="POST" action="/login">
        @csrf
        @method('POST')
        <label>Login</label>
        <input type="email" name="email" placeholder="Email" required="">
        <input type="password" name="password" placeholder="Password" required="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" id="sign-button"disabled>Login</button>
        <div>Don't have an account? <a href="/signup">Sign Up!</a></div>
        <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}} data-callback="enableSubmitButton" 
        data-expired-callback="disableSubmitButton"></div>
    </form>
</div>
@endsection