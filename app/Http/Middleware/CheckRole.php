<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = explode(':', $role);
        $userRole = User::with('role')->find($request->user()->id);
        foreach($roles as $role) {
            if(strtolower($userRole->role->name) == strtolower($role)) {
                return $next($request);
            }
        }
        
        $notify[] = ['error', 'Error Code : 404 Not Found'];
        return redirect('dashboard')->withNotify($notify);
    }
}
