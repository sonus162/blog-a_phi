<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeaderDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        $data = [
            'key' => 'value', // Dữ liệu bạn muốn truyền vào header
        ];

        foreach ($data as $key => $value) {
            $request->headers->set($key, $value);
        }

        return $next($request);
    }
}
