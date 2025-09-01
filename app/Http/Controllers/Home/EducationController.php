<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $education = Education::select('education.*')
        ->orderBy('education.id', 'desc')
        ->paginate(5);
         return view('admin.about.education.index',compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.education.create_education');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $data = $request->validated();


        Education::create($data);
        $notification = array(
            'message'=>'Education Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect('education')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education,$id)
    {
        $education = Education::find($id);
          return view('admin.about.education.edit_education', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $data = $request->validated();


        Education::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Education Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('education')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education,$id)
    {
         $Experience = Education::findOrFail($id);


        Education::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Education Removed Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
