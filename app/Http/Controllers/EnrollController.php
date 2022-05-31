<?php

namespace App\Http\Controllers;

use App\Enroll;
use App\EnrollDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
Use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EnrollController extends Controller
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
        //$courses = Courses::all();
        $batches = DB::table('batches')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->select('batches.batch_id','batches.course_id','courses.name','batches.batch_name','batches.batch_type')
            ->get();

//        echo json_encode($batches);
//        exit();

        return View::make('site/enroll/index')
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
        //$enroll = $request->all();
        $enroll = New Enroll();
        $enroll->batch_id = Input::get('batch_id');
        $enroll->user_id = Input::get('user_id');
        $enroll->reg_state = 1;
        $enroll->save();

        //get last record from enroll table and get enroll_id
        $enroll = Enroll::all()->last();
        $enroll_id = $enroll->enroll_id;

        // count amount of register by food
        $size = count(Input::get('prefix_name'));



        for($index = 0 ; $index < $size ; $index++){
            $prefix_name = Input::get('prefix_name');
            $name = Input::get('name');
            $surname = Input::get('surname');
            $position = Input::get('position');
            $food = Input::get('food');
            $telephone = Input::get('telephone');

            $enroll_detail = new EnrollDetail();
            $enroll_detail->enroll_id = $enroll_id;
            $enroll_detail->prefix_name = $prefix_name[$index];
            $enroll_detail->name = $name[$index];
            $enroll_detail->surname = $surname[$index];
            $enroll_detail->position = $position[$index];
            $enroll_detail->food = $food[$index];
            $enroll_detail->telephone = $telephone[$index];

            $enroll_detail->save();
        }

//        $name = Input::get('name');
//        $position = Input::get('position');
//        $food = Input::get('food');
//        $telephone = Input::get('telephone');
//
//        foreach($food as $key => $n )
//        {
//            $arrData[] = array(
//                "enroll_id"		=> $enroll_id,
//                "name"		=> $name[$key],
//                "position"		=> $position[$key],
//                "food"	=> $food[$key],
//                "telephone"	=> $telephone[$key]
//            );
//        }
//        echo json_encode($arrData);
//        exit();

        return redirect()->action('HomeController@index');
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
