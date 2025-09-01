<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $skills = Skill::select('skills.*')
        ->orderBy('skills.id', 'desc')
        ->paginate(5);
         return view('admin.about.skills.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.about.skills.create_skill');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
         $data = $request->validated();


        Skill::create($data);
        $notification = array(
            'message'=>'Skill Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect('skill')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill,$id)
    {
            $skill = Skill::find($id);
          return view('admin.about.skills.edit_skill', compact('skill'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
         $data = $request->validated();


        Skill::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Skill Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('skill')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill,$id)
    {
        $Skill = Skill::findOrFail($id);


        Skill::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Skill Removed Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
