<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{

    public function index()
    {
        // sort by date
        $conferences = Conference::orderBy('date_time', 'desc')->get();

        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

   //saving conference to database
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_time' => 'required|date',

        ]);

        //  add to database
        Conference::create([
            'title' => $request->title,
            'lecturer' => $request->lecturer,
            'address' => $request->address,
            'date_time' => $request->date_time,
            'is_active' => $request->has('is_active'),
        ]);


        // 3. success
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai sukurta!');
    }

    public function show(Conference $conference)
    {

        return redirect()->route('admin.conferences.edit', $conference);
    }


    public function edit(Conference $conference)
    {
        return view('admin.conferences.edit', compact('conference'));
    }

   //renew conference details
    public function update(Request $request, Conference $conference)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'lecturer' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_time' => 'required|date',
        ]);

        //  update details
        $conference->update([
            'title' => $request->title,
            'lecturer' => $request->lecturer,
            'address' => $request->address,
            'date_time' => $request->date_time,
            'is_active' => $request->has('is_active'),
        ]);

        // success message
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta!');
    }
    //delete conference from database
    public function destroy(Conference $conference)
    {
        if ($conference->date_time < now()) { // Patikra, ar konferencija jau įvyko
            return redirect()->back()->with('error', __('messages.error_delete_past'));
        }

        $conference->delete();
        return back()->with('success', __('messages.success_deleted'));
    }
}
