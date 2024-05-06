<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shift;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    public function index()
    {
        $data = Trainer::with('shift')->get();
        return view('dashboard.pages.trainer.index', compact('data'));
    }

    public function create()
    {
        $shift = Shift::get();
        return view('dashboard.pages.trainer.add-trainer', compact('shift'));
    }
    public function store(Request $request) {
        $request->validate([
            'shift_id' => 'required',
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:trainers,email',
            'phone' => 'required',
            'address' => 'required|string',
            'date' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'gender' => 'required',
            'note' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Trainer::create([
            'shift_id' => $request->shift_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->date,
            'weight' => $request->weight,
            'height' => $request->height,
            'gender' => $request->gender,
            'note' => $request->note,
            $imageName = time() . '.' . $request->img->extension(),
            'img' => $imageName,
            $request->img->move(public_path('image/trainer'), $imageName),
        ]);
        Toastr::success('Employer Category Create Success', 'Success');
        return redirect()->back();
    }
    public function edit(Trainer $trainer)
    {
        $shift = Shift::get();
        return view('dashboard.pages.trainer.edit', compact('trainer', 'shift'));
    }
    public function update(Request $request, Trainer $trainer){
        $request->validate([
            'shift_id' => 'required',
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'date' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'gender' => 'required',
            'note' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            $previousImage = public_path('image/trainer') . '/' . $trainer->img;
            if (File::exists($previousImage)) {
                File::delete($previousImage);
            }

            // Upload new image
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/trainer'), $imageName);
        } else {
            $imageName = $trainer->img;
        }

        // Update trainer
        $trainer->update([
            'shift_id' => $request->shift_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->date,
            'weight' => $request->weight,
            'height' => $request->height,
            'gender' => $request->gender,
            'note' => $request->note,
            'img' => $imageName,
        ]);

        Toastr::success('Trainer updated successfully.', 'Success');
        return redirect(url('dashboard/trainer'));
    }

    public function destroy($id)
    {
        $data = Trainer::findOrFail($id);
        $data->delete();
        Toastr::warning('Trainer Delete Success', 'Success');
        return redirect()->back();
    }
}
