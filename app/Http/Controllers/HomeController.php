<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Employer;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->user_type === 'admin'){
            $user = User::count();
            $member = Employer::count();
            $project = Project::count();
            $client = Client::count();
            $task = Task::count();
            $collection = Collection::sum('collect');
            $expense = Expense::sum('amount');
            return view('dashboard.pages.index', compact('client', 'task', 'expense', 'user', 'collection', 'member', 'project'));
        }else{
            $user = auth()->user()->employer_id;
            $project = ProjectMember::where('member_id',$user)->count();
            $task = Task::where('employer_id', $user)->count();
            return view('dashboard.pages.index', compact('task', 'project'));

        }

    }
}
