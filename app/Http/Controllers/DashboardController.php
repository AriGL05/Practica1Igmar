<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moon;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'planet' => 'required|string|max:100',
            'diameter_km' => 'required|numeric',
            'mass_kg' => 'required|string|max:100',
            'discovery_year' => 'nullable|integer|digits:4',
            'discovery_by' => 'nullable|string|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moon = new Moon();
        $moon->name = $request->name;
        $moon->planet = $request->planet;
        $moon->diameter_km = $request->diameter_km;
        $moon->mass_kg = $request->mass_kg;
        $moon->discovery_year = $request->discovery_year;
        $moon->discovery_by = $request->discovery_by;
        try {
            $moon->save();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(["msg" => "Internal error. Moon was not saved."])
                ->withInput();
        }

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

    public function update(Request $request, $moon)
    {
        $moon = Moon::find($moon);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'planet' => 'required|string|max:100',
            'diameter_km' => 'required|numeric',
            'mass_kg' => 'required|string|max:100',
            'discovery_year' => 'nullable|integer|digits:4',
            'discovery_by' => 'nullable|string|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $moon->name = $request->name;
        $moon->planet = $request->planet;
        $moon->diameter_km = $request->diameter_km;
        $moon->mass_kg = $request->mass_kg;
        $moon->discovery_year = $request->discovery_year;
        $moon->discovery_by = $request->discovery_by;
        try {
            $moon->save();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(["msg" => "Internal error. Moon was not saved."])
                ->withInput();
        }

        return redirect()->route('moons.list')->with('success', 'Moon updated successfully!');
    }

    public function destroy(Moon $moon)
    {
        $moon->delete();
        return redirect()->route('moons.list')->with('success', 'Moon deleted successfully!');
    }
}
