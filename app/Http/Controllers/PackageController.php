<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PackageController extends Controller
{
    public function index()
    {
        $data = Package::with('trainer')->get();
        return view('dashboard.pages.package.index', compact('data'));
    }
    public function create()
    {
        $data = Trainer::get();
        return view('dashboard.pages.package.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
            'services_include' => 'nullable|string|max:1000',
            'benefit' => 'nullable|string|max:1000',
            'status' => 'required',
            'trainer_id' => 'required',
        ]);

        Package::create($validatedData);
        Toastr::success('Package Create Success', 'Success');
        return redirect()->back();
    }

    public function edit(Package $package)
    {
        $data = Trainer::get();
        return view('dashboard.pages.package.edit', compact('package', 'data'));
    }
    public function update(Request $request, Package $package)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
            'services_include' => 'nullable|string|max:1000',
            'benefit' => 'nullable|string|max:1000',
            'status' => 'required',
            'trainer_id' => 'required',
        ]);
        $package->update($validatedData);
        Toastr::success('Package Update Success', 'Success');
        return redirect(url('/dashboard/package'));
    }
    public function destroy($id){
        $package = Package::findOrFail($id);
        $package->delete();
        Toastr::warning('Package Delete Success', 'Success');
        return redirect()->back();
    }
}
