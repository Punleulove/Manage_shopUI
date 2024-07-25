<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
        public function openNews(){

        $Newnews =  DB::table('news')->orderByDesc('id')->limit(4)->get();
        $Entertainment = DB::table('news')
        ->where('newstype', '=', 'Entertainment')
        ->orderByDesc('id')
        ->limit(4)
        ->get();

        $sport = DB::table('news')
        ->where('newstype', '=', 'Sport')
        ->orderByDesc('id')
        ->limit(4)
        ->get();

            return view('Frontend.News',compact('Newnews', 'Entertainment','sport'));
        }


        public function Newsdetail($id){
            $news =DB::table('news')->where('id',$id)->first();

        DB::table('news')->where('id', $id)->update([
            'viewer' => $news->viewer + 1,
        ]);
        $relate = DB::table('news')->where('newstype', $news->newstype)
            ->where('id', '!=', $news->id)
            ->limit(4)->get();
            return view('Frontend.newdetail',compact('news','relate'));
        }
}
