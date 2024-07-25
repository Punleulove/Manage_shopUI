<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{



    public function Openadd()
    {
        $category = DB::table('category')->get();
        return view('Backend.add-product', compact('category'));
    }

    public function AddProduct(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        $color = $request->color;
        $size = $request->size;
        $regular_price = $request->regular_price;
        $discount = $request->discount;
        $thumbnail = $request->thumbnail;
        $category = $request->category;
        $qty = $request->qty;

        // return $size;
        // return $color;
        // return $name . $qty . $regular_price . $category . $description . $sale_price . $discount . $category.$thumbnail;
        $strSize = '';
        $strColor = '';
        if ($size) {
            $strSize = implode(',', $size);
        }
        if ($color) {
            $strColor = implode(',', $color);
        }
        if ($thumbnail) {
            $newthumbnail = date('d-m-y-h-i-s') . '_' . $thumbnail->getClientOriginalName();
            $path = "Images";
            $thumbnail->move($path, $newthumbnail);
        }
        $sale_price = $regular_price - ($regular_price * $discount) / 100;
        $user_id = Auth::user()->id;

        try {
            Products::create([
                'name' => $name,
                'description' => $description,
                'color' => $strColor,
                'size' => $strSize,
                'sale_price' => $sale_price,
                'regular_price' => $regular_price,
                'discount' => $discount,
                'thumbnail' => $newthumbnail,
                'category_id' => $category,
                'stock_qty' => $qty,
                'user_id' => $user_id,
            ]);
            return redirect('admin/add-products')->with('success', '');
        } catch (Exception $e) {
            return redirect('admin/add-products')->with('unsuccess', '');
        }




    }
    public function ViewProducts()
    {
        $data = Products::select('products.*', 'category.thumbnail as cateName', 'users.name as userName')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->orderByDesc('id')
            ->get();

        return view('Backend.list-products', compact('data'));

    }

    public function OpenUpdateProduct($id)
    {

        $category = DB::table('category')->get();
        $data = Products::select('*')->where('id', $id)->first();
        return view('Backend.update-product', compact('category', 'data'));
    }

    public function UpdateProduct(Request $request)
    {
        $update_id = $request->update_id;
        $name = $request->name;
        $description = $request->description;
        $color = $request->color;
        $size = $request->size;
        $regular_price = $request->regular_price;
        $discount = $request->discount;
        $thumbnail = $request->thumbnail;
        $category = $request->category;
        $qty = $request->qty;

        // return $size;
        // return $color;
        // return $name . $qty . $regular_price . $category . $description . $sale_price . $discount . $category.$thumbnail;
        $strSize = '';
        $strColor = '';
        if ($size) {
            $strSize = implode(',', $size);
        }
        if ($color) {
            $strColor = implode(',', $color);
        }
        if ($thumbnail) {
            $newthumbnail = date('d-m-y-h-i-s') . '_' . $thumbnail->getClientOriginalName();
            $path = "Images";
            $thumbnail->move($path, $newthumbnail);
        } else {
            $newthumbnail = $request->old_thumbnail;
        }
        $sale_price = $regular_price - ($regular_price * $discount) / 100;

        try {
            Products::where('id', $update_id)->update([
                'name' => $name,
                'description' => $description,
                'color' => $strColor,
                'size' => $strSize,
                'sale_price' => $sale_price,
                'regular_price' => $regular_price,
                'discount' => $discount,
                'thumbnail' => $newthumbnail,
                'category_id' => $category,
                'stock_qty' => $qty,

            ]);
            return redirect('admin/view-products')->with('success', '');
        } catch (Exception $e) {
            return redirect('admin/update-product')->with('unsuccess', '');
        }

    }


    public function Deleteproduct(Request $request)
    {
        $remove_id = $request->remove_id;
        Products::where('id', $remove_id)->delete();
        return redirect('/admin/view-products')->with('deletesuccess', '');
    }
}
