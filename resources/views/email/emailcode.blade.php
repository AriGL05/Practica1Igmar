@extends('template.app')
@section('title')
    Not Found
@endSection
@section('content')
<div class="signup">
    <div style="padding: 10px;">
        <h2>Moon Skys</h2>
        <p>Please insert this code in the application</p>
        <p>This code will be valid for 5 min and it's single use.</p>
        <a><h1 class="code" >{{$code}}</h1></a>
    </div>
</div>
@endsection