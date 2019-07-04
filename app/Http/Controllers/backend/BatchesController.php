<?php

namespace App\Http\Controllers\backend;

use App\Batches;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class BatchesController extends Controller
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
//        $query = Batches::paginate(5)
//            ->join('courses', 'batches.course_id', '=', 'courses.id')
//            ->select('batches.batch_id', 'courses.name', 'batches.batch_name', 'batches.deadline', 'batches.training_date', 'batches.place');

        $batches = DB::table('batches')
                ->join('courses', 'batches.course_id', '=', 'courses.id')
                ->select('batches.batch_id', 'courses.name', 'batches.batch_name', 'batches.deadline', 'batches.training_date', 'batches.place')
                ->paginate(5);

//        $batches = array(
//            'batches' => $query
//        );

        return View::make('backend/batches/index')
            ->with('batches',$batches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Courses::all()->where('status','!=',0);
        return View::make('backend/batches/create')
            ->with('courses',$courses);
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
        $batch = new Batches();
        $batch->course_id = Input::get('course_id');
        $batch->batch_name = Input::get('batch_name');
        $batch->deadline = Input::get('deadline');
        $batch->training_date = Input::get('training_date');
        $batch->place = Input::get('place');
        $batch->save();
        return redirect()->action('backend\BatchesController@index');

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
        $batch = DB::table('batches')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->select('batches.batch_id', 'batches.course_id', 'courses.name', 'batches.batch_name', 'batches.deadline', 'batches.training_date', 'batches.place')
            ->where('batches.batch_id','=',$id )
            ->get();



//        $batch = array(
//            'batch' => $query
//        );

        return View::make('backend/batches/edit')
            ->with('batch',$batch);

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

        $batch = new Batches;

        $batch->updateById($id, array(
                'course_id' => $request->input('course_id'),
                'batch_name' => $request->input('batch_name'),
                'deadline' => $request->input('deadline'),
                'training_date' => $request->input('training_date'),
                'place' => $request->input('place')
            )
        );
//        $batch = new Batches;
//        $batch->course_id = Input::get('course_id');
//        $batch->batch_name = Input::get('batch_name');
//        $batch->deadline = Input::get('deadline');
//        $batch->training_date = Input::get('training_date');
//        $batch->place = Input::get('place');
//
//        $batch->updateById($id,$batch);

        return redirect()->action('backend\BatchesController@index');
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
        $batch = Courses::find($id);
        $batch->delete();
        return redirect()->action('backend\CoursesController@index');
    }
}
