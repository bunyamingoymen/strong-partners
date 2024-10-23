<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeyValueController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function editPage(Request $request)
    {
        $configs = config('config.admin.' . str_replace("/", ".", $request->params));
        if (!$configs) abort(404);

        $datas = [];
        foreach ($configs['view']['key'] as $key) {
            $datas[$key] = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => $key], 'create' => false])['items'] ?? '';
        }
    }

    public function edit(Request $request)
    {
        if (!is_array($request->values) && !is_array($request->keys) && count($request->keys) != count($request->values)) return redirect()->back()->with('error', 'An error occurred (Key Value)');

        for ($i = 0; $i < count($request->values); $i++) {
            $data = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['item'], 'where' => ['code' => $request->code, 'key' => $request->key[$i]], 'create' => true]);
            $item = $data['item'];
            $isNew = $data['isNew'] ?? false;
            if (!$item) return redirect()->back()->with('error', 'An error occurred (Key Value)');
            if ($request->hasFile($request->value[$i])) {
                $file = $request->file('image');
                $main_path = "file/{$item->key}";
                $path = public_path($main_path);
                $name = "{$item->key}_{$item->code}_{$this->mainController->generateUniqueCode(['length' => 5])}.{$file->getClientOriginalExtension()}";
                $file->move($path, $name);
                $item->value = "{$main_path}/{$name}";
            } else {
                $item->value = $request->values[$i];
            }
            if (!$isNew) $item->update_user_code = Auth::guard('admin')->user()->code;
            $item->save();
        }

        return redirect()->route('admin_page', [])->with('success', 'Updated');
    }

    public function getData() {}
}
