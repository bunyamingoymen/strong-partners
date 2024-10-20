<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        try {
            if ($request->isMethod('post')) $methot = 'post';
            else if ($request->isMethod('get')) $methot = 'get';
            else abort(404);

            $params = $request->route('params');
            if ($params) $configs = config('config.admin.' . str_replace("/", ".", $params));
            else $configs = config('config.admin');

            if ($params && !$configs) abort(404);
            if ($methot == 'get') {
                if (isset($configs['view']) && isset($configs['view']['page']) && isset($configs['view']['type']) && (!isset($configs['get']) || $configs['get'] == 1)) {
                    $request->merge(['page' => $configs['view']['page']]);
                    return app()->call("App\Http\Controllers\Admin\AdminController@{$configs['view']['type']}", ['request' => $request]);
                } else {
                    return redirect()->route('admin_page')->with('error', 'Page Not Found');
                }
            } else if ($methot == 'post' && isset($configs['post'])) {
                $request->merge(['post' => $configs['post']]);
                return app()->call("App\Http\Controllers\Admin\AdminController@{$configs['post']['type']}", ['request' => $request]);
            } else abort(404);
        } catch (\Throwable $th) {
            abort(404);
        }

        return;
    }

    public function showPage(Request $request)
    {
        if (!isset($request->page)) abort(404);
        return view($request->page);
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password]) || Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->delete == 0 && Auth::guard('admin')->user()->active == 1)
                return redirect()->route($request->post['redirect']['success']['route'], $request->post['redirect']['success']['values'])->with($request->post['redirect']['success']['with']['type'], $request->post['redirect']['success']['with']['message']);
            else Auth::guard('admin')->logout();
        }

        return redirect()->route($request->post['redirect']['error']['route'], $request->post['redirect']['error']['values'])->with($request->post['redirect']['error']['with']['type'], $request->post['redirect']['error']['with']['message']);
    }

    public function getData(Request $request) {}
}
