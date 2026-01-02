<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function registered(Request $request, $user)
    {

        auth()->logout();


        return redirect()->route('register')->with('success', 'Vartotojas sėkmingai sukurtas! Dabar galite prisijungti.');
    }

    protected function create(array $data)
    {
        // 1. create user
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'group_code' => $data['group_code'] ?? null,
        ]);

        // automatic role
        DB::table('users_roles')->insert([
            'user_id' => $user->id,
            'role_name' => 'client',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return $user;
    }
}
