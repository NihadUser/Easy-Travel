<?php
namespace App\queryFilter;

use Closure;

class Name
{
    public function handle($request, Closure $next)
    {
        $name = request()->get('name');
        if ($name == null) {
            return $next($request);
        }
        $bulider = $next($request);
        return $bulider->where('name', 'like', "%" . $name . "%");

    }
}