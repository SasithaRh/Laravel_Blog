<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact_user;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blogsCount= User::select('users.*')->count();
        $blogCount= Blog::select('blogs.*')->count();
        $categories = BlogCategory::orderBy('id','ASC')->get();
        $portfolioCount= Portfolio::select('portfolios.*')->count();
        $blogs = Blog::select('blogs.*')->where('blogs.blog_category_id', '=', 1)->orderBy('id','ASC')->limit(5)->get();
        $mailCount= Contact_user::select('contact_users.*')->where('contact_users.is_show', '=', 0)->count();
        $portfolios = Portfolio::latest()->limit(5)->get();
        //dd($portfolios);
        return view('admin.index',compact('blogsCount','blogCount','portfolioCount','mailCount','portfolios','categories','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function show_blogs(Request $request)
{
    //dd($request->all());
    $blogs = Blog::select('blogs.*')->where('blogs.blog_category_id', '=', $request->id)->orderBy('id','ASC')->limit(5)->get();
     //return view('admin.index',compact('blogs'));
    return response()->json($blogs);

}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
