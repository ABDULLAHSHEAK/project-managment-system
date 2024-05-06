<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class EmployerCategoryController extends Controller
{
    public function index(){
        $data = EmployerCategory::get();
        return view('dashboard.pages.employer-category.index',compact('data'));
    }

    public function create(){
        return view('dashboard.pages.employer-category.create');
    }

    public function store(Request $request){
        $request->validate([
            'employer_category_name' => 'required',
        ]);

        EmployerCategory::create([
            'category_name' => $request->employer_category_name,
        ]);
        Toastr::success('Employer Category Create Success', 'Success');
        return redirect()->back();
    }

    public function edit($id){
        $category = EmployerCategory::findOrFail($id);
        return view('dashboard.pages.employer-category.edit',compact('category'));
    }

    public function update(Request $request , $id){
        $request->validate([
            'employer_category_name' => 'required',
        ]);
        $update = EmployerCategory::findOrFail($id);
        $update->update([
            'category_name' => $request->employer_category_name,
        ]);
        Toastr::success('Employe Category Update Success', 'Success');
        return redirect(url('dashboard/employer-category'));
    }

    public function destroy($id)
    {
        $data = EmployerCategory::findOrFail($id);
        $data->delete();
        Toastr::warning('Employe Category Delete Success', 'Success');
        return redirect()->back();
    }

}
