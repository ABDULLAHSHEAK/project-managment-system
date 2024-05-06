<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $data = ProjectCategory::get();
        return view('dashboard.pages.project-category.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.pages.project-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_category_name' => 'required',
        ]);

        ProjectCategory::create([
            'category_name' => $request->project_category_name,
        ]);
        Toastr::success('Project Category Create Success', 'Success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = ProjectCategory::findOrFail($id);
        return view('dashboard.pages.project-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_category_name' => 'required',
        ]);
        $update = ProjectCategory::findOrFail($id);
        $update->update([
            'category_name' => $request->project_category_name,
        ]);
        Toastr::success('Project Category Update Success', 'Success');
        return redirect(url('dashboard/project-category'));
    }

    public function destroy($id)
    {
        $data = ProjectCategory::findOrFail($id);
        $data->delete();
        Toastr::warning('Project Category Delete Success', 'Success');
        return redirect()->back();
    }

}
