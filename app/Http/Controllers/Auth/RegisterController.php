<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prefix_name' => 'required',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'member_type' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'company' => 'required',
            'address' => 'required',
            'districts' => 'required',
            'amphures' => 'required',
            'provinces' => 'required',
            'zipcodes' => 'required|max:5',
            'telephone' => 'required|max:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        $reg_info = new User();
        $reg_info->prefix_name = Input::get('prefix_name');
        $reg_info->name = Input::get('name');
        $reg_info->surname = Input::get('surname');
        $reg_info->member_type = Input::get('member_type');
        $reg_info->email = Input::get('email');
        $reg_info->password = bcrypt(Input::get('password'));
        $reg_info->company = Input::get('company');
        $reg_info->address = Input::get('address');
        $reg_info->districts = Input::get('districts');
        $reg_info->amphures = Input::get('amphures');
        $reg_info->provinces = Input::get('provinces');
        $reg_info->zipcodes = Input::get('zipcodes');
        $reg_info->telephone = Input::get('telephone');
        // echo json_encode($reg_info);
        // exit();
        $reg_info->save();
        return view('auth/login');
        // $data = $request->all();
        // echo Input::get('member_type');
        // echo json_encode($request->all());
        // exit();
        // $data = $request->all();
        // return User::create([
        //     'prefix_name' => $data['prefix_name'],
        //     'name' => $data['name'],
        //     'surname' => $data['surname'],
        //     'member_type' => $data['member_type'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        //     'company' => $data['company'],
        //     'address' => $data['address'],
        //     'districts' => $data['districts'],
        //     'amphures' => $data['amphures'],
        //     'provinces' => $data['provinces'],
        //     'zipcodes' => $data['zipcodes'],
        //     'telephone' => $data['telephone'],
        //     'type' => User::DEFAULT_TYPE,
        // ]);
    }

    // public function reg_complete(Request $request){
    //   $data = $request->all();
    //   echo json_encode($data);
    //   exit();
    // }

    public function index(){
      $provinces = DB::table('provinces')
      ->orderBy('PROVINCE_NAME','asc')
      ->get();
      return view('auth/register')->with('provinces',$provinces);
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
}
