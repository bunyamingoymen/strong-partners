<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Main\Product;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function editPage(Request $request)
    {
        $configs = config('config.admin.' . str_replace("/", ".", $request->params));

        if ($request->code) $item = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Product', 'returnvalues' => ['item'], 'where' => ['code' => $request->code], 'create' => false])['item'] ?? null;
        else $item = null;

        $title = $configs['title'];

        $language = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'language'], 'create' => false])['items'] ?? [];
        $categories = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'categories', 'optional_1' => 'Product'], 'create' => false])['items'] ?? null;
        $cargo_companies = $this->mainController->databaseOperations(['model' => 'App\Models\Main\KeyValue', 'returnvalues' => ['items'], 'where' => ['key' => 'cargo_companies'], 'create' => false])['items'] ?? null;

        return view('admin.data.product.edit', compact('item', 'language', 'title', 'categories', 'cargo_companies'));
    }

    public function edit(Request $request)
    {
        $data = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Product', 'returnvalues' => ['item'], 'where' => ['code' => $request->code ?? -1], 'create' => true]);
        $item = Product::where('code', $data['item']->code)->first();
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
    }

    public function delete(Request $request)
    {
        $item = Product::Where('code', $request->code)->first();
        if (!$item) return redirect()->back()->with('error', 'An error occurred (Product)');

        if ($item->can_be_deleted == 0) return redirect()->back()->with('error', 'This value cannot be deleted');

        $item->delete = 1;
        $item->update_user_code = Auth::guard('admin')->user()->code;
        $item->save();

        $configs = config('config.admin.' . str_replace("/", ".", $request->params));

        return redirect()->route('admin_page', ['params' => 'product'])->with('success', 'Deleted');
    }
    public function getData(Request $request) {}
}
