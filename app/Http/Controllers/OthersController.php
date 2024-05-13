<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Employer;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\ProjectMember;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OthersController extends Controller
{
    public function index()
    {
        $data = Project::with('memberData')->get();

        if (auth()->user()->user_type === 'employer') {
            $user = auth()->user()->employer_id;
            $data = Project::with('memberData')->whereHas('memberData', function ($q) use ($user) {
                $q->where('member_id', $user);
            })->get();
        }

        return view('dashboard.pages.project.index', compact('data'));
    }

    public function details($id)
    {
        $project = Project::findOrFail($id);
        $members = ProjectMember::where('project_id', '=', $id)->get();
        $dataArray = json_decode($members, true);

        $memberIds = array_column($dataArray, 'member_id');
        $memberData = Employer::whereIn('id', $memberIds)->get();
        if (auth()->user()->user_type === 'admin') {
            $tasks = Task::where('project_id', '=', $id)->get();
        } else {
            $member_id = auth()->user()->employer_id;
            $tasks = Task::where('employer_id', $member_id)->get();
        }
        $notes = Note::where('project_id', '=', $id)->get();
        $collection = Collection::where('project_id', '=', $id)->sum('collect');
        return view('dashboard.pages.project.details', compact('project', 'memberData', 'notes', 'tasks', 'collection', 'memberIds'));
    }

    // task details
    public function Taskdetails($id)
    {
        $task = Task::findOrFail($id);
        $members = Employer::get();
        $project = Project::get();
        return view('dashboard.pages.task.details', compact('task', 'members', 'project'));
    }

    // task edit
    public function TaskEdit($id)
    {
        $task = Task::findOrfail($id);
        $employers = Employer::get();
        $projects = Project::get();
        return view('dashboard.pages.task.edit', compact('task', 'projects', 'employers'));
    }
    public function TaskUpdate(Request $request, $id)
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

        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // Handle case where task is not found
            Toastr::error('Task not found.', 'Error');
            return redirect()->back();
        }

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
        return redirect(url('employer-dashboard/project'));
    }


    // ---- add note from project details page ----
    public function AddNote(Request $request, $id)
    {
        $project_id = $id;
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/file'), $fileName);
            // $noteData['file'] = $fileName;
        } else {
            $fileName = null;
        }
        Note::create([
            'note' => $request->note,
            'file' => $fileName,
            'project_id' => $project_id
        ]);
        Toastr::success('Note Create Success', 'Success');
        return redirect()->back();
    }

    // ----- user profile ---
    public function ProfileUser()
    {
        $user = auth()->user()->id;
        $data = User::findOrFail($user);
        return view('dashboard.pages.user.profile', compact('data'));
    }
}
