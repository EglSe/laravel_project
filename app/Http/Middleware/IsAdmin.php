<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!auth()->check()) {
            return redirect('login');
        }

       //cheching the role
        $role = DB::table('users_roles')
            ->where('user_id', auth()->id())
            ->first();

        if ($role && $role->role_name === 'admin') {
            return $next($request);
        }

        // if not admin error
        return redirect('/')->with('error', 'Prieiga uždrausta!');
    }
}
