<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdministrationController extends Controller
{
    public function index(){

    }

    public function indexRole(){
        return view('auth.roles.role');
    }

    public function indexPermission(){
        return view('auth.permissions.permission');
    }

    public function storeRole(Request $request){
        Role::create($request->all());
        return redirect()->back();
    }

    public function storePermission(Request $request){
        Permission::create($request->all());
        return redirect()->back();
    }

    public function editRole($id){
        $role = Role::findById($id);
        $permissions = Permission::all();
        return view('auth.roles.edit', compact('role', 'permissions'));
    }

    public function updateRole(Request $request){
        $role = Role::findById($request->id);
        $role->name = $request->name;
        $role->syncPermissions($request->permissions);
        $role->save();
        return redirect()->route('role.index');
    }

    public function storeUser(Request $request){
        $user =  User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'username' => $request->username,
            'fonction' => $request->fonction,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->back();
    }

}
