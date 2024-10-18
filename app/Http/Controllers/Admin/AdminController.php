<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        if ($request->isMethod('post')) $methot = 'post';
        else if ($request->isMethod('get')) $methot = 'get';
        else abort(404);

        $params = $request->route('params');
        $configs = config('config.admin.' . str_replace("/", ".", $params));
        if (!$configs) abort(404);

        if ($methot == 'get' && isset($configs['view']) && (!isset($configs['get']) || $configs['get'] == 1)) {
            $request->merge(['page' => $configs['view']['page']]);
            return app()->call("App\Http\Controllers\Admin\AdminController@{$configs['view']['type']}", ['request' => $request]);
        } else if ($methot == 'post' && isset($configs['post']) &&  $configs['post'] == 1) {
        } else abort(404);

        return;
    }

    public function list(Request $request)
    {
        //dd($deneme['page']);
        //dd('admin.settings');
        if (!isset($request->page)) abort(404);
        return view($request->page);
    }
}
