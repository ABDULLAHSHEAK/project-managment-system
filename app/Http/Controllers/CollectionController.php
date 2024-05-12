<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Collection;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CollectionController extends Controller
{
    public function index()
    {
        $data = Collection::with('project')->get();
        return view('dashboard.pages.collection.index', compact('data'));
    }

    public function create()
    {
        $projects = Project::get();
        return view('dashboard.pages.collection.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'collect' => 'integer',
            'project_id' => 'required',
        ]);

        $collect = $request->all();
        Collection::create($collect);
        Toastr::success('Collection Create Success.', 'Success');
        return redirect()->back();
    }
    public function edit(Collection $collection)
    {
        $projects = Project::get();
        return view('dashboard.pages.collection.edit', compact('collection', 'projects'));
    }
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'collect' => 'integer|required',
        ]);

        $input = $request->all();

        $collection->update($input);

        Toastr::success('Collection Updated successfully.', 'Success');
        return redirect(url('dashboard/collection'));
    }

    public function destroy($id)
    {
        $data = Collection::findOrFail($id);
        $data->delete();
        Toastr::warning('Collection Delete Success', 'Success');
        return redirect()->back();
    }
    // public function details($id)
    // {
    //     $collection = Collection::findOrFail($id);
    //     $members = Employer::get();
    //     $project = Project::get();
    //     return view('dashboard.pages.collection.details', compact('collection', 'members', 'project'));
    // }

    // // ------- add collection from project page -----
    public function CollectionAdd($id)
    {
        $project = Project::findOrFail($id);
        // dd($project);
        return view('dashboard.pages.collection.add', compact('project'));
    }
}
