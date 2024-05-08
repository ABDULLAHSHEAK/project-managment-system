<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::get();
        return view('dashboard.pages.task.index', compact('data'));
    }

    public function create()
    {
        $employers = Employer::get();
        $projects = Project::get();
        return view('dashboard.pages.task.create', compact('employers', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'deadline' => 'required',
            'summary' => 'required|string',
            'status' => 'required',
            'completion_status' => 'required',
            'employer_id' => 'required',
            'project_id' => 'required',
        ]);
        $input = $request->all();
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/task'), $fileName);
            $input['file'] = $fileName;
        } else {
            $input['file'] = null;
        }

        Task::create($input);
        Toastr::success('Task Create Success.', 'Success');
        return redirect()->back();
    }
    public function edit(Task $task)
    {
        $employers = Employer::get();
        $projects = Project::get();
        return view('dashboard.pages.task.edit', compact('task', 'projects', 'employers'));
    }
    public function update(Request $request, Task $task)
    {
            $request->validate([
                'name' => 'required|string',
                'start_date' => 'required',
                'deadline' => 'required',
                'summary' => 'required|string',
                'status' => 'required',
                'completion_status' => 'required',
                'employer_id' => 'required',
                'project_id' => 'required',
            ]);

            $input = $request->all();

            if ($request->hasFile('file')) {
                $previousImage = public_path('image/task') . '/' . $task->file;
                if (File::exists($previousImage)) {
                    File::delete($previousImage);
                }
                $fileName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('image/task'), $fileName);
                $input['file'] = $fileName;
            } else {
                $input['file'] = $task->file;
            }

            $task->update($input);

            Toastr::success('Task Updated successfully.', 'Success');
            return redirect(url('dashboard/task'));
    }

    public function destroy($id)
    {
        $data = Task::findOrFail($id);
        if ($data->file) {
                $imagePath = public_path('image/task') . '/' . $data->file;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
        }
        $data->delete();
        Toastr::warning('Task Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $task = Task::findOrFail($id);
        $members = Employer::get();
        $project = Project::get();
        return view('dashboard.pages.task.details', compact('task', 'members', 'project'));
    }

    // ------- add task from project page -----
    public function TaskAdd($id){
        $employers = Employer::get();
        $projects = Project::get();
        $data = $id;
        return view('dashboard.pages.task.add',compact('employers', 'projects', 'data'));
    }
    // public function SaveTask(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'start_date' => 'required',
    //         'deadline' => 'required',
    //         'summary' => 'required|string',
    //         'status' => 'required',
    //         'completion_status' => 'required',
    //         'employer_id' => 'required',
    //         'project_id' => 'required',
    //     ]);
    //     $input = $request->all();
    //     if ($request->hasFile('file')) {
    //         $fileName = time() . '.' . $request->file->extension();
    //         $request->file->move(public_path('image/task'), $fileName);
    //         $input['file'] = $fileName;
    //     } else {
    //         $input['file'] = null;
    //     }

    //     Task::create($input);
    //     Toastr::success('Task Create Success.', 'Success');
    //     return redirect()->back();
    // }
}
