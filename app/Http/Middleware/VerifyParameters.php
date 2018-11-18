<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class VerifyParameters
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
        if (! $request->per_page) {
            $request->per_page = config('default.request.per_page');
        }

        $validator = Validator::make($request->all(), [
            'per_page' => 'min:1|integer',
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        return $next($request);
    }
}
