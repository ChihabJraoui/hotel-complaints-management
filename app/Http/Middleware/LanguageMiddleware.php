<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageMiddleware
{

	/**
	 * @param $request
	 * @param Closure $next
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function handle($request, Closure $next)
	{
		$locale = $request->segment(1);

		if (array_key_exists($locale, config('app.locales')))
		{
			App::setLocale($locale);
		}

		return $next($request);
	}

}