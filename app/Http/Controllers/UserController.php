<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Admins
    public function admins()
    {
        return view('admin.adminacc.create');
    }

    public function admincreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->usertype = 1;

        $admin->save();

        return redirect()->back()->with('message', 'Admin created successfully!');
    }

    public function admindelete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'Admin deleted successfully');
    }

    public function updateadmin($id)
    {
        $admin=User::find($id);
        return view('admin.adminacc.update', compact('admin'));
    }

    public function adminupdate(Request $request, $id)
    {
        $admin = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'required|string|max:15|unique:users,phone,' . $admin->id,
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->usertype = 1;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('adminshow')->with('message', 'Admin Updated Successfully');
    }

    public function adminshow()
    {
        $admins = User::where('usertype', 1)->get();
        return view('admin.adminacc.show', compact('admins'));
    }



    //Users
    public function users()
    {
        return view('admin.useracc.create');
    }

    public function usercreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15|unique:users,phone',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->usertype = 0;

        $user->save();

        return redirect()->back()->with('message', 'User created successfully!');
    }

    public function userdelete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }

    public function updateuser($id)
    {
        $user=User::find($id);
        return view('admin.useracc.update', compact('user'));
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15|unique:users,phone,' . $user->id,
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = 0;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('usershow')->with('message', 'User Updated Successfully');
    }

    public function usershow()
    {
        $users = User::where('usertype', 0)->get();
        return view('admin.useracc.show', compact('users'));
    }
}
