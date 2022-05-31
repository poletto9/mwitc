@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">แสดงข้อมูลลงทะเบียนอบรมหลักสูตร จำนวนทัั้งหมด {{ $enrolls->total() }} รายการ</div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">รหัส</th>
                        <th scope="col">ชื่อหลักสูตร</th>
                        <th scope="col">รุ่นที่</th>
                        <th scope="col">ชื่อผู้ประสาน</th>
                        <th scope="col">ชื่อองค์กร</th>
                        <th scope="col">การสมัคร</th>
                        <th scope="col">ชำระเงิน</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">แก้ไข</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($enrolls as $enroll)
                        <input type="hidden" id="enroll_id" name="enroll_id" value="{{ $enroll->enroll_id }}">

                        <tr class="text-center">
                            <td>{{ $enroll->enroll_id }}</td>
                            <td>{{ $enroll->course_name }}</td>
                            <td>{{ $enroll->batch_name }}</td>
                            <td>{{ $enroll->name }}</td>
                            <td>{{ $enroll->company }}</td>
                            <td>
                                @if($enroll->reg_state == 0)
                                    <span class="fa fa-close text-danger" style="font-size: 1.5em"></span>
                                @else
                                    <span class="fa fa-check text-success" style="font-size: 1.5em"></span>
                                @endif
                            </td>
                            <td>
                                @if($enroll->payment_state == 0)
                                    <span class="fa fa-close text-danger" style="font-size: 1.5em"></span>
                                @else
                                    <span class="fa fa-check text-success" style="font-size: 1.5em"></span>
                                @endif
                            </td>
                            <td>
                                <button class="show_data btn btn-info btn-lg fa fa-eye" id=<?php echo $enroll->enroll_id; ?>></button>
                                <div class="modal fade" id="dataModal" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" id="data">

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ url('backend/enrolls/'.$enroll->enroll_id.'/edit') }}" class="btn btn-warning btn-lg fa fa-edit"></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">No Data!!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    <ul>
                        <li>เครื่องหมาย <span class="fa fa-check text-success" style="font-size: 1.5em"></span> หมายถึง ดำเนินการเรียบร้อย</li>
                        <li>เครื่องหมาย <span class="fa fa-close text-danger" style="font-size: 1.5em"></span> หมายถึง ยังไม่ดำเนินการ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection