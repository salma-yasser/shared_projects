<?php namespace App\Http\Middleware;
use Closure;
use Auth;
class AdminRole{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::user()->type == 0 ) {
			return $next($request);
		}elseif(Auth::user()->type == 3 ) {

		return redirect('error');

		}else{
		return redirect('page-error');
			
		}
		return redirect('page-error');

	}
}