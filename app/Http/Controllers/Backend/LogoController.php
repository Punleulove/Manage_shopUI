<?php

namespace App\Http\Controllers\Backend;

// date_default_timezone_set("Asia/Phnom_phenh");
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    public function OpneLogo()
    {
        return view('Backend.add-logo');
    }

    public function addLogo(Request $request)
    {
        $user = Auth::user();
        $thumbnail = $request->thumbnail;

        if ($thumbnail) {
            $newthumnail = date("Y-m-d") . '-' . $thumbnail->getClientOriginalName();
            $path = 'Images';
            $thumbnail->move($path, $newthumnail);
            DB::table('web_logo')->insert([
                'thumbnail' => $newthumnail,
                'user_id' => $user->id,
                'created_at' => date('d-m-y-h-i-s'),

            ]);
            return redirect('/admin/add-logo')->with('success', '');
        }
    }
    public function viewLogo()
    {
        $data = DB::table('web_logo')
            ->select('web_logo.*', 'users.name')
            ->join('users', 'web_logo.user_id', '=', 'users.id')
            ->orderByDesc('id')->get();
        return view('Backend.list-logo', compact('data'));
    }

    public function Openupdate_logo($id)
    {
        // return $id;
        $data = DB::table('web_logo')->where('id', $id)->first();
        return view('Backend.update-logo', compact('data'));
    }

    public function Update_logo(Request $request)
    {
        $update_id = $request->update_id;
        $thumbnail = $request->thumbnail;

        if ($thumbnail) {
            $newthumnail = date("Y-m-d") . '-' . $thumbnail->getClientOriginalName();
            $path = 'Images';
            $thumbnail->move($path, $newthumnail);
            DB::table('web_logo')->where('id', $update_id)->update([
                'thumbnail' => $newthumnail,
                'updated_at' => date('d-m-y-h-i-s'),
            ]);
            return redirect('/admin/view-logo')->with('success', '');
        } else {
            return redirect('/admin/update-logo/' . $update_id)->with('unsccess', '');
        }
    }

    public function Delete_logo(Request $request)
    {
        $remove_id = $request->remove_id;
        $check=DB::table('web_logo')->where('id', $remove_id)->delete();
        return redirect('/admin/view-logo')->with('deletesuccess', '');
    }
}
