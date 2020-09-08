<?php

namespace App\Http\Controllers;

use App\CHarts\adminAllProjects;
use App\CHarts\adminAllTasks;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;
use DB;
use Charts;



class ChartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function getAllMonths()
    {
        $months_array= array();
        $projects_dates = Project::pluck('created_at');
        $projects_dates = json_decode($projects_dates, true);

       if (! empty($projects_dates))
       {
           foreach ($projects_dates as $unformatted_date){
               $date = new \DateTime($unformatted_date);
               $month_no= $date->format('m');
               $month_name = $date->format('M');

                $months_array[$month_no] = $month_name;
           }
       }
       return $months_array;

    }

    function getMonthlyProjectCount($month)
    {
        $monthly_project_count= Project::whereMonth('created_at', $month)->get()->count();
        $completed_project_count= Project::whereMonth('status', 'completed')->get()->count();
        $ongoing_project_count= Project::whereMonth('status', 'ongoing')->get()->count();
        $stuck_project_count= Project::whereMonth('status', 'stuck')->get()->count();

        return $monthly_project_count;
    }

    function getCompletedProjectCount($month)
    {
        $completed_project_count= Project::whereMonth('created_at', $month)->where('status', 'complete')->get()->count();
 

        return $completed_project_count;
    }
    
    function getOngoingProjectCount($month)
    {
        $ongoing_project_count= Project::whereMonth('created_at', $month)->where('status', 'ongoing')->get()->count();

        return $ongoing_project_count;
    }

    function getStuckProjectCount($month)
    {
        $stuck_project_count= Project::whereMonth('created_at', $month)->where('status', 'stuck')->get()->count();

        return $stuck_project_count;
    }

    function getProjectMonthlyData()
    {
        $monthly_project_data_array = array();
        $monthly_project_count_array=array();
        $completed_project_count_array=array();
        $ongoing_project_count_array=array();
        $stuck_project_count_array=array();
        $months_array = $this->getAllMonths();
        $month_name_array =array();
        if(! empty($months_array))
        {
            foreach ($months_array as $month_no=> $month_name)
            {
                $monthly_project_count = $this->getMonthlyProjectCount($month_no);
                $completed_project_count = $this->getCompletedProjectCount($month_no);
                $ongoing_project_count = $this->getOngoingProjectCount($month_no);
                $stuck_project_count = $this->getStuckProjectCount($month_no);
                array_push($monthly_project_count_array, $monthly_project_count);
                array_push($completed_project_count_array, $completed_project_count);
                array_push($ongoing_project_count_array, $ongoing_project_count);
                array_push($stuck_project_count_array, $stuck_project_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no=max($monthly_project_count_array);
        $max = round(($max_no + 10/2)/10)*10;
        $months_array = $this->getAllMonths();
        $monthly_project_data_array = array(
            'months' => $month_name_array,
            'project_count' => $monthly_project_count_array,
            'complete' => $completed_project_count_array,
            'ongoing' => $ongoing_project_count_array,
            'stuck' => $stuck_project_count_array,
            'max' => $max);

            $admin_project_chart= new adminAllProjects;
            $admin_project_chart->labels($months_array);
            $admin_project_chart->dataset('All Projects', 'line', $monthly_project_count_array);

            return $monthly_project_data_array;

    }

// ----------------------------------------------------------------------------------------- //
// ////////////////////////////////TASK\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\//
    function getAllTaskMonths()
    {
        $task_months_array= array();
        $tasks_dates = Task::pluck('created_at');
        $tasks_dates = json_decode($tasks_dates, true);

       if (! empty($tasks_dates))
       {
           foreach ($tasks_date as $unformatted_date){
               $date = new \DateTime($unformatted_date);
               $month_no= $date->format('m');
               $month_name = $date->format('M');

                $task_months_array[$month_no] = $month_name; 
           }
       }
       return $task_months_array;

    }

    function getMonthlyTasksCount($taskMonth)
    {
        $monthly_task_count= Task::whereMonth('created_at', $taskMonth)->get()->count();
        return $monthly_task_count;
    }

    
    function getCompletedTaskCount($taskMonth)
    {
        $completed_task_count= Task::whereMonth('created_at', $taskMonth)->where('status', 'complete')->get()->count();
 

        return $completed_task_count;
    }
    
    function getOngoingTaskCount($taskMonth)
    {
        $ongoing_task_count= Task::whereMonth('created_at', $taskMonth)->where('status', 'ongoing')->get()->count();

        return $ongoing_task_count;
    }

    function getStuckTaskCount($taskMonth)
    {
        $stuck_task_count= Task::whereMonth('created_at', $taskMonth)->where('status', 'stuck')->get()->count();

        return $stuck_task_count;
    }

    function getTasksMonthlyData()
    {
        $monthly_task_data_array = array();
        $monthly_task_count_array=array();
        $completed_task_count_array=array();
        $ongoing_task_count_array=array();
        $stuck_task_count_array=array();
        $months_array = $this->getAllMonths();
        $month_name_array =array();
        if(! empty($months_array))
        {
            foreach ($months_array as $month_no=> $month_name)
            {
                $monthly_task_count = $this->getMonthlyTasksCount($month_no);
                $completed_task_count = $this->getCompletedTaskCount($month_no);
                $ongoing_task_count = $this->getOngoingTaskCount($month_no);
                $stuck_task_count = $this->getStuckTaskCount($month_no);
                array_push($monthly_task_count_array, $monthly_task_count);
                array_push($completed_task_count_array, $completed_task_count);
                array_push($ongoing_task_count_array, $ongoing_task_count);
                array_push($stuck_task_count_array, $stuck_task_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no=max($monthly_task_count_array);
        $max = round(($max_no + 10/2)/10)*20;
        $months_array = $this->getAllMonths();
        $monthly_task_data_array = array(
            'taskMonths' => $month_name_array,
            'task_count' => $monthly_task_count_array,
            'complete' => $completed_task_count_array,
            'ongoing' => $ongoing_task_count_array,
            'stuck' => $stuck_task_count_array,
            'max' => $max);

            $admin_task_chart= new adminAllTasks;
            $admin_task_chart->labels($months_array);
            $admin_task_chart->dataset('All Tasks', 'line', $monthly_task_count_array);

            return $monthly_task_data_array;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
