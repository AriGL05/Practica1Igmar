{{-- edit_moon_form.blade.php --}}

@extends('dashboard.index') {{-- Extend the layout --}}

@section('content') {{-- Start the content section --}}

    <div class="floating-user-table form-container">
        <h2>Edit Moon: {{ $moon->name }}</h2>

        <div class="form-navigation">
            <a href="{{ route('moons.list') }}" class="back-button">Back to Moons</a>
            <div class="badge bg-primary">
                Server Node: {{ config('app.node') }}
            </div>
        </div>

        <form action="{{ route('moons.update', $moon->id) }}" method="POST" class="two-column-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $moon->name }}" required>
            </div>

            <div class="form-group">
                <label for="planet">Planet:</label>
                <input type="text" name="planet" id="planet" value="{{ $moon->planet }}" required>
            </div>

            <div class="form-group">
                <label for="diameter_km">Diameter (km):</label>
                <input type="number" name="diameter_km" id="diameter_km" value="{{ $moon->diameter_km }}" required>
            </div>

            <div class="form-group">
                <label for="mass_kg">Mass (kg):</label>
                <input type="text" name="mass_kg" id="mass_kg" value="{{ $moon->mass_kg }}" required>
            </div>

            <div class="form-group">
                <label for="discovery_year">Year Discovered:</label>
                <input type="number" name="discovery_year" id="discovery_year" maxlength="4" pattern="[0-9]{4}"
                    oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="{{ $moon->discovery_year }}">
            </div>

            <div class="form-group">
                <label for="discovery_by">Discovered By:</label>
                <input type="text" name="discovery_by" id="discovery_by" value="{{ $moon->discovery_by }}">
            </div>

            <button type="submit" class="add-moon-button">Update Moon</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

@endsection {{-- End the content section --}}

<style>
    .form-container {
        min-height: 420px !important;
    }

    .form-navigation {
        display: flex;
        /* Enable Flexbox */
        justify-content: space-between;
        /* Put space between the items */
        align-items: center;
        /* Vertically align items in the center */
        margin-bottom: 15px;
        /* Add some space below the navigation */
    }

    .back-button {
        display: inline-block;
        padding: 8px 15px;
        text-decoration: none;
        color: #fff;
        background: #573b8a;
        /* Example gray color */
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background: #6d44b8;
    }

    .badge {
        padding: 0.5em 0.8em;
        border-radius: 0.25em;
        font-size: 0.9em;
        color: white;
    }

    .bg-primary {
        background-color: rgb(14, 9, 55);
        /* Example primary color */
    }

    .two-column-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* Creates two equal columns */
        gap: 15px;
        /* Space between the columns and rows */
        padding: 15px 0;
        /* Add some padding around the form groups */
    }

    .two-column-form .form-group {
        margin-bottom: 0;
        /* Remove default margin on form-groups */
    }

    /* Ensure the button spans both columns */
    .two-column-form button {
        grid-column: 1 / 3;
        /* Start at column 1, span to column 3 */
        margin-top: 20px;
        /* Add some space above the button */
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
</style>