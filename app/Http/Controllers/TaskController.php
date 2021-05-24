<?php

namespace App\Http\Controllers;


use App\Notifications\NewTaskNotification;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use App\User;
use Auth;
use App\Task;
Use DateTime;
use Alert;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('PmsErp.task.index')->with('tasks', Task::all());

    }

    public function mytasks()
    {
        $user = Auth::user();

        $user_id = $user->id;

        $tasks = User::find($user_id)->tasks;

        return view('PmsErp.task.mytasks')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminId = Auth::id();
        $user = User::find($adminId); 
        $department=$user->department;
        $admin_code = 1;

        return view('PmsErp.task.create')->with('projects', Project::all())
                                         ->with('users', User::where('department', $department)->get())
                                         ->with('admins', User::where('admin', $admin_code)->get());
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

            'task_name' => 'required|max:255',
            'task_detail'=> 'required|max:500',
            'priority' => 'required',
            'dueDate' => 'required',

        ]);

        if($request->hasFile('attachment'))
        {

            $document = $request->attachment;

            $document_new_name = time().$document->getClientOriginalName();

            $allowedFileTypes=config('app.allowedFileTypes');

            $document->move('PmsErp/Uploads/TaskDocuments/', $document_new_name);

            $task = Task::create([

                'task_name' =>$request->task_name,
                'employee_id' =>$request->admin_id,
                'departmnent_id'=>User::find($request->admin_id)->department,
                'project_id' =>$request->addToProject,
                'task_detail' =>$request->task_detail,
                'priority' =>$request->priority,
                'due_date' =>$request->dueDate,
                'attachment'=>'PmsErp/Uploads/TaskDocuments/'.$document_new_name            

            ]);

        }

        else 
        {
            $task = Task::create([

                'task_name' =>$request->task_name,
                'employee_id' =>$request->admin_id,
                'project_id' =>$request->addToProject,
                'task_detail' =>$request->task_detail,
                'priority' =>$request->priority,
                'due_date' =>$request->dueDate,
    
            ]);
        }


        $task ->users()->attach($request->employee_id);
        $task ->users()->attach($request->admin_id);

        $task->save(); 

        toast('Task Successfully Created!', 'success');

        $task_id = $task->id;

        $users = Task::find($task_id)->users; 

        foreach($users as $user)
        {
            $new_id=$user->id;
            User::find($new_id)->notify((new NewTaskNotification));

        }
    
 
        return redirect()->route('task.all');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $date = $task->due_date;
        $createDate = new DateTime($date);
        $stripDate = $createDate->format('m-d-Y');

        return view('PmsErp.task.detail')->with('task', $task)
                                         ->with('date', $stripDate);

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $date = $task->due_date;
        $createDate = new DateTime($date);
        $stripDate = $createDate->format('m-d-Y');

        $adminId = Auth::id();
        $user = User::find($adminId); 
        $department=$user->department;

        return view('PmsErp.task.update')->with('task', $task)
                                         ->with('date', $stripDate)
                                         ->with('users', User::where('department', $department)->get());
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

        $task = Task::find($id);

        if($request->hasFile('task_name'))
        {
            $task->task_name = $request->task_name;
        }

        if($request->hasFile('task_detail'))
        {
            $task->task_detail = $request->task_detail;
        }
        $task->status = $request->status;

        // Attachment Update

        if($request->hasFile('attachment'))
        {

            $document = $request->attachment;

            $document_new_name = time().$document->getClientOriginalName();

            $document->move('PmsErp/Uploads/TaskDocuments/', $document_new_name);

         
            Task::find($task->id)->attachment='PmsErp/Uploads/TaskDocuments/'.$document_new_name;            


        }
        if($request->hasFile('dueDate'))
        {
            $task->due_date = $request->dueDate;
        }
        else {
            $task->due_date = $task->due_date;
        }

        if($request->hasFile('priotiy'))
        {
            $task->priority = $request->priority;
        }
        else {
            $task->priority = $task->priority;
        }

        $task ->users()->attach($request->employee_id);
        
        $task->save();

        toast('Task Successfully Updated!', 'success');

        if(Auth::user()->admin){
            return redirect()->route('task.all');
        }
        else {
            return redirect()->route('task.mytasks');            
        }

    }

    public function trash( $id)
    {
        $task = Task::find($id);

        $task -> delete();

        toast('Task Successfully Trashed!', 'success');

        return redirect()->route('task.all');
    }

    public function restore( $id)
    {
        $task = Task::withTrashed()->where('id', $id)->first();

        $task -> restore();

        toast('Task Successfully Restored!', 'success');

        return redirect()->route('task.all');
    }


    public function showTrash( )
    {
        $tasks = Task::onlyTrashed()->get();

        return view('PmsErp.task.trash')->with('tasks', $tasks);

    }

    public function markAsCompleted(Request $request, $id)
    {
        $task = Task::find($id);

        $task->status = 'complete';

        $task->save();

        toast('Task Marked as Completed!', 'success');

        return redirect()->back();
    }

    
    public function markAsVerified(Request $request, $id)
    {
        $task = Task::find($id);

        $task->status = 'verified';

        $task->save();

        toast('Task Successfully Verified!', 'success');


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
        $task = Task::withTrashed()->where('id', $id)->first();

        $task -> forceDelete(); 

        toast('Task Permanently Deleted!', 'success');

        return redirect()->back();
    }
}
