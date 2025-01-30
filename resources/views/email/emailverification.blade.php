@extends('template.app')
@section('title')
    Welcome
@endSection
@section('content')
<div class="signup">
    <div style="padding: 10px;">
        <h2>Welcome!</h2>
        <p>Please click the link below to verify your email and activate your account.</p>
        <a href="{{$url}}">Verify Email</a>
    </div>
</div>
@endsection
