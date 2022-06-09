<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Enroll;
use App\EnrollDetail;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function outline($id){
      $outline = DB::table('courses')
      ->where('courses.id',$id)
      ->get();
      return view('outline')->with('outlines',$outline);
    }

    public function check_status()
    {
            $enrolls = DB::table('enroll')
            ->join('users', 'enroll.user_id', '=', 'users.id')
            ->join('batches', 'enroll.batch_id', '=', 'batches.batch_id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->join('enroll_detail','enroll.enroll_id','=','enroll_detail.enroll_id')
            ->select('enroll.enroll_id','courses.name','batches.batch_name',
                'courses.cost','courses.discount','courses.minimum','enroll.reg_state','enroll.payment_state','batches.training_date',
                DB::raw('count(enroll_detail.enroll_id) as enroll_count'))
            ->where('users.id','=',Auth::user()->id)
            ->groupBy('enroll.enroll_id')
            // ->orderBy('enroll.enroll_id', 'desc')
            ->paginate(5);



       // echo json_encode($enrolls);
       // exit();

        return View::make('status')
            ->with('enrolls',$enrolls);
    }


    public function pdfreport($id)
    {
        $enroll = DB::table('enroll')
            ->join('users', 'enroll.user_id', '=', 'users.id')
            ->join('provinces','users.provinces','=','provinces.PROVINCE_ID')
            ->join('batches', 'enroll.batch_id', '=', 'batches.batch_id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->select('enroll.enroll_id','courses.name','batches.batch_name',
                'courses.cost','courses.discount','courses.minimum','enroll.reg_state','enroll.payment_state','batches.training_date',
                'batches.place','batches.start_reg','batches.end_reg','batches.batch_type','provinces.PROVINCE_NAME')
            ->where('enroll_id','=',$id)
            ->get();

        $enroll_detail = EnrollDetail::all()->where('enroll_id','=',$id);

        $index = 0;

//        echo json_encode(($enroll));
//        exit();

        $pdf = PDF::loadView('pdf',['enroll' => $enroll],['enroll_detail' => $enroll_detail]);
        return $pdf->stream();
//        return View::make('pdf')
//            ->with('enroll',$enroll);
    }


}
