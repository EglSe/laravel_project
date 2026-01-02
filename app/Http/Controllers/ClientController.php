<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ClientController extends Controller
{

    public function index()
    {

        $student = Auth::user();

        if (!$student) {
            $student = (object)[
                'name' => 'Vardas',
                'surname' => 'Pavardė',
                'group_code' => 'Grupės kodas'
            ];

        }

        return view('client.index', compact('student'));
    }

    public function listConferences()
    {
        // sorting by date
        $conferences = Conference::where('is_active', true)
            ->orderBy('date_time')
            ->get();

        return view('client.conferences.index', compact('conferences'));
    }

    public function show(Conference $conference)
    {

        return view('client.conferences.show', compact('conference'));
    }

    public function myConferences()
    {
        $user = Auth::user();

        $registrations = Registration::where('email', $user->email)
            ->with('conference')
            ->get();

        return view('client.conferences.my_list', compact('registrations'));
    }

    public function storeRegistration(Request $request, Conference $conference)
    {
        // 1. active conference
        if (!$conference->is_active) {
            return back()->with('error', 'Registracija negalima. Konferencija neaktyvi.');
        }

        // validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // check user
        $existingRegistration = Registration::where('conference_id', $conference->id)
            ->where('email', $validated['email'])
            ->first();

        if ($existingRegistration) {
            return back()->with('error', 'Jūs jau esate užsiregistravęs į šią konferenciją!');
        }

        // Saving registration
        try {
            Registration::create([
                'conference_id' => $conference->id,
                'name' => $validated['name'],
                'surname' => $validated['surname'],
                'email' => $validated['email'],
            ]);


            return back()->with('success', 'Sveikiname! Sėkmingai užsiregistravote į konferenciją: ' . $conference->title);

        } catch (\Exception $e) {
            // Bendrinė klaida
            return back()->with('error', 'Įvyko klaida registruojantis. Bandykite dar kartą.');
        }
    }
}
