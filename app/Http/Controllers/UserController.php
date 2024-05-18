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
        return view('admin.adminauth.create');
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->usertype = 1;
        $user->save();

        return redirect()->back()->with('message', 'Admin created successfully!');
    }

    public function admindelete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'Admin deleted successfully');
    }

    public function adminshow()
    {
        $admins = User::where('usertype', 1)->get();
        return view('admin.adminauth.show', compact('admins'));
    }

    //Users
    public function users()
    {
        return view('admin.userauth.create');
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

    public function usershow()
    {
        $users = User::where('usertype', 0)->get();
        return view('admin.userauth.show', compact('users'));
    }
}
