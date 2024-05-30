<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Chapter;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Post = Post::all();
         
        $Chapter = Chapter::with('Post')->orderBy('id','DESC')->get();
        return view('chapter.index', compact('Chapter','Post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('chapter.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $data = $request -> validate([
                'tieude' => 'required|max:255',
                'is_active' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'truyen_id' => 'required|exists:posts,id',
                'noidung' => 'required',
                'tomtat' => 'required',
                
                
                
            ]);
            
            $Chapter = new Chapter;
            $Chapter->tieude = $data['tieude'];
            $Chapter->slug_chapter = $data['slug_chapter'];
            $Chapter->tomtat = $data['tomtat'];
            $Chapter->noidung = $data['noidung'];
            $Chapter->is_active = $data['is_active'];
            $Chapter->truyen_id = $data['truyen_id'];  
                  
            
            //them anh vao folder hinh. jpg
        
    
            $Chapter->save();
    
            return redirect()->route('chapter.index')->with('status','Thêm chapter thành công!');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::all();
        $chapter = Chapter::find($id);
        return view('chapter.edit')->with(compact('chapter','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'tieude' => 'required|max:255',
            'is_active' => 'required|max:255',
            'slug_chapter' => 'required|max:255',
            'truyen_id' => 'required|exists:posts,id',
            'noidung' => 'required',
            'tomtat' => 'required',
            
            
            
        ]);
        
        $Chapter = Chapter::find($id);
        $Chapter->tieude = $data['tieude'];
        $Chapter->slug_chapter = $data['slug_chapter'];
        $Chapter->tomtat = $data['tomtat'];
        $Chapter->noidung = $data['noidung'];
        $Chapter->is_active = $data['is_active'];
        $Chapter->truyen_id = $data['truyen_id'];  
              
        
        //them anh vao folder hinh. jpg
    

        $Chapter->save();

        return redirect()->route('chapter.index')->with('status','Cập nhập chapter thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->route('chapter.index')->with('status','Xoá thành công Chapter');
    }
    public function search(Request $request)
    {
         // Get the search keyword from the request
         $keyword = $request->input('keyword');

         // Perform the search query
         $chapters = Chapter::where('tieude', 'like', "%$keyword%")->get();
 
         // Return the search results to the view
         return view('chapter.search_results', ['chapters' => $chapters]);
    }
}
