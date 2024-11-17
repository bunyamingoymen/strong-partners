<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function editPage(Request $request) {
        $configs = config('config.admin.' . str_replace("/", ".", $request->params));

        if ($request->code) $item = $this->mainController->databaseOperations(['model' => 'App\Models\Main\Product', 'returnvalues' => ['item'], 'where' => ['code' => $request->code], 'create' => false])['item'] ?? null;
        else $item = null;

        
    }

    public function edit(Request $request) {}

    public function delete(Request $request) {}

    public function getData(Request $request) {}
}
