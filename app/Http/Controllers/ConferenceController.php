<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = DB::table('conferences')->get();
        return view('conferences.index', compact('conferences'));
    }


    public function create()
    {
        return view('conferences.create');
    }


    public function show($id)
    {
        $conference = DB::table('conferences')->where('id', $id)->first();
        return view('conferences.show', compact('conference'));
    }


    public function store(Request $request)
    {
        // 6 punktas: Duomenų patikrinimas naudojant taisykles
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'address' => 'required|string',
        ]);

        // Duomenų įrašymas į MySQL duomenų bazę
        DB::table('conferences')->insert([
            'title' => $validated['title'],
            'lecturer' => $validated['lecturer'],
            'description' => $validated['description'],
            'date_time' => $validated['date_time'],
            'address' => $validated['address'],
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('conferences.index')->with('success', 'Konferencija sukurta!');
    }

    public function edit($id) //editing conferences for admin
    {
        $conference = DB::table('conferences')->where('id', $id)->first();
        return view('conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'address' => 'required|string',
        ]);

        DB::table('conferences')->where('id', $id)->update($validated);

        return redirect()->route('conferences.index')->with('success', 'Atnaujinta!');
    }

    public function destroy($id)
    {
        DB::table('conferences')->where('id', $id)->delete();
        return redirect()->route('conferences.index')->with('success', 'Ištrinta!');
    }
}
