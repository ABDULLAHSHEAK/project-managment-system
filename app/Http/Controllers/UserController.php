<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
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
        $employers = Employer::get();
        $clients = Client::get();
        return view('dashboard.pages.user.add-user',compact('employers', 'clients'));
    }

    // store user
    public function StoreUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'max:255'],
            'password' => ['required'],
            'user_type' => ['required'],
            'img' => 'image|mimes:jpg,jpeg,png',
        ]);
        $input = $request->all();
        if ($request->hasFile('img')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->img->move(public_path('image/user'), $fileName);
            $input['img'] = $fileName;
        } else {
            $input['file'] = null;
        }

        User::create($input);
        // User::create([
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'number' => $req->number,
        //     'password' => Hash::make($req->password),
        //     'employer_id' => $req->emplyer_id,
        //     'client_id' => $req->client_id,
        //     $imageName = time() . '.' . $req->img->extension(),
        //     'img' => $imageName,
        //     $req->img->move(public_path('image/user'), $imageName),
        // ]);
        Toastr::success('User Create Success', 'Success');
        return redirect(route('user.view'));
    }

    // -- user edit --
    public function EditUser($id){
        $data = User::findOrFail($id);
        $employers = Employer::get();
        $projects = Project::get();
        return view('dashboard.pages.user.edit',compact('data', 'employers', 'projects'));
    }

    // update user .
    public function UpdateUser(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'max:255'],
            'user_type' => ['required'],
            'img' => 'image|mimes:jpg,jpeg,png',
        ]);
        $update = User::findOrFail($id);
        $input = $request->all();
        if($input['password']){
            $input['password'] = $request->password;
        }else{
            $input['password'] =$update->password;
        }

        if ($request->hasFile('img')) {
            $previousImage = public_path('image/user') . '/' . $update->img;
            if (File::exists($previousImage)) {
                File::delete($previousImage);
            }
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/user'), $fileName);
            $input['img'] = $fileName;
        } else {
            $input['img'] = $update->img;
        }

        $update->update($input);

        Toastr::success('User Updated successfully.', 'Success');
        return redirect(route('user.view'));
    }

    // --- user delete ---
    public function DeleteUser($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back();
        Toastr::warning('User Delete Success', 'Success');
    }

    // ----- user profile ---
    public function ProfileUser(){
        $user = auth()->user()->id;
        $data = User::findOrFail($user);
        return view('dashboard.pages.user.profile', compact('data'));
    }
}
