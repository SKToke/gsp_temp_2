<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array(Str::lower($request->method()), ['post', 'put'])) {
            $request->merge([
                'created_by' => $request->user()?->id,
                'updated_by' => $request->user()?->id,
            ]);
        }
        return $next($request);
    }
}
