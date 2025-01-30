@extends('template.app')
@section('title')
    Account Created
@endSection
@section('content')
<div class="signup">
    <div style="padding: 10px;">
        <h1>Successful Register!</h1>
        <p>Your account has been activated successfully.</p>
    </div>
</div>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('index.login') }}"; 
    }, 3000);
</script>
@endsection
