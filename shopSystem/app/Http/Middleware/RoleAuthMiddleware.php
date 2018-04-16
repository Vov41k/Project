<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use App\User;

class RoleAuthMiddleware {
	public function handle ( $request, Closure $next, $role ) {
		if ( ! Auth::user ()->hasRole ( 'admin' ) && ! Auth::user ()->hasRole ( $role ) ) {
			return back ();
		}
		return $next( $request );
	}
}

