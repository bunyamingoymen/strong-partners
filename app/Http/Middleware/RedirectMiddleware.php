<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $params = $request->route('params');

        //url de admin'den başka bir şey varsa bu if'e girer. Yoksa direk admin.index'e yollarız.
        if ($params) {
            $configs = config('config.admin.' . str_replace("/", ".", $params));
            if (!$configs) abort(404);
            //TODO: giriş yapmas sistemi ayarlandığında burası kontrol düzeltilmeli
        }

        return $next($request);
        return app()->call('App\Http\Controllers\Admin\AdminController@admin', ['request' => $request]);
    }
}
