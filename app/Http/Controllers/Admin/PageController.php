<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Main\Page;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PageController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function listPage(Request $request)
    {
        $params = $request->route('params');
        if (!$params) return redirect()->back('admin_page');

        $configs = config('config.admin.' . str_replace("/", ".", $params));
        if (!$configs) return redirect()->back('admin_page');

        $type = $configs['view']['pageType'] ?? 2;
        $title = $configs['title'];

        return view($configs['view']['page'], compact('type', 'title'));
    }

    public function editPage(Request $request)
    {
        $configs = config('config.admin.' . str_replace("/", ".", $request->params));

        if (!$request->type) $type = 2;
        else $type = $request->type;

        if ($request->code) $page = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Page', 'returnvalues' => ['item'], 'where' => ['code' => $request->code], 'create' => false])['item'] ?? null;
        $page = null;

        $language = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'language'], 'create' => false])['items'] ?? [];

        $title = $configs['title'];

        return view('admin.data.page.edit', compact('page', 'language', 'title'));
    }

    public function edit(Request $request)
    {
        $data = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Page', 'returnvalues' => ['item'], 'where' => ['code' => $request->code ?? -1, 'type' => $request->type ?? 2], 'create' => true]);
        $item = Page::where('code', $data['item']->code)->first();
        $isNew = $data['isNew'] ?? false;

        $language = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'language'], 'create' => false])['items'] ?? [];

        foreach ($language as $lan) {
            if (!isset($request->language) || !isset($request->$language[$lan->optional_1]) || !isset($request->language[$lan->optional_1]['title']) || !isset($request->language[$lan->optional_1]['description'])) continue;

            if ($request->title) {
                $translationTitle = $this->mainController->databaseOperations(['model' => 'App\Models\Translation', 'returnvalues' => ['item'], 'where' => ['key' => $request->language[$lan->optional_1]['title'], 'language' => $lan->optional_1], 'create' => false])['item'] ?? null;

                if ($translationTitle)
                    $translationTitle = Translation::find($translationTitle->id);
                else
                    $translationTitle = new Translation();

                $translationTitle->key = $request->title;
                $translationTitle->language = $lan->optional_1;
                $translationTitle->value = $request->language[$lan->optional_1]['title'];
                $translationTitle->type = -1;
                $translationTitle->save();
            }

            if ($request->description) {
                $translationDescription = $this->mainController->databaseOperations(['model' => 'App\Models\Translation', 'returnvalues' => ['item'], 'where' => ['key' => $request->language[$lan->optional_1]['description'], 'language' => $lan->optional_1], 'create' => false])['item'] ?? null;

                if ($translationDescription)
                    $translationDescription = Translation::find($translationDescription->id);
                else
                    $translationDescription = new Translation();

                $translationDescription->key = $request->description;
                $translationDescription->language = $lan->optional_1;
                $translationDescription->value = $request->language[$lan->optional_1]['title'];
                $translationDescription->type = -1;
                $translationDescription->save();
            }
        }

        if (!$request->type) $type = 2;
        else $type = $request->type;

        $item->title = $request->title;
        $item->url = $this->mainController->makeUrl($request->title);
        $item->description = $request->description;
        $item->category = $request->category;
        $item->type = $type;
        if (!$isNew) $item->update_user_code = Auth::guard('admin')->user()->code;
        $item->save();

        return redirect()->route('admin_page', ['params' => ''])->with('success', $isNew ? 'Created' : 'Updated');
    }

    public function getData(Request $request)
    {
        $pagination = [
            'take' => $request->showingCount ? $request->showingCount : Config::get('app.showCount'),
            'page' => $request->page
        ];


        if ($request->search) {
            $search = [
                'search' => $request->search,
                'dbSearch' => ['title', 'description']
            ];
        } else $search = [];

        $result = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Page', 'pagination' => $pagination, 'search' => $search, 'returnvalues' => ['items', 'pageCount'], 'where' => ['type' => $request->type], 'create' => false]);

        return $result;
    }
}
