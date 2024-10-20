<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $auth = 1;
        $notFound = false;
        //url de admin'den başka bir şey varsa bu if'e girer. Yoksa direk admin.index'e yollarız.
        if ($params) {
            $configs = config('config.admin.' . str_replace("/", ".", $params));
            if (!$configs) $notFound = true;

            $param_control = explode("/", $params);

            for ($i = count($param_control); $i > 0; $i--) {
                // Alt diziyi al ve "." ile birleştirerek ekrana yazdır
                $config_auth = config('config.admin.' . implode('.', array_slice($param_control, 0, $i)));
                if (!isset($config_auth)) {
                    $notFound = true;
                    break;
                }
                if (isset($config_auth['auth'])) {
                    $auth = $config_auth['auth'];
                    break;
                }
            }
        }

        if ($notFound || !in_array($auth, [1, -1, 0])) {
            abort(404);
        }

        $isAuthenticated = Auth::guard('admin')->check();

        if ($auth == 1) {
            if ($isAuthenticated) {
                return $next($request);
            }
            return redirect()->route('admin_page', ['params' => 'login'])->with('error', 'You must log in first');
        }

        if ($auth == -1) {
            if ($isAuthenticated) {
                return redirect()->route('admin_page')->with('error', 'Previously logged in');
            }
            return $next($request);
        }

        // $auth == 0 durumu için
        return $next($request);
    }
}
