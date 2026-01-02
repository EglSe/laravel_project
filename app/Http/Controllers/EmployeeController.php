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
    public function show($id)
    {

        $conference = Conference::with('registrations.user')->findOrFail($id);

        // taking registration
        $registrations = $conference->registrations;

        return view('employee.conferences.show', compact('conference', 'registrations'));
    }

}
