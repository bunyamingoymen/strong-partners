<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Main\KeyValue;
use App\Models\Translation;
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

        $datas['language'] = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'language'], 'create' => false])['items'] ?? [];

        $datas['title'] = $configs['title'];

        return view($configs['view']['page'], $datas);
    }

    public function edit(Request $request)
    {
        if (!is_array($request->values) && !is_array($request->keys) && count($request->keys) != count($request->values)) return redirect()->back()->with('error', 'An error occurred (Key Value)');

        for ($i = 0; $i < count($request->values); $i++) {
            $data = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['item'], 'where' => ['code' => $request->codes[$i] ?? -1, 'key' => $request->keys[$i]], 'create' => true]);
            $item = KeyValue::find($data['item']->code);
            $isNew = $data['isNew'] ?? false;
            if (!$item) return redirect()->back()->with('error', 'An error occurred (Key Value)');
            if ($request->hasFile($request->keys[$i])) {
                $file = $request->file($request->keys[$i]);
                $main_path = "file/{$item->key}";
                $path = public_path($main_path);
                $name = "{$item->key}_{$item->code}_{$this->mainController->generateUniqueCode(['length' => 5])}.{$file->getClientOriginalExtension()}";
                $file->move($path, $name);
                $item->value = "{$main_path}/{$name}";
            } else {

                if ($request->language && is_array($request->language)) {
                    $languages = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'language'], 'create' => false])['items'] ?? [];
                    foreach ($languages as $language) {
                        if ($language->optional_2 == 'main_language') continue;
                        $translation = $this->mainController->databaseOperations(['model' => 'App\Models\Translation', 'returnvalues' => ['item'], 'where' => ['key' => $item->value, 'language' => $language->optional_1], 'create' => false])['item'] ?? null;

                        if ($translation)
                            $translation = Translation::find($translation->id);
                        else
                            $translation = new Translation();

                        $translation->key = $request->values[$i];
                        $translation->language = $language->optional_1;
                        $translation->value = $request->language["{$language->optional_1}"][$i];
                        $translation->type = -1;
                        $translation->save();
                    }
                }

                $item->value = $request->values[$i];
            }
            if (!$isNew) $item->update_user_code = Auth::guard('admin')->user()->code;

            $item->save();
        }

        return redirect()->route('admin_page', ['params' => $request->post['redirect']['params']])->with('success', 'Updated');
    }

    public function getData() {}
}
