<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Intervention\Image\Drivers\GD\Driver;
use Intervention\Image\ImageManager;
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
        return view('admin.user.index', compact('users'));
    }


    public function edit(User $user, $id)
    {

        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.user.edit_user', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $edituserimage = User::find($request->id);

          $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'roles' => ['required'],
        ]);

        if (!$request->file('image')) {

            $data = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $edituserimage->image,
            'password' => Hash::make($request->password)
        ];
        }else{

             $userimg = $edituserimage->image;
                $filename = $userimg;
                 unlink($filename);

         $file = $request->file("image");
        $extension = $file->getClientOriginalExtension();
        $imagename = time() . "." . $extension;
        $path = public_path("upload/user_profile/");

        // Create directory if it doesn't exist
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Resize and save the image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file->getPathname()); // Read from temporary path
        $image->resize(150,150);
        $image->save($path . $imagename); // Save to final path


             $data = [
            'name' => $request->name,
            'email' => $request->email,
            'image'=> 'upload/user_profile/' . $imagename,
            'password' => Hash::make($request->password)
        ];
        }

         //dd($data);


        User::findOrFail($request->id)->update($data);
        $user = User::findOrFail($request->id);
        $user->syncRoles($request->roles);

        $notification = array(
            'message' => 'User Roles Set Successfully!',
            'alert-type' => 'success'
        );
        return redirect('user')->with($notification);
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
