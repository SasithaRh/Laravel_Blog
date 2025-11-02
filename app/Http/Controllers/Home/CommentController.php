<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


 public function add_comment(Request $request)
{
    // Validate input fields

    $request->validate([
        'blog_id' => 'required|integer',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_no' => 'nullable|string|max:20',
        'link' => 'nullable|url',
        'massage' => 'required|string|max:200|min:30',
    ]);

    // Save comment
    Comment::create([
        'blog_id' => $request->blog_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        'link' => $request->link,
        'massage' => $request->massage,
        'created_at' => now(),
    ]);

    // Success notification
    $notification = [
        'message' => 'Your Comment Added Successfully!',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}



}
