<?php

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

        if ($request->getMethod() === 'OPTIONS')
            return response('', 200);

        return $next($request);
    }
}
