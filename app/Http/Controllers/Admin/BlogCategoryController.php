<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use Auth;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogcategory = BlogCategory::select('blog_categories.*')
        ->orderBy('blog_categories.id', 'desc')
        ->paginate(5);
         return view('admin.blog_category.index',compact('blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogCategoryRequest $request)
    {

        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;
        BlogCategory::create($data);

          return redirect('blog')->with('status','Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory,$id)
    {


        // if (Auth::user()->id !== $blogCategory->user_id) {
        //     return abort(403, 'Unauthorized action');
        // }
         $blog_Category = BlogCategory::findOrFail($id);

         return view('admin.blog_category.edit_category',compact('blog_Category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        // dd($request->all());
        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;
        BlogCategory::findOrFail($request->id)->update($data);
        return redirect('blog')->with('status','Product Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory,$id)
    {
        $blogCategory = BlogCategory::findOrFail($id);


        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Blog Category Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
