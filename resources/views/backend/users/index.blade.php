@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">แสดงข้อมูลประสาน จำนวนทัั้งหมด {{ $users->total() }} คน</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">รหัส</th>
                        <th scope="col">คำนำหน้า</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">ประเภทสมาชิก</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">ชื่อองค์กร</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">แขวง/ตำบล</th>
                        <th scope="col">เขต/อำเภอ</th>
                        <th scope="col">จังหวัด</th>
                        <th scope="col">รหัสไปรษณีย์</th>
                        <th scope="col">เบอร์ติดต่อ</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr class="text-center">
                            <td class="">{{ $user->id }}</td>
                            <td class="">{{ $user->prefix_name }}</td>
                            <td class="">{{ $user->name }}</td>
                            <td class="">{{ $user->surname }}</td>
                            <td class="">{{ $user->member_type }}</td>
                            <td class="">{{ $user->email }}</td>
                            <td class="">{{ $user->company }}</td>
                            <td class="">{{ $user->address }}</td>
                            <td class="">{{ $user->districts }}</td>
                            <td class="">{{ $user->amphures }}</td>
                            <td class="">{{ $user->provinces }}</td>
                            <td class="">{{ $user->zipcodes }}</td>
                            <td class="">{{ $user->telephone }}</td>
                            <td class="">{{ $user->type }}</td>
                            <td class="">
                                <a href="{{ url('backend/users/'.$user->id.'/edit') }}" class="btn btn-warning btn-lg fa fa-edit"></a>
                            </td>
                            <td class="">
                                {!! Form::open(array('url'=>'backend/users/'.$user->id, 'method'=>'delete')) !!}
                                <button type="submit" class="btn btn-danger btn-lg fa fa-trash"></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">No Data!!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <br>
                {!! $users->links() !!}
            </div>
        </div>
    </div>

@endsection
