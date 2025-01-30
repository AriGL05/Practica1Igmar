@extends('template.app')
@section('title')
    Sign Up
@endsection
@section('content')
<div class="signup">
    <form method="POST" action="/signup">
        @csrf
        @method('POST')
        <label>Sign up</label>
        <input type="text" name="username" placeholder="User name" required="">
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button type="submit" id="sign-button"disabled>Sign up</button>
        <div>Already have an account? <a href="/login">Login!</a></div>
        <div>
            <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}} data-callback="enableSubmitButton" 
            data-expired-callback="disableSubmitButton"></div>
        </div>
    </form>
</div>
@endsection