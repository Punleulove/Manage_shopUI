<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $Newproducts = DB::table('products')->orderByDesc('id')->limit(4)->get();
        $Promosion   = DB::table('products')->where('discount', '>', 0)->orderByDesc('id')->limit(4)->get();
        $Popular = DB::table('products')->orderByDesc('viewer')->limit(4)->get();
        return view('Frontend.home', compact('Newproducts', 'Promosion', 'Popular'));
    }
    public function  DetailProduct($id)
    {

        $product = DB::table('products')->where('id', $id)->first();

        
        DB::table('products')->where('id', $id)->update([
            'viewer' => $product->viewer + 1,
        ]);
        $relate = DB::table('products')->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)->get();

        return view('Frontend.productDetail', compact('product', 'relate'));
    }


    public function search(Request $request)
    {
        $rssearch = $request->rssearch;

        $product = DB::table('products')->where('name', 'LIKE', '%' . $rssearch . '%')->get();
        $news =DB::table('news')->where('title', 'LIKE', '%' . $rssearch . '%')->get();
        return view('Frontend.search',compact('product','news'));
    }
}
