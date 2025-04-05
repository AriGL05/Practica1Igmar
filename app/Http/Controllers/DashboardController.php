<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Moon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $moons = Moon::all();
        return response()->view('dashboard.index', compact('moons'))
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache');
    }
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'planet' => 'required|string|max:255',
            'diameter_km' => 'required|numeric',
            'mass_kg' => 'required|string|max:255',
            'discovery_year' => 'required|integer',
            'discovery_by' => 'required|string|max:255',
        ]);

        Moon::create($validatedData);

        return redirect()->route('moons.list')->with('success', 'Moon updated successfully!');
    }
    public function store()
    {
        return view('dashboard.add');
    }
    public function list()
    {
        $moons = Moon::all();
        return view('dashboard.list', compact('moons'));
    }

    public function edit(Moon $moon)
    {
        return view('dashboard.edit', compact('moon'));
    }

    public function update(Request $request, Moon $moon)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'planet' => 'required|string|max:255',
            'diameter_km' => 'required|numeric',
            'mass_kg' => 'required|string|max:255',
            'discovery_year' => 'required|integer',
            'discovery_by' => 'required|string|max:255',
        ]);

        $moon->update($validatedData);

        return redirect()->route('moons.list')->with('success', 'Moon updated successfully!');
    }

    public function destroy(Moon $moon)
    {
        $moon->delete();
        return redirect()->route('moons.list')->with('success', 'Moon deleted successfully!');
    }
}
