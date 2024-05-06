<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // all user
    public function index(){
        $data = User::all();
        return view('dashboard.pages.user.all-user',compact('data'));
    }

    // add user
    public function AddUser(){
        return view('dashboard.pages.user.add-user');
    }

    // store user
    public function StoreUser(Request $req){
        $req->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'max:255'],
            'password' => ['required'],
            'user_type' => ['required'],
            'img' => 'image|mimes:jpg,jpeg,png',
        ]);
        User::create([
            'first_name' => $req['first_name'],
            'last_name' => $req['last_name'],
            'email' => $req['email'],
            'number' => $req['number'],
            'password' => Hash::make($req['password']),
            $imageName = time() . '.' . $req->img->extension(),
            'img' => $imageName,
            $req->img->move(public_path('image/user'), $imageName),
        ]);
        Toastr::success('User Create Success', 'Success');
        return redirect(route('user.view'));
    }

    // -- user edit --
    public function EditUser($id){
        $data = User::findOrFail($id);
        return view('dashboard.edit.edit-user',compact('data'));
    }

    // --- user delete ---
    public function DeleteUser($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    // ----- user profile ---
    public function ProfileUser(){
        $user = auth()->user()->id;
        $data = User::findOrFail($user);
        return view('dashboard.pages.user.profile', compact('data'));
    }
}
