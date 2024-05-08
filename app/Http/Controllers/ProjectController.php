<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Client;
use App\Models\Project;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{

    public function index()
    {
        $data = Project::get();
        return view('dashboard.pages.project.index', compact('data'));
    }

    public function create()
    {
        $categorys = ProjectCategory::get();
        $clients = Client::get();
        $members = Employer::get();
        return view('dashboard.pages.project.create', compact('categorys', 'clients', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'deadline' => 'required',
            'summary' => 'required|string',
            'category_id' => 'required',
            'client_id' => 'required',
            'status' => 'required',
            'completion_status' => 'required',
        ]);
        $input = $request->all();
        $projectData = $input['member'];
        $input['member'] = implode(', ', $projectData);

        Project::create($input);
        Toastr::success('Project Create Success.', 'Success');
        return redirect()->back();
    }
    public function edit(Project $project)
    {
        $categorys  = ProjectCategory::get();
        $clients = Client::get();
        $members = Employer::get();
        return view('dashboard.pages.project.edit', compact('project', 'categorys', 'clients', 'members'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'deadline' => 'required',
            'summary' => 'required|string',
            'category_id' => 'required',
            'client_id' => 'required',
            'status' => 'required',
            'completion_status' => 'required',
        ]);

        $input = $request->except('member');
        $projectData = $request->input('member', []);
        $input['member'] = implode(', ', $projectData);

        $project->update($input);
        Toastr::success('Project updated successfully.', 'Success');
        return redirect(url('dashboard/project'));
    }

    public function destroy($id)
    {
        $data = Project::findOrFail($id);
        $data->delete();
        Toastr::warning('Project Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $project = Project::findOrFail($id);
        $members = Employer::get();
        $notes = Note::where('project_id', '=' , $id)->get();
        $tasks = Task::where('project_id', '=' , $id)->get();
        return view('dashboard.pages.project.details', compact('project', 'members','notes','tasks'));
    }
}
