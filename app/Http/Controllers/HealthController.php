<?php

namespace App\Http\Controllers;

use App\Models\Health;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class HealthController extends Controller
{
    public function index(){
        $data = Member::where('status', 'running')->get();
        return view('dashboard.pages.health-status.index',compact('data'));
    }
    public function details($id){
        $healths = Health::where('member_id', $id)->get();
        $members = Member::where('id', $id)->first();
        return view('dashboard.pages.health-status.details',compact('healths','members'));
    }
    public function Print($id){
        $healths = Health::where('member_id', $id)->get();
        $members = Member::where('id', $id)->first();
        return view('dashboard.print.health-print', compact('healths', 'members'));
    }
    public function create($id){
        $members = Member::with('health')->where('id', $id)->first();
        return view('dashboard.pages.health-status.create', compact('members'));
    }
    public function HealthStore(Request $request){
        try {
            // Validate the incoming request data
            $validatedData = Validator::make($request->all(), [
                'bp' => 'required',
                'diabetes' => 'required',
                'weight' => 'required',
                'height' => 'required',
                'blood' => 'required',
                'date' => 'required',
                'member_id' => 'required',
            ])->validate();

            // Create a new Health record using the validated data
            $health = Health::create($validatedData);

            // Check if the Health record was successfully created
            if ($health) {
                Toastr::success('Health Status Created Successfully', 'Success');
            } else {
                Toastr::error('Failed to Create Health Status', 'Error');
            }

            return redirect()->back();
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->validator->errors()->all())->withInput();
        } catch (\Exception $e) {
            // Handle other types of exceptions (e.g., database errors)
            Toastr::error('Failed to Create Health Status', 'Error');
            return redirect(url('dashboard/health-status'));
        }
    }
    public function HealthDelete($id){
        $data = Health::findOrFail($id);
        $data->delete();
        Toastr::success('Health Status Delete Successfully', 'Success');
        return redirect()->back();
    }

}
