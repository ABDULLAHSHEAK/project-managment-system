<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\EmployerCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class EmployerController extends Controller
{
    public function index()
    {
        $data = Employer::with('employerCategory')->get();
        return view('dashboard.pages.employer.index', compact('data'));
    }
    public function create()
    {
        $categorys = EmployerCategory::get();
        return view('dashboard.pages.employer.create',compact('categorys'));
    }
    public function store(Request $request)
    {
        $employeData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'category_id' => 'required',
            'note' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/employer'), $imageName);
            $employeData['img'] = $imageName;
        } else {
            $employeData['img'] = 'demo.webp';
        }

        Employer::create($employeData);
        Toastr::success('Employer Create Success', 'Success');
        return redirect()->back();
    }
    public function edit(Employer $employer)
    {
        $categorys = EmployerCategory::get();
        return view('dashboard.pages.employer.edit', compact('employer','categorys'));
    }
    public function update(Request $request, Employer $employer)
    {
        $employerData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'note' => 'required|string',
            'category_id' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            // Check if the previous image name is not 'demo.webp'
            if ($employer->img != 'demo.webp') {
                $previousImage = public_path('image/employer') . '/' . $employer->img;
                if (File::exists($previousImage)) {
                    File::delete($previousImage);
                }
            }
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/employer'), $imageName);
            $employerData['img'] = $imageName;
        } else {
            $imageName = $employer->img;
        }

        $employer->update($employerData);
        Toastr::success('Employer updated successfully.', 'Success');
        return redirect(url('dashboard/employer'));
    }

    public function destroy($id)
    {
        $data = Employer::findOrFail($id);
        // Delete image file if it exists
        if ($data->img) {
            if ($data->img != 'demo.webp') {
                $imagePath = public_path('image/client') . '/' . $data->img;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }
        $data->delete();
        Toastr::warning('Client Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $data = Employer::with('employerCategory')->findOrFail($id);
        return view('dashboard.pages.employer.details', compact('data'));
    }
}
