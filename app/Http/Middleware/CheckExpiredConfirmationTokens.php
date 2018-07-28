<?php

namespace App\Http\Middleware;

use Closure;

class CheckExpiredConfirmationTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $redirect
     * @return mixed
     */
    public function handle($request, Closure $next, $redirect)
    {
        if($request->confirmation_token->hasExpired()){
            $request->confirmation_token->delete();
            return redirect($redirect)->withError('Token expired.');
        }
        return $next($request);
    }
}
