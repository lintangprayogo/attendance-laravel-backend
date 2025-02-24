<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {

        $users = User::where('name', "like", "%" . request('name') . "%")
            ->orderBy("created_at", "desc")->paginate(10);
        return view('pages.users.index', compact('users'));
    }


    public function create(){
        return view('pages.users.create');
    }


    public function edit($id){
        $user = User::find($id);
        return view('pages.users.edit',compact("user"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "email" => "required|email",
            "password" => "required|min:8"
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role =  $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("users.index")->with("success","User created successfully.");
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "email" => "required|email"
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role =  $request->role;
        if ($request->password) {
        $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route("users.index")->with("success","User updated successfully.");
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route("users.index")->with("success","User deleted successfully.");
    }
}
