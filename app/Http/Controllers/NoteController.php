<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class NoteController extends Controller
{
    public function index()
    {
        $data = Note::get();
        return view('dashboard.pages.note.index', compact('data'));
    }
    public function create()
    {
        $projects = Project::get();
        return view('dashboard.pages.note.create', compact('projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/file'), $fileName);
        }else{
            $fileName = null;
        }

        Note::create([
            'note' => $request->note,
            'file' => $fileName,
            'project_id' => $request->project_id,
        ]);
        Toastr::success('Note Create Success', 'Success');
        return redirect()->back();
    }

    // ---- add note from project details page ----
    public function AddNote(Request $request,$id){
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

    // ------- add note from project page ----------
    public function NoteAdd($id){
        $projects = Project::get();
        $data = $id;
        return view('dashboard.pages.note.add',compact('projects','data'));
    }
    // ---- save note from project page ---
    public function SaveNote(Request $request){
        $request->validate([
            'project_id' => 'required'
        ]);
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/file'), $fileName);
        } else {
            $fileName = null;
        }
        Note::create([
            'note' => $request->note,
            'file' => $fileName,
            'project_id' => $request->project_id,
        ]);
        Toastr::success('Note Create Success', 'Success');
        return redirect()->back();

    }

    public function edit(Note $note)
    {
        $projects = Project::get();
        return view('dashboard.pages.note.edit', compact('note', 'projects'));
    }
    public function update(Request $request, Note $note)
    {
        $noteData = $request->validate([
            'project_id' => 'required'
        ]);
        $noteData = $request->all();
        if ($request->hasFile('file')) {
                $previousImage = public_path('image/note') . '/' . $note->file;
                if (File::exists($previousImage)) {
                    File::delete($previousImage);
                }
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('image/file'), $imageName);
        } else {
            $imageName = $note->file;
        }

        $note->update($noteData);
        Toastr::success('Note updated Success.', 'Success');
        return redirect(url('dashboard/note'));
    }

    public function destroy($id)
    {
        $data = Note::findOrFail($id);
        if ($data->file) {
                $imagePath = public_path('image/file') . '/' . $data->file;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
        }
        $data->delete();
        Toastr::warning('Note Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $data = Note::with('project')->findOrFail($id);
        return view('dashboard.pages.note.details', compact('data'));
    }
}
