<?php

namespace App\Http\Controllers;

use App\Project;
use App\Department;
use App\Task;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Alert;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function allProjects()
    {
        return redirect()->route('project.all');

    }

    public function superDashboard()
    { 
      $ongoing = "ongoing";
      $complete = "complete";
      $stuck = "stuck";
     
        return view('PmsErp.superDashboard')->with('projects', Project::all())
                                            ->with('ongoingProjects',Project::where('status', $ongoing)->get()->count())
                                            ->with('completeProjects',Project::where('status', $complete)->get()->count())
                                            ->with('stuckProjects',Project::where('status', $stuck)->get()->count())
                                            ->with('departments',Department::all());
    }

    public function adminDashboard()
    {
      $ongoing = "ongoing";
      $complete = "complete";
      $stuck = "stuck";
     
        return view('PmsErp.adminDashboard')->with('projects', Project::all())
                                            ->with('ongoingProjects',Project::where('status', $ongoing)->get()->count())
                                            ->with('completeProjects',Project::where('status', $complete)->get()->count())
                                            ->with('stuckProjects',Project::where('status', $stuck)->get()->count());


    }

  public function mydashboard(){
    $user = Auth::user();

      return view('PmsErp.mydashboard');
  }
}
