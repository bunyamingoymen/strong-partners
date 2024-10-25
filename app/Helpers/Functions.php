<?php

use Illuminate\Support\Facades\Auth;

function checkAuth($data = [])
{

    if (isset($data) && !is_array($data)) return ['status' => false, 'redirect' => null];

    if (!isset($data['params'])) $data['params'] = 'admin/';

    $params = str_replace('admin.', '', str_replace("/", '.', $data['params']));

    $auth = -999;
    $authorization = -999;
    $param_control = $params != "" ? explode(".", $params) : [];
    $not_found = false;

    // config yetkilendirme ve erişim durumu kontrolleri
    for ($i = count($param_control); $i > 0; $i--) {
        $config_auth = config('config.admin.' . implode('.', array_slice($param_control, 0, $i)));

        if (!isset($config_auth)) {
            $not_found = true;
            break;
        }

        if (isset($config_auth['auth']) && $auth == -999) {
            $auth = $config_auth['auth'];
        }

        if (isset($config_auth['authorization']) && $authorization == -999) {
            $authorization = $config_auth['authorization'];
        }

        if ($auth != -999 && $authorization != -999) break;
    }

    if ($auth == -999) $auth = 1;
    if ($authorization == -999) $authorization = 0;
    if ($not_found || !in_array($auth, [1, -1, 0])) return ['status' => false, 'redirect' => '404'];

    $isAuthenticated = Auth::guard('admin')->check();

    // Erişim durumlarına göre yönlendirme veya yetkilendirme durumu belirleme
    if ($auth == 1) {
        if (!$isAuthenticated) return ['status' => false, 'redirect' => 'login'];
        if ($authorization == 1 && Auth::guard('admin')->user()->type != 0) return ['status' => false, 'redirect' => ' no_access_authorization'];
        if ($authorization == 2 && (Auth::guard('admin')->user()->type != 0 || Auth::guard('admin')->user()->type != 1)) {
            //TODO: Yetkilendirme eklendiğinde buraya eklenecek. $authorization == 2 yetkilendirme için kullanılacak. Tabii kullancıı türü 0 ve 1 ise her zaman true olması gerekmeketidR bu durumda bu if'e hiçbir zaman girmemeli.
        }
    }

    if ($auth == -1 && $isAuthenticated) {
        return ['status' => false, 'redirect' => 'already_logged_in'];
    }

    return ['status' => true, 'redirect' => null];
}
