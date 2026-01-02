<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // BŪTINA
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource (Vartotojų sąrašas).
     */
    public function index()
    {

        $users = User::orderBy('name')->paginate(15);


        return view('admin.users.index', compact('users'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // 1. Validation
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        // 2. details update
        $user->update($validatedData);

        // 3. success message
        return redirect()->route('admin.users.index')->with('success', 'Vartotojo "' . $user->name . ' ' . $user->surname . '" informacija sėkmingai atnaujinta.');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);


        if ($user->id === auth()->id()) {
            return back()->with('error', 'Negalite ištrinti savo paskyros.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Naudotojas ištrintas.');
    }


}
