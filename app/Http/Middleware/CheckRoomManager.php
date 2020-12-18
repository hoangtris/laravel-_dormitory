<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class CheckRoomManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id   = Auth::id();
        $user = User::find($id);
        if ($user->id_role != 1 && $user->id_role != 2) {
            return redirect()->route('404a');
        }

        return $next($request);
    }
}
