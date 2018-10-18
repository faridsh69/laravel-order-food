<?php 

namespace App\Http\Middleware;

use Closure, Session;
use Illuminate\Support\Facades\Auth;

class Local {

    /**
     * The availables languages.
     *
     * @array $languages
     */
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('locale'))
        {
            app()->setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}