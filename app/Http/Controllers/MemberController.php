<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Health;
use App\Models\Member;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    public function index(){
        $data = Member::where('status', '=' , 'running')->get();
        return view('dashboard.pages.member.index',compact('data'));
    }

    public function oldMember(){
        $data = Member::where('status', '=' , 'complete')->get();
        return view('dashboard.pages.member.old-member',compact('data'));
    }

    public function create(){
        $packages = Package::get();
        $shifts = Shift::get();
        return view('dashboard.pages.member.create',compact('packages', 'shifts'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'join_date' => 'required|date',
            'age' => 'required|integer',
            'note' => 'nullable|string',
            'status' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'package_id' => 'required',
            'shift_id' => 'required',
            'bp' => 'required|string',
            'diabetes' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'blood' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Create a new member
            $member = Member::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'join_date' => $request->join_date,
                'age' => $request->age,
                'note' => $request->note,
                'status' => $request->status,
                $imageName = time() . '.' . $request->img->extension(),
                'img' => $imageName,
                $request->img->move(public_path('image/member'), $imageName),
                'package_id' => $request->package_id,
                'shift_id' => $request->shift_id,
            ]);

            // Create health record associated with the member
            Health::create([
                'bp' => $request->bp,
                'diabetes' => $request->diabetes,
                'weight' => $request->weight,
                'height' => $request->height,
                'blood' => $request->blood,
                'date' => $member->join_date,'member_id' => $member->id,
            ]);

            DB::commit();

            Toastr::success('Member Created Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Member $member){
        $packages = Package::get();
        $shifts = Shift::get();
        return view('dashboard.pages.member.edit', compact('member','packages','shifts'));
    }
    public function update(Request $request , Member $member){
         $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'join_date' => 'required|date',
            'age' => 'required|integer',
            'note' => 'nullable|string',
            'status' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'package_id' => 'required',
            'shift_id' => 'required',
        ]);
        if ($request->hasFile('img')) {
            $previousImage = public_path('image/member') . '/' . $member->img;
            if (File::exists($previousImage)) {
                File::delete($previousImage);
            }

            // Upload new image
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/member'), $imageName);
        } else {
            $imageName = $member->img;
        }
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'join_date' => $request->join_date,
            'age' => $request->age,
            'note' => $request->note,
            'status' => $request->status,
            'img' => $imageName,
            'package_id' => $request->package_id,
            'shift_id' => $request->shift_id,
        ]);
        Toastr::success('Member Update Successfully', 'Success');
        return redirect(url('dashboard/member'));

    }
    public function destroy($id){
        try {
            // Find the Member by ID
            $member = Member::findOrFail($id);

            // Find and delete associated Health records
            Health::where('member_id', $id)->delete();

            // Delete the Member record
            $member->delete();

            // Success message using Toastr
            Toastr::warning('Member Deleted Successfully', 'Success');

            // Redirect to a relevant page (e.g., member list)
            return redirect()->back();
        } catch (\Exception $e) {
            // Error handling if deletion fails
            Toastr::error('Failed to delete member. Please try again.', 'Error');

            // Redirect back to the previous page
            return redirect()->back();
        }
    }
}
