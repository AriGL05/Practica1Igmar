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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'
            // Add other validation rules as needed
        ]);
        return redirect()->route('moons.list')->with('success', 'Moon updated successfully!');
    }
    public function list()
    {
        $moons = Moon::all();
        return view('moons.list', compact('moons'));
    }

    public function edit(Moon $moon)
    {
        return view('dashboard.edit', compact('moon'));
    }

    public function update(Request $request, Moon $moon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $moon->id,
            // Add other validation rules as needed
        ]);

        $moon->update($request->all());

        return redirect()->route('moons.list')->with('success', 'Moon updated successfully!');
    }

    public function destroy(Moon $moon)
    {
        $moon->delete();
        return redirect()->route('moons.list')->with('success', 'Moon deleted successfully!');
    }
}
