<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Intervention\Image\Drivers\GD\Driver;
use Intervention\Image\ImageManager;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $aboutDetails = About::find(1);
        return view('admin.about.index',compact('aboutDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function homeabout()
    {
        $aboutpage = About::find(1);
         $skills = Skill::select('skills.*')->get();
         $experience = Experience::select('experiences.*')->get();
        $education = Education::select('education.*')->get();
        return view('frontend.about_page',compact('aboutpage','skills','experience','education'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
       // dd($request->all());
          $about_me = About::find($request->id);
// dd($about_me->home_slide);
            $data = $request->validated();
             if(!$request->file('aboutimage')){

                $data['aboutimage'] = $about_me->aboutimage;
             }else{
                $about_me = $about_me->aboutimage;
                $filename = $about_me;
                 unlink($filename);

         $file = $request->file("aboutimage");
        $extension = $file->getClientOriginalExtension();
        $imagename = time() . "." . $extension;
        $path = public_path("upload/about_me/");

        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Resize and save the image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname()); // Read from temporary path
        $image->resize(636,750);
        $image->save($path . $imagename); // Save to final path
         $data['aboutimage'] = 'upload/about_me/' . $imagename;

             }

        About::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'About_me Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('about_me')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
