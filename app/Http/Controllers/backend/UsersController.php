<?php

namespace App\Http\Controllers\backend;

use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
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
        $users = DB::table('users')
        ->join('districts','users.districts','=','districts.DISTRICT_CODE')
        ->join('amphures','users.amphures','=','amphures.AMPHUR_ID')
        ->join('provinces','users.provinces','=','provinces.PROVINCE_ID')
        ->select('users.id','users.prefix_name','users.name','users.surname','users.member_type','users.email',
        'users.company','users.address','districts.DISTRICT_NAME as districts','amphures.AMPHUR_NAME as amphures',
        'provinces.PROVINCE_NAME as provinces','users.zipcodes','users.telephone','users.type')
        ->orderBy('users.id', 'asc')
        ->paginate(5);
        // echo json_encode($users);
        // exit();
        // $users = User::paginate(5);
        return View::make('backend/users/index')
            ->with('users',$users);
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
    public function show()
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
//        $users = DB::table('users')->distinct()->get();
        $users = User::findOrFail($id);
        return View::make('backend/users/edit')
            ->with('users',$users);
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
        $users = User::find($id);
        $users->type = Input::get('user_type');
        $users->save();
        return redirect()->action('backend\UsersController@index');
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
        $users = User::find($id);
        $users->delete();
        return redirect()->action('backend\UsersController@index');

    }
}
