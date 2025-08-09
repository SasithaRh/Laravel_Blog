<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $permission = Permission::select('permissions.*')
        ->orderBy('permissions.id', 'desc')
        ->paginate(5);
       return view('admin.permissions.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.permissions.create_permissions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'name'=>['required','string','unique:permissions,name']
        ]);
        $permission = Permission::create(['name' => $request->name]);
        $notification = array(
            'message'=>'Permission Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect('permission')->with($notification);
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
         $permission = Permission::findOrFail($id);

         return view('admin.permissions.edit_permissions',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       // dd($request->all());
        $data=$request->validate([
            'name'=>['required','string','unique:permissions,name']
        ]);

         Permission::findOrFail($request->id)->update($data);
          $notification = array(
            'message'=>'Permission Updated Successfully!',
            'alert-type'=>'success'
        );
        return redirect('permission')->with($notification );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);


        Permission::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Permission Removed Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
