<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
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

 public function submit_contact(Request $request)
    {
      // dd($request->all());

   $request->validate([

        'cname' => 'required|string|max:255',
        'cemail' => 'required|email',
        'cphone' => 'nullable|string|max:20',
        'csubject' => 'required|string',
        'cmessage' => 'required|string|max:200|min:10',
    ]);
       $save = new Contact_user;
       $save->cname = $request->cname;
       $save->cemail = $request->cemail;
       $save->cphone_no = $request->cphone;
       $save->csubject = $request->csubject;
       $save->cmassage = $request->cmessage;
       $save->is_show = 0;
       $save->save();
       Mail::to($save->cemail)->send(new ContactMail($save));
       $notification = [
        'message' => 'Thank you for Contact Us!',
        'alert-type' => 'success'
    ];

        return redirect()->back()->with($notification);

    }

}
