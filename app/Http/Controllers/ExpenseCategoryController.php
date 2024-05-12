<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Brian2694\Toastr\Facades\Toastr;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $data = ExpenseCategory::get();
        return view('dashboard.pages.expense-category.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.pages.expense-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        ExpenseCategory::create($data);
        Toastr::success('Expense Category Create Success', 'Success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        return view('dashboard.pages.expense-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $update = ExpenseCategory::findOrFail($id);
        $update->update([
            'name' => $request->name,
        ]);
        Toastr::success('Expense Category Update Success', 'Success');
        return redirect(url('dashboard/expense-category'));
    }

    public function destroy($id)
    {
        $data = ExpenseCategory::findOrFail($id);
        $data->delete();
        Toastr::warning('Expense Category Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id){
        $data = ExpenseCategory::findOrFail($id);
        return view('dashboard.pages.expense-category.details',compact('data'));
    }
}
