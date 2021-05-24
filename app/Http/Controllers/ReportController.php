<?php

namespace App\Http\Controllers;


use App\Notifications\NewReportNotification;
use App\Notifications\ReportAcceptedNotification;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Report;
use App\Project;
use App\User;
use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Auth::user()->department; 
        $reports = Report::all();
        $dep_reports="";
        foreach ($reports as $report){
          $new_depts = User::find($report->created_by)->department;
          
            if (str_is($new_depts, $department))
            {
                $dep_reports=$report;
            }
        }
        return view('PmsErp.report.index')->with('reports', Report::all())
                                          ->with('dep_reports', $dep_reports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $userId = Auth::id();
        $user = User::find($userId); 
        $department=$user->department;

        $admin_code = 1;
        $super_code = 2;
        
        return view('PmsErp.report.create')->with('admins', User::where('admin', $admin_code)->get())
                                           ->with('supers', User::where('admin', $super_code)->get());
    }

    public function projectcreate($id) 
    {
        $userId = Auth::id();
        $user = User::find($userId); 
        $department=$user->department;

        $project = Project::find($id);

        $admin_code = 1;
        $super_code = 2;
        
        return view('PmsErp.report.projectreport')->with('admins', User::where('admin', $admin_code)->get())
                                                  ->with('supers', User::where('admin', $super_code)->get())
                                                  ->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [

            'report_name' => 'required|max:255',
            'report_file'=> 'required',

        ]);

            $document = $request->report_file;

            $document_new_name = time().$document->getClientOriginalName();

            $document->move('PmsErp/Uploads/Reports/', $document_new_name);

            $mytime = Carbon::now();

            
        if($request->hasFile('send_to'))
        {
            $report = Report::create([

                'employee_id'=>$request->send_to,
                'report'=>$request->report_name,
                'file'=>'PmsErp/Uploads/Reports/'.$document_new_name,
                'report_date'=>$mytime,
                'created_by'=>$id

            ]);
        }

        else{
            
            $report = Report::create([

                'employee_id'=>$request->send_to_1,
                'report'=>$request->report_name,
                'file'=>'PmsErp/Uploads/Reports/'.$document_new_name,
                'report_date'=>$mytime,
                'created_by'=>$id

            ]);
        }

        if($request->send_to_1){
            User::find($request->send_to_1)->notify((new NewReportNotification));
        } 
        if($request->send_to){
            User::find($request->send_to)->notify((new NewReportNotification));
        }

            $report->save();    

            toast('Report Successfully Created!', 'success');

            return redirect()->back();    
        }



        public function ProjectStore(Request $request, $id, $pid)
        {
            $this->validate($request, [
    
                'report_name' => 'required|max:255',
                'report_file'=> 'required',
    
            ]);
    
                $document = $request->report_file;
    
                $document_new_name = time().$document->getClientOriginalName();
    
                $document->move('PmsErp/Uploads/Reports/', $document_new_name);
    
                $mytime = Carbon::now();

                $report = Report::create([
    
                    'project_id'=>$pid,
                    'employee_id'=>$request->send_to,
                    'report'=>$request->report_name,
                    'file'=>'PmsErp/Uploads/Reports/'.$document_new_name,
                    'report_date'=>$mytime,
                    'created_by'=>$id
    
    
                ]);

                if($request->send_to_1){
                    User::find($request->send_to_1)->notify((new NewReportNotification));
                } 
                if($request->send_to){
                    User::find($request->send_to)->notify((new NewReportNotification));
                }

    
                $report->save();
    
                toast('Report Successfully Created!', 'success');

                $this_project=Project::find($pid);

                $this_project->report='PmsErp/Uploads/Reports/'.$document_new_name;

                $this_project->save();
    
                return redirect()->back();    

            }

    public function verifyReport(Request $request, $id)
    {
        $report = Report::find($id);

        $report->recieved = 1;

        $report->save();

        User::find($report->created_by)->notify((new ReportAcceptedNotification));

        toast('Report Verified', 'success');

        return redirect()->back();
    }

    public function showMine()
    {
        $current_user=Auth::user()->id;

        $my_reports=Report::where('created_by', $current_user)->get();

        return view('PmsErp.report.MyReport')->with('reports', $my_reports);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
