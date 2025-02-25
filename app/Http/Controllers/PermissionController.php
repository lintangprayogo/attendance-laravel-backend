<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //

    public function index(Request $request){
        $permissions = Permission::when($request->input('name'),function($query,$name){
            $query->whereHas('user', function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            });
        })->paginate(10);
        return view('pages.permission.index',compact('permissions'));
    }

    public function show($id){
        $permission = Permission::find($id);
        return view('pages.permission.show',compact('permission'));
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('pages.permission.edit',compact('permission'));
    }

    public function update(Request $request,$id){
        $permission = Permission::find($id);
        $permission->is_approved = $request->is_approved;

        return redirect()->route('permissions.index');
    }
}
