@extends('dashboard.index')
@section('content')

    <div class="floating-user-table">
        <div style="text-align: center;">
            <a href="{{ route('moons.create') }}">
                <button id="addMoonButton" class="add-moon-button">Add Moon</button>
            </a>
        </div>
        <div class="badge bg-primary">
            Server Node: {{ config('app.node') }}
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Planet</th>
                        <th>Diameter (km)</th>
                        <th>Mass (kg)</th>
                        <th>Year Discovered</th>
                        <th>Discovered By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($moons as $moon)
                        <tr>
                            <td>{{ $moon->name }}</td>
                            <td>{{ $moon->planet }}</td>
                            <td>{{ $moon->diameter_km }}</td>
                            <td>{{ $moon->mass_kg }}</td>
                            <td>{{ $moon->discovery_year }}</td>
                            <td>{{ $moon->discovery_by }}</td>
                            <td class="actions">
                                <a href="{{ route('moons.edit', $moon->id) }}">Edit</a>
                                <form action="{{ route('moons.destroy', $moon->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this moon?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="7">No moons found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')