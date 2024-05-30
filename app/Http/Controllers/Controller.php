<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function danhmuc($slug){
        $danhmuc = Category::orderBy('id', 'DESC')->get();
        $danhmuc_id = Category::where('slug_danhmuc', $slug)->first();
        $truyen = Post::orderBy('id', 'DESC')->where('kichhoat', 0)->where('Category_id', $category_id->id)->get(); return view('pages.danhmuc')->with(compact('danhmuc','truyen'));
}
}
