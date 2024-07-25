<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
        public function shop(Request $request){
         $page = $request->page;
         $cate_id = $request->cat;
         $price = $request->price;
         $promotion = $request->promotion;

        $rsProducts = ($page - 1) * 6;




         if(!empty($cate_id)){
            $total_products = DB::table('products')->where('category_id',$cate_id)->count();
            $total_page = ceil($total_products / 6);

            $products = DB::table('products')
                ->where('category_id', $cate_id)
                ->orderBydesc('id')
                ->offset($rsProducts)
                ->limit(6)->get();

         } else if($price =='min') {
            $total_products = DB::table('products')->count();
            $total_page = ceil($total_products / 6);

            $products = DB::table('products')
                ->orderBy('sale_price',)
                ->offset($rsProducts)
                ->limit(6)->get();

         } else if ($price == 'max') {
            $total_products = DB::table('products')->count();
            $total_page = ceil($total_products / 6);

            $products = DB::table('products')
                ->orderBy('sale_price','DESC' )
                ->offset($rsProducts)
                ->limit(6)->get();
        }else if ($promotion == 'true'){
            $total_products = DB::table('products')->where('discount', '>', 0)->count();
            $total_page = ceil($total_products / 6);

            $products = DB::table('products')
                ->where('discount', '>',0)
                ->orderBy('id', 'DESC')
                ->offset($rsProducts)
                ->limit(6)->get();
        }


         else{
            $total_products = DB::table('products' )->count();
            $total_page = ceil($total_products / 6);


            $products = DB::table('products')
                ->orderBydesc('id')
                ->offset($rsProducts)
                ->limit(6)->get();
         }

          $category =DB::table('category')->get();


              return view('frontend.Shop',compact('products','promotion','price','cate_id','total_page','category'));
        }
}
