<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ShiftController extends Controller
{
    public function index()
    {
        $data = Shift::all();
        return view('dashboard.pages.shift.all-shift', compact('data'));
    }

    // add shift
    public function AddShift()
    {
        return view('dashboard.pages.shift.add-shift');
    }
    public function StoreShift(Request $req)
    {
        $req->validate([
            'name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ]);

        Shift::create([
            'name' => $req->name,
            'start_time' => $req->start_time,
            'end_time' => $req->end_time,
        ]);
        Toastr::success('Shift Create Success', 'Success');
        return redirect()->back();
    }

    // ----- edit shift -----
    public function EditShift($id){
        $data = Shift::findOrFail($id);
        return view('dashboard.pages.shift.edit-shift',compact('data'));
    }

    public function UpdateShift(Request $req , $id){
        $update = Shift::findOrFail($id);
        $update->name = $req->name;
        $update->start_time = $req->start_time;
        $update->end_time = $req->end_time;
        $update->save();
        Toastr::success('Trainer Update Success', 'Success');
        return redirect()->route('view.shift');
    }

    // ----- delete shift -----
    public function DeleteShift($id){
        $data = Shift::findOrFail($id);
        $data->delete();
        Toastr::success('Shift Delete Success', 'Success');
        return redirect()->back();
    }
}
