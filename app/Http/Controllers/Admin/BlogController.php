<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::select('blogs.*')
        ->orderBy('blogs.id', 'desc')
        ->paginate(5);
         return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $categories = BlogCategory::select('blog_categories.*')
        ->orderBy('blog_categories.id', 'desc')
        ->get();
        return view('admin.blog.create_blog',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        //dd($data);

        $file= $request->file("blog_image");
        $extention = $file->getClientOriginalExtension();

        $imagename = time().".".$extention;
        $path = "upload/product/";
        $file->move($path,$imagename);
         $data['blog_image'] = $path.$imagename;
        Blog::create($data);

       return redirect('blog')->with('status','Product Created Successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog,$id)
    {
         $editblogpage = Blog::find($id);
        $categories = BlogCategory::orderBy('id','ASC')->get();
        return view('admin.blog.edit_blog',compact('editblogpage','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

            $editblogpage = Blog::find($request->id);
// dd($editblogpage->blog_image);
            $data = $request->validated();
             if(!$request->file('blog_image')){

                $data['blog_image'] = $editblogpage->blog_image;
             }else{
                $blogimg = $editblogpage->blog_image;
                $filename = $blogimg;
                unlink($filename);

                 $file= $request->file("blog_image");
        $extention = $file->getClientOriginalExtension();

        $imagename = time().".".$extention;
        $path = "upload/product/";
        $file->move($path,$imagename);
         $data['blog_image'] = $path.$imagename;

             }

        Blog::findOrFail($request->id)->update($data);
        return redirect('blog')->with('status','Product Created Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog,$id)
    {
       $blog = Blog::findOrFail($id);
        $blogimg = $blog->blog_image;
        $filename = $blogimg;
        unlink($filename);

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Blog Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
