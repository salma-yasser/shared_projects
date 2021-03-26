<?php namespace App\Http\Middleware;
use Closure;
use Auth;
class CustomerRole{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::user()->type == 3 ) {
			return $next($request);
		}elseif(Auth::user()->type == 0 ) {

		return redirect('page-error');

		}else{
		return redirect('error');
			
		}

	}
}