<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Main\Contact;
use App\Models\Main\Files;
use App\Models\Main\KeyValue;
use App\Models\Main\Page;
use App\Models\Main\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function index()
    {
        $backgroudSettings = KeyValue::Where('key', 'backgroudSettings')->first();
        if ($backgroudSettings) $backgroudSettings_type = $backgroudSettings->value;
        else $backgroudSettings_type = 'video';

        $backgrouds = KeyValue::Where('key', 'backgrouds')->where('value', $backgroudSettings_type)->where('delete', 0)->get();
        //dd(file_exists($backgrouds->first()->optional_5));
        $site_title = KeyValue::Where('key', 'site_title')->first();
        $site_description = KeyValue::Where('key', 'site_description')->first();

        $home_pages = Page::Where('show_home', 1)->get();

        $process_title = KeyValue::Where('key', 'process_title')->first();
        $processes = KeyValue::Where('key', 'processes')->where('delete', 0)->get();

        $service_title = KeyValue::Where('key', 'service_title')->first();
        $services = KeyValue::Where('key', 'services')->where('delete', 0)->get();

        $supplier = Page::Where('type', 3)->where('delete', 0)->get();

        $address = KeyValue::Where('key', 'addresses')->first();
        $phones = KeyValue::Where('key', 'phones')->where('delete', 0)->get();
        $emails = KeyValue::Where('key', 'emails')->where('delete', 0)->get();

        $social_media = KeyValue::Where('key', 'social_media')->where('delete', 0)->get();

        return view('index.index', compact(
            'backgroudSettings_type',
            'backgrouds',

            'site_title',
            'site_description',

            'home_pages',

            'process_title',
            'processes',

            'service_title',
            'services',

            'supplier',

            'address',
            'phones',
            'emails',

            'social_media',
        ));
    }

    public function blogs()
    {
        $showblogCount = config('app.showblogCount') ?? 9;
        $blogs = Page::where('type', 1)
            ->where('delete', 0)
            ->where('active', 1)
            ->paginate($showblogCount);

        $type = 'blog';

        return view('index.blogs', compact('blogs', 'type'));
    }


    public function blog_detail($pageCode)
    {
        $page = Page::Where('delete', 0)->Where('short_name', $pageCode)->first();
        if (!$page) abort('404');

        $type = 'blog';

        return view('index.blog_detail', compact('page', 'type'));
    }

    public function products()
    {
        $showblogCount = config('app.showblogCount') ?? 9;

        $blogs = Product::select('products.*', 'files.file') // İhtiyaç duyduğunuz sütunları seçin
            ->leftJoin('files', function ($join) {
                $join->on('files.type_code', '=', 'products.code')
                    ->where('files.delete', '=', 0); // `files` tablosunda `delete` değeri 0 olanları al
            })
            ->groupBy('products.id') // Her bir ürün için tek bir satır döndür
            ->paginate($showblogCount);

        $type = 'product';

        return view('index.blogs', compact('blogs', 'type'));
    }


    public function product_detail($pageCode)
    {
        $page = Product::Where('delete', 0)->Where('short_name', $pageCode)->first();
        if (!$page) abort('404');

        $files = Files::Where('type', 'product')->where('delete', 0)->where('type_code', $page->code)->get();
        $type = 'product';

        return view('index.blog_detail', compact('page', 'type', 'files'));
    }

    public function contact()
    {
        $address = KeyValue::Where('key', 'addresses')->first();
        $phones = KeyValue::Where('key', 'phones')->where('delete', 0)->get();
        $emails = KeyValue::Where('key', 'emails')->where('delete', 0)->get();

        $social_media = KeyValue::Where('key', 'social_media')->where('delete', 0)->get();

        return view('index.contact', compact(

            'address',
            'phones',
            'emails',

            'social_media',
        ));
    }

    public function sendMessage(Request $request)
    {
        $contact = new Contact();

        $contact->code = $this->mainController->generateUniqueCode(['table' => 'contacts']);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->text = $request->message;
        $contact->save();

        return response()->json([
            'class' => 'alert alert-success',
            'message' => lang_db('Your message has been sent', 1),
        ]);
    }
}
