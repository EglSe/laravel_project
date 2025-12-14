<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // BŪTINA
use Illuminate\Validation\Rule; // BŪTINA

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
     * Naudoja Route Model Binding: User $user
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


}
