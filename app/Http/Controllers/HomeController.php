<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Illuminate\Support\Facades\View;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
//        echo json_encode($courses);
//        exit();
        if(auth()->user()->isAdmin()) {
            return View::make('admin/dashboard');
        } else {
            return View::make('home')
                ->with('courses',$courses);
        }
    }

}
