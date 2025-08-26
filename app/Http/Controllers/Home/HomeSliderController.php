<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use App\Http\Requests\StoreHomeSlideRequest;
use App\Http\Requests\UpdateHomeSlideRequest;
use Intervention\Image\Drivers\GD\Driver;
use Intervention\Image\ImageManager;
class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homesliders = HomeSlide::find(1);
        return view('admin.home_slider.index',compact('homesliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeSlideRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeSlide $homeSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSlide $homeSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeSlideRequest $request, HomeSlide $homeSlide)
    {
        //dd($request->all());
          $homeslider = HomeSlide::find($request->id);
// dd($homeslider->home_slide);
            $data = $request->validated();
             if(!$request->file('home_slide')){

                $data['home_slide'] = $homeslider->home_slide;
             }else{
                $homeslider = $homeslider->home_slide;
                $filename = $homeslider;
                 unlink($filename);

         $file = $request->file("home_slide");
        $extension = $file->getClientOriginalExtension();
        $imagename = time() . "." . $extension;
        $path = public_path("upload/home_page/");

        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Resize and save the image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname()); // Read from temporary path
        $image->resize(636,750);
        $image->save($path . $imagename); // Save to final path
         $data['home_slide'] = 'upload/home_page/' . $imagename;

             }

        HomeSlide::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Slider Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('home_slider')->with($notification );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSlide $homeSlide)
    {
        //
    }
}
