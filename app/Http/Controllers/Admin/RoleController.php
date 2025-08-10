<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function index()
    {
       $role = Role::select('roles.*')
        ->orderBy('roles.id', 'desc')
        ->paginate(5);
       return view('admin.roles.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.roles.create_roles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'name'=>['required','string','unique:roles,name']
        ]);
        $role = Role::create(['name' => $request->name]);
        $notification = array(
            'message'=>'Role Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect('role')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $role = Role::findOrFail($id);

         return view('admin.roles.edit_roles',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       // dd($request->all());
        $data=$request->validate([
            'name'=>['required','string']
        ]);

         Role::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Role Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('role')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);


        Role::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Role Removed Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
