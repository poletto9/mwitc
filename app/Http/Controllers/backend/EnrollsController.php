<?php

namespace App\Http\Controllers\backend;

use App\Enroll;
use App\EnrollDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class EnrollsController extends Controller
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
        $enrolls = DB::table('enroll')
            ->join('users', 'enroll.user_id', '=', 'users.id')
            ->join('batches', 'enroll.batch_id', '=', 'batches.batch_id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->join('enroll_detail','enroll.enroll_id','=','enroll_detail.enroll_id')
            ->select('enroll.enroll_id','courses.name as course_name','batches.batch_name',
                'users.name','users.surname','users.company','users.telephone',
                'courses.cost','enroll.reg_state','enroll.payment_state','batches.training_date',
                'batches.place','batches.start_reg','batches.end_reg',
                DB::raw('count(enroll_detail.enroll_id) as enroll_count'))
            ->groupBy('enroll.enroll_id')
            ->paginate(5);

//        echo json_encode($enrolls);
//        exit();

        return View::make('backend/enrolls/index')
            ->with('enrolls',$enrolls);
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
        $enroll = DB::table('enroll')
            ->join('users', 'enroll.user_id', '=', 'users.id')
            ->join('batches', 'enroll.batch_id', '=', 'batches.batch_id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->select('enroll.enroll_id','enroll.batch_id','enroll.user_id','courses.name as course_name','batches.batch_name','users.name','users.company',
                'courses.cost','enroll.reg_state','enroll.payment_state','batches.training_date',
                'batches.place','batches.end_reg')
            ->where('enroll_id','=',$id)
            ->get();

        return View::make('backend/enrolls/edit')
            ->with('enroll',$enroll);
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
        $enroll = new Enroll();

        $enroll->updateById($id, array(
            'batch_id' => Input::get('batch_id'),
            'user_id' => Input::get('user_id'),
            'reg_state' => Input::get('reg_state'),
            'payment_state' => Input::get('payment_state')
        ));

        return redirect()->action('backend\EnrollsController@index');
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

    public function detail($id){
        $enroll_detail = EnrollDetail::all()->where('enroll_id','=',$id);

        return response()->json(['enroll_detail'=>$enroll_detail]);
    }
}
