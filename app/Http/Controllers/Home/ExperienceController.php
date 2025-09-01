<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::select('experiences.*')
        ->orderBy('experiences.id', 'desc')
        ->paginate(5);
         return view('admin.about.experience.index',compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.experience.create_experience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExperienceRequest $request)
    {
        $data = $request->validated();


        Experience::create($data);
        $notification = array(
            'message'=>'Experience Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect('experience')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience,$id)
    {
          $experience = Experience::find($id);
          return view('admin.about.experience.edit_experience', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $data = $request->validated();


        Experience::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Experience Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('experience')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience,$id)
    {
        $Experience = Experience::findOrFail($id);


        Experience::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Experience Removed Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
