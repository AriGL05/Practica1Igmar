@extends('template.app')
@section('title')
    Login
@endSection
@section('content')
<div class="signup">
    <form method="POST" action="/verifycode">
        @csrf
        @method('POST')
        <label>Verify Code</label>
        <div>
            A code was sent to your email. Please insert the code.
        </div>
        <input type="number" name="code" placeholder="Code" required="" minlength="6">
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
            <script>
                setTimeout(function() {
                    @if(auth()->check())
                        window.location.href = "{{ route('dashboard.index') }}"; 
                    @endif
                }, 3000);
            </script>
        @endif
        <button type="submit" id="sign-button">Verify</button>
    </form>
</div>
@endsection