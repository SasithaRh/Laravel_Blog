<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::select('users.*')
        ->orderBy('users.id', 'desc')
        ->paginate(5);
       return view('admin.user.index',compact('users'));
    }


    public function edit(User $user,$id)
    {

         $user = User::findOrFail($id);

          $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
         return view('admin.user.edit_user',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

             $request->validate([
                'name'=> ['required', 'string'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
                'roles' => ['required'],
            ]);
            $data=[
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password)
            ];

            User::findOrFail($request->id)->update($data);
            $user = User::findOrFail($request->id);
            $user->syncRoles($request->roles);

            $notification = array(
            'message'=>'User Roles Set Successfully!',
            'alert-type'=>'success'
        );
        return redirect('user')->with($notification );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
