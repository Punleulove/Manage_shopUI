<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set("Asia/Phnom_penh");
class NewsController extends Controller
{
      public function openAdd(){
        return view('Backend.addnews');
      }
    public function AddNews(Request $request)
    {
        $user = Auth::user();
        $title = $request->title;
        $thumbnail = $request->thumbnail;
        $banner = $request->banner;
        $description = $request->description;
        $newstype =$request->newstype;


        if ($thumbnail && $banner) {
            $newthumnail = date("Y-m-d") . '-' . $thumbnail->getClientOriginalName();
            $newbanner = date("Y-m-d") . '-' . $banner->getClientOriginalName();
            $path = 'Images';
            $thumbnail->move($path, $newthumnail);
            $banner->move($path, $newbanner);
            News::create([
                'title' => $title,
                'thumbnail' => $newthumnail,
                'description'=> $description,
                'banner' => $newbanner,
                'newstype'=>$newstype,
                'user_id' => $user->id,
                'created_at' => date('d-m-y-h-i-s'),

            ]);
            return redirect('/admin/add-news')->with('success', '');
        }
    }
    public function ViewNews()
    {
        $data = DB::table('news')
        ->select('news.*', 'users.name')
        ->join('users', 'news.user_id', '=', 'users.id')
        ->orderByDesc('id')->get();
        return view('Backend.viewnews',compact('data'));
    }

    public function openUpdate($id)
    {
        $data = DB::table('news')->where('id', $id)->first();
        return view('Backend.updatenews', compact( 'data'));
    }

    public function UpdateNews(Request $request){
        $update_id = $request->update_id;
        $title = $request->title;
        $thumbnail = $request->thumbnail;
        $banner = $request->banner;
        $description = $request->description;
        $newstype = $request->newstype;

        if ($thumbnail) {
            $newthumbnail = date('d-m-y-h-i-s') . '_' . $thumbnail->getClientOriginalName();
            $path = "Images";
            $thumbnail->move($path, $newthumbnail);
        } else {
            $newthumbnail = $request->old_thumbnail;
        }


        if ($banner) {
            $newbanner = date('d-m-y-h-i-s') . '_' . $banner->getClientOriginalName();
            $path = "Images";
            $banner->move($path, $newbanner);
        } else {
            $newbanner = $request->old_banner;
        }


        try{
            DB::table('news')->where('id', $update_id)->update([
                'title' => $title,
                'thumbnail' => $newthumbnail,
                'banner' => $newbanner,
                'description'=>$description,
                'newstype'=>$newstype,
                'updated_at' => date('d-m-y-h-i-s'),
            ]);
            return redirect('/admin/view-news')->with('success', '');
         } catch (Exception $e) {
            return redirect('/admin/view-news')->with('unsuccess', '');
        }
    }

    public function DeleteNews(Request $request)
    {
        $remove_id = $request->remove_id;
        $check = DB::table('news')->where('id', $remove_id)->delete();
        return redirect('/admin/view-news')->with('deletesuccess', '');
    }


}
