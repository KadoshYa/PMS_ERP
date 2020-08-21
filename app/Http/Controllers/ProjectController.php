<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Task;
use DateTime;
use Alert;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pmsErp.project.index')->with('projects', Project::all());

    }

    public function showOngoing()
    {
        $ongoing="ongoing";

        return view('pmsErp.project.ongoing')->with('projects', Project::where('status', $ongoing)->get());

    }

    public function showCompleted()
    {
        $complete = "complete";

        return view('pmsErp.project.complete')->with('projects', Project::where('status', $complete)->get());

    }

    public function showStuck()
    {
        $stuck="stuck";
        return view('pmsErp.project.stuck')->with('projects', Project::where('status', $stuck)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pmsErp.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'project_name' => 'required|max:255',
            'owner_id'=> 'required',
            'description'=> 'required|max:500',
            'dueDate' => 'required'

        ]);


        $document = $request->attachment;

        $document_new_name = time().$document->getClientOriginalName();

        $document->move('PmsErp/Uploads/TaskDocuments', $document_new_name);


        $project = Project::create([

            'name'=>$request->project_name,
            'owner_id'=>Auth::id(),
            'description' =>$request->description,
            'dueDate' =>$request->dueDate,
            'attachment'=>'PmsErp/Uploads/ProjectDocuments'.$document_new_name            

        ]);

        toast('Project Successfully Created!', 'success');


        return redirect()->route('project.all');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        $tasks = Project::find($id)->tasks;

        $date = $project->dueDate;

        $createDate = new DateTime($date);

        $stripDate = $createDate->format('m-d-Y');
    

        return view('pmsErp.project.detail')->with('project', $project)
                                            ->with('tasks', $tasks)
                                            ->with('date', $stripDate);

    }

    public function calenderView()

    {
        return view('pmsErp.project.calenderView');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $project = Project::find($id);

        $date = $project->dueDate;

        $createDate = new DateTime($date);

        $stripDate = $createDate->format('m-d-Y');

        return view('pmsErp.project.update')->with('project', $project)
                                            ->with('date', $stripDate);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {

        $project = Project::find($id);

        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;

        // Attachment Update

        if($request->hasFile('attachment'))
        {
            $document = $request->attachment;
             $document_new_name = time().$document->getClientOriginalName();
            $document->move('PmsErp/Uploads/ProjectDocuments', $document_new_name);
            $project->attachment = $document_new_name;
        }

        if($request->hasFile('dueDate'))
        {
            $project->dueDate = $request->dueDate;
        }
        else {
            $project->dueDate = $project->dueDate;
        }

        
        $project->save();

        toast('Project Successfully Updated!', 'success');

        return redirect()->route('project.all');
    }

    

    public function trash( $id)
    {
        $project = Project::find($id);

        $project -> delete();

        toast('Project Successfully Trashed!', 'success');


        return redirect()->route('project.all');
    }

    
    public function restore( $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();

        $project -> restore();

        toast('Project Successfully Created!', 'success');

        return redirect()->route('project.all');

    }

    public function showTrash( )
    {
        $projects = Project::onlyTrashed()->get();

        return view('pmsErp.project.trash')->with('projects', $projects);


    }

    public function markAsCompleted(Request $request, $id)
    {
        $project = Project::find($id);

        $project->status = 'complete';

        $project->save();

        toast('Project Marked as Created!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();

        $project -> forceDelete(); 

        toast('Project Permanently Deleted!', 'success');

        return redirect()->back();

    }
}
