<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Moon</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Edit Moon</h1>
        <form action="{{ route('moons.update', $moon) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $moon->name }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Planet</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $moon->planet }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Moon</button>
            <a href="{{ route('moons.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>