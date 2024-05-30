<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\image;
use App\Models\Post;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Post::orderBy('id','DESC')->get();
        
        return view('product.index')->with(compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => 'required|max:255',
            'is_active' => 'required|max:255',
            'slug_truyen' => 'required|max:255',
            'slide_url' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tatgia' => 'required|max:255',
            'content' => 'required|max:255',
            'theloai' => 'required|max:255',
            'NXB' => 'required|max:255',
            
            
        ]);
        
        $product = new Post;
        $product->title = $data['title'];
        $product->slug_truyen = $data['slug_truyen'];
        $product->theloai = $data['theloai'];
        $product->NXB = $data['NXB'];
        $product->tatgia = $data['tatgia'];
        $product->content = $data['content'];
        $product->is_active = $data['is_active'];

        $product->category_id = $data['category_id'];  
              
        
        //them anh vao folder hinh. jpg
        $get_image = $request->slide_url;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $product->slide_url = $new_image;     

        $product->save();

        return redirect()->route('product.index')->with('status','Thêm bài viết thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Post::findOrFail($id);

        // Phân trang cho danh sách chương
        $chapters = $product->chapter()->paginate(1);
    
        return view('product.show', compact('product', 'chapters'));

}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Post::find($id);
        return view('product.edit')->with(compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'is_active' => 'required|max:255',
            'slug_truyen' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'tatgia' => 'required|max:255',
            'content' => 'required|max:255',
            'theloai' => 'required|max:255',
            'NXB' => 'required|max:255',
            'slide_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $product = Post::find($id);
        $product->title = $data['title'];
        $product->slug_truyen = $data['slug_truyen'];
        $product->theloai = $data['theloai'];
        $product->NXB = $data['NXB'];
        $product->tatgia = $data['tatgia'];
        $product->content = $data['content'];
        $product->is_active = $data['is_active'];
        $product->category_id = $data['category_id'];
    
        if ($request->hasFile('slide_url')) {
            // Delete the old image if it exists
            $oldImagePath = public_path('public/uploads/truyen/' . $product->slide_url);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            // Handle the new image upload
            $get_image = $request->file('slide_url');
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->slide_url = $new_image;
        }
    
        $product->save();
    
        return redirect()->route('product.index')->with('status', 'Cập nhập bài viết thành công!');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    $product = Post::find($id);
    $path = 'public/uploads/truyen/'.$product->slide_url;
    if(file_exists($path)){
        unlink($path);
    }
        Post::find($id)->delete();
        return redirect()->route('product.index')->with('status','Xoá bài viết thành công');
    }
    public function showProduct($id)
{
    // Lấy sản phẩm
    $product = Post::findOrFail($id);

    // Phân trang cho danh sách chương
    $chapters = $product->chapter()->paginate(1);

    return view('product.show', compact('product', 'chapters'));
}
}
