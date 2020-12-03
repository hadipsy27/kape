<?php

namespace App\Http\Controllers;
use App\Course;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController {

    /**
     * Takes you to the admin page of the app
     * @return mixed
     */
    public function index(){
        if( Auth::user()->email != 'admin@admin.com' ){
            return Redirect::back();
        }

        $users = User::all();
        $n_users = count($users);
        $n_tasks = Task::all()->count();
        $n_projects = Project::all()->count();
        $n_courses = Course::all()->count();

        return View::make('admin/index')
            ->with('pTitle', 'Admin')
            ->with('users', $users)
            ->with('n_users', $n_users)
            ->with('n_tasks', $n_tasks)
            ->with('n_projects', $n_projects)
            ->with('n_courses', $n_courses);

    }

}