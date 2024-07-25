<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function OpenAdd()
    {
        return view('Backend.add-category');
    }


    public function AddCategory(Request $request)
    {
        $category = $request->category;
        $user_id = Auth::user()->id;
        if ($category) {
            DB::table('category')->insert([
                'thumbnail' => $category,
                'user_id' => $user_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect('/admin/view-category')->with('success', '');
        } else {
            return redirect('/admin/add-category')->with('unsuccess', '');
        }
    }

    public function Viewcategory()
    {
        $data = DB::table('category')
            ->select('category.*', 'users.name')
            ->join('users', 'category.user_id', '=', 'users.id')
            ->orderByDesc('id')->get();
        return view('Backend.list-category', compact('data'));
    }


    public function OpenUpdate($id)
    {
        $data = DB::table('category')->where('id', $id)->first();
        return view('Backend.update-category', compact('data'));
    }

    public function UpdateCategory(Request $request)
    {
        $update_id = $request->update_id;
        $category = $request->category;

        if ($category) {

            DB::table('category')->where('id', $update_id)->update([
                'thumbnail' => $category,
                'updated_at' => date('d-m-y-h-i-s'),
            ]);
            return redirect('/admin/view-category')->with('success', '');
        } else {
            return redirect('/admin/update-category/' . $update_id)->with('unsccess', '');
        }
    }


    public function DeleteCategory(Request $request)
    {
        $remove_id = $request->remove_id;
        $check = DB::table('category')->where('id', $remove_id)->delete();
        return redirect('/admin/view-category')->with('deletesuccess', '');
    }
}
