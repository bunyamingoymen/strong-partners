<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            } else if ($methot == 'post' && isset($configs['post']) &&  $configs['post'] == 1) {
            } else abort(404);
        } catch (\Throwable $th) {
            abort(404);
        }

        return;
    }

    public function index(Request $request)
    {
        if (!isset($request->page)) abort(404);
        return view($request->page);
    }

    public function list(Request $request)
    {
        if (!isset($request->page)) abort(404);
        return view($request->page);
    }

    public function login(Request $request)
    {
        if (!isset($request->page)) abort(404);
        return view($request->page);
    }
}
