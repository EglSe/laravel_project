<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Registration;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        // sort by date
        $conferences = Conference::orderBy('date_time', 'desc')->get();


        return view('employee.conferences.index', compact('conferences'));
    }

    //shows conference details
    public function show(string $id)
    {

        $conference = Conference::with('registrations')->findOrFail($id);

        $registrations = $conference->registrations()->get();

        return view('employee.conferences.show', compact('conference', 'registrations'));
    }
}
