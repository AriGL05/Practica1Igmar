@extends('dashboard.index') {{-- Extend the layout --}}

@section('content') {{-- Start the content section --}}

    <div class="floating-user-table">
        <h2>Add New Moon</h2>

        <form action="{{ route('moons.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="planet">Planet:</label>
                <input type="text" name="planet" id="planet" required>
            </div>

            <div class="form-group">
                <label for="diameter_km">Diameter (km):</label>
                <input type="number" name="diameter_km" id="diameter_km" required>
            </div>

            <div class="form-group">
                <label for="mass_kg">Mass (kg):</label>
                <input type="text" name="mass_kg" id="mass_kg" required>
            </div>

            <div class="form-group">
                <label for="discovery_year">Year Discovered:</label>
                <input type="number" name="discovery_year" id="discovery_year" required>
            </div>

            <div class="form-group">
                <label for="discovery_by">Discovered By:</label>
                <input type="text" name="discovery_by" id="discovery_by" required>
            </div>

            <button type="submit" class="add-moon-button">Add Moon</button>
        </form>
    </div>

@endsection {{-- End the content section --}}

<style>
    .form-group {
        margin-bottom: 15px;
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