<?php

namespace App\Http\Controllers\backend;

use App\Courses;
use Illuminate\Support\Facades\Input;
Use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $courses = Courses::all();
//        $courses = Courses::orderby('id','desc')->get();
//        $count = Courses::count();

        //Pagination ถ้าแบ่งหน้าไม่ต้อง query ALL
        //$courses = Courses::simplePaginate(5);
        $courses = Courses::paginate(3);

        return View::make('backend/courses/index')
            ->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('backend/courses/create');
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
        $course = new Courses();
        $course->name = Input::get('course_name');
        $course->desc = Input::get('description');
        $course->amount = Input::get('amount');
        $course->cost = Input::get('cost');
        $course->discount = Input::get('discount');
        $course->minimum = Input::get('minimum');
        $course->status = Input::get('status');
        $course->save();
        return redirect()->action('backend\CoursesController@index');
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
        $course = Courses::findOrFail($id);
        return View::make('backend/courses/edit')
            ->with('course',$course);
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
        $course = Courses::find($id);
        $course->name = Input::get('course_name');
        $course->desc = Input::get('description');
        $course->amount = Input::get('amount');
        $course->cost = Input::get('cost');
        $course->discount = Input::get('discount');
        $course->minimum = Input::get('minimum');
        $course->status = Input::get('status');
        $course->save();
        return redirect()->action('backend\CoursesController@index');
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
        $course = Courses::find($id);
        $course->delete();
        return redirect()->action('backend\CoursesController@index');
    }
}
