<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use App\Models\Client;
use App\Models\Project;
use App\Models\Employer;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\ProjectMember;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
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

    public function create()
    {
        $categorys = ProjectCategory::get();
        $clients = Client::get();
        $members = Employer::get();
        return view('dashboard.pages.project.create', compact('categorys', 'clients', 'members'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required',
            'deadline' => 'required',
            'summary' => 'required|string',
            'category_id' => 'required',
            'client_id' => 'required',
            'status' => 'required',
            'completion_status' => 'required',
            'amount' => 'required|integer',
            'collect' => 'integer',
        ]);
        $input = $request->all();
        $projectData = $input['member'];
        $project_id = Project::create($input);

        if (is_array($projectData)) {
            $input['member'] = implode(', ', $projectData);
            $member_data = $projectData;
            foreach ($member_data as $member_id) {
                $employer = ProjectMember::create([
                    'project_id' => $project_id->id,
                    'member_id' => $member_id
                ]);
            }
        } else {
            Toastr::warning('Something was wrong', 'failed');
        }
        // ---- project amount store ---
        Collection::create([
            'collect' => $request->collect,
            'project_id' => $project_id->id,
            'date' => $request->start_date,
        ]);
        DB::commit();
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
        $members = ProjectMember::where('project_id', '=', $id)->get();
        $dataArray = json_decode($members, true);

        $memberIds = array_column($dataArray, 'member_id');
        $memberData = Employer::whereIn('id', $memberIds)->get();
        if(auth()->user()->user_type === 'admin'){
            $tasks = Task::where('project_id', '=', $id)->get();
        }else{
            $member_id = auth()->user()->employer_id;
            $tasks = Task::where('employer_id',$member_id)->get();
        }
        $notes = Note::where('project_id', '=', $id)->get();
        $collection = Collection::where('project_id', '=', $id)->sum('collect');
        return view('dashboard.pages.project.details', compact('project', 'memberData', 'notes', 'tasks', 'collection', 'memberIds'));
    }
}
