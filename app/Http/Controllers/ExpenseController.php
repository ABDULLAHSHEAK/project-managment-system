<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Brian2694\Toastr\Facades\Toastr;

class ExpenseController extends Controller
{
    public function index()
    {
        $data = Expense::get();
        return view('dashboard.pages.expense.index', compact('data'));
    }

    public function create()
    {
        $categorys = ExpenseCategory::get();
        return view('dashboard.pages.expense.create',compact('categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'amount' => 'required|integer',
        ]);
        $data = $request->all();
        Expense::create($data);
        Toastr::success('Expense Create Success', 'Success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Expense::findOrFail($id);
        $categorys = ExpenseCategory::get();
        return view('dashboard.pages.expense.edit', compact('data','categorys'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'amount' => 'required|integer',
        ]);
        $update = Expense::findOrFail($id);
        $update->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'note' => $request->note,
            'date' => $request->date,
        ]);
        Toastr::success('Expense Update Success', 'Success');
        return redirect(url('dashboard/expense'));
    }

    public function destroy($id)
    {
        $data = Expense::findOrFail($id);
        $data->delete();
        Toastr::warning('Expense Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $data = Expense::findOrFail($id);
        return view('dashboard.pages.expense.details', compact('data'));
    }
}
