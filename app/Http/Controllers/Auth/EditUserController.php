<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class EditUserController extends Controller
{


  public function display_edit_user(){
    // echo Auth::user()->id;
    $provinces = DB::table('provinces')
    ->orderBy('PROVINCE_NAME','asc')
    ->get();
    return view('auth\edit')->with('provinces',$provinces);
  }

  public function fetch_amphures(Request $request){
    $id = $request->get('province_id'); // ค่า province_id ที่ส่งมาจาก Ajax
    $result=array();
    $query = DB::table('provinces')
    ->join('amphures','provinces.PROVINCE_ID','=','amphures.PROVINCE_ID')
    ->select('amphures.AMPHUR_ID','amphures.AMPHUR_NAME')
    ->where('provinces.PROVINCE_ID',$id)
    ->orderBy('amphures.AMPHUR_NAME','asc')
    // ->groupBy('amphures.AMPHUR_NAME')
    ->get();
    // รูปแบบการแสดงผล
    $output = '<option value="" disabled selected>เลือกเขต/อำเภอ</option>';
    foreach ($query as $row) {
      $output.='<option value="'.$row->AMPHUR_ID.'">'.$row->AMPHUR_NAME.'</option>';
    }
    echo $output;
  }

  public function fetch_districts(Request $request){
    $id = $request->get('amphur_id');
    $result=array();
    $query = DB::table('amphures')
    ->join('districts','amphures.AMPHUR_ID','=','districts.AMPHUR_ID')
    ->select('districts.DISTRICT_ID','districts.DISTRICT_CODE','districts.DISTRICT_NAME')
    ->where('amphures.AMPHUR_ID',$id)
    // ->groupBy('amphures.AMPHUR_NAME')
    ->get();
    // รูปแบบการแสดงผล
    $output = '<option value="" disabled selected>เลือกแขวง/ตำบล</option>';
    foreach ($query as $row) {
      $output.='<option value="'.$row->DISTRICT_CODE.'">'.$row->DISTRICT_NAME.'</option>';
    }
    echo $output;
  }

  public function fetch_zipcodes(Request $request){
    $id = $request->get('districts_code');
    $result=array();
    $query = DB::table('districts')
    ->join('zipcodes','districts.DISTRICT_CODE','=','zipcodes.district_code')
    ->select('zipcodes.zipcode')
    ->where('districts.DISTRICT_CODE',$id)
    // ->groupBy('amphures.AMPHUR_NAME')
    ->get();
    // รูปแบบการแสดงผล
    foreach ($query as $row) {
        $output = '<input type=text class="form-control zipcodes" id="zipcodes" name="zipcodes" value="'.$row->zipcode.'" placeholder="รหัสไปรษณีย์">';
    }
    echo $output;
  }

  public function update_user_data(Request $request){
    //จะสร้าง New array หรือ ใช้ method Find ก็ได้
    $users = User::find(Auth::user()->id);
    $users->prefix_name = Input::get('prefix_name');
    $users->name = Input::get('name');
    $users->surname = Input::get('surname');
    $users->member_type = Input::get('member_type');
    $users->email = Input::get('email');
    $users->company = Input::get('company');
    $users->address = Input::get('address');
    $users->districts = Input::get('districts');
    $users->amphures = Input::get('amphures');
    $users->provinces = Input::get('provinces');
    $users->zipcodes = Input::get('zipcodes');
    $users->telephone = Input::get('telephone');
    // echo json_encode($users);
    // exit();
    $users->save();
    return redirect()->action('HomeController@index');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
