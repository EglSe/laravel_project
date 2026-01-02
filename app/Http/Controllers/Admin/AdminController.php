<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        return view('admin.dashboard');
    }

    public function storeUser(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_code' => $request->group_code,
        ]);


        DB::table('users_roles')->insert([
            'user_id' => $user->id,
            'role_name' => 'client',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Naujas klientas sukurtas sėkmingai!');
    }



}
