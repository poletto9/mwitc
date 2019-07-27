@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row text-center">
            <div class="col"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">ชื่อ-นามสกุล ผู้ประสาน</div>
                    <div class="card">
                        <div class="card-body">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">บริษัท</div>
                    <div class="card">
                        <div class="card-body">
                            {{ Auth::user()->company }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">แสดงข้อมูลการลงทะเบียนหลักสูตรอบรม จำนวนทั้งหมด {{ $enrolls->total() }} หลักสูตร</div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">รหัสลงทะเบียน</th>
                        <th scope="col">ชื่อหลักสูตร</th>
                        <th scope="col">รุ่นที่</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">การสมัคร</th>
                        <th scope="col">ชำระเงิน</th>
                        <th scope="col">วันที่อบรม</th>
                        <th scope="col">ใบลงทะเบียน</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($enrolls as $enroll)
                        <tr class="text-center">
                            <td>{{ $enroll->enroll_id }}</td>
                            <td>{{ $enroll->name }}</td>
                            <td>{{ $enroll->batch_name }}</td>
                            <td>{{ $enroll->cost }}</td>
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
                            <td>{{ formatDateThai($enroll->training_date) }}</td>
                            <td>
                                {{--@if($enroll->reg_state == 0)--}}
                                    {{--<button type="submit" class="btn btn-success btn-lg fa fa-print" disabled></button>--}}
                                {{--@else--}}
                                    <a href="{{ url('pdfreport/'.$enroll->enroll_id.'/print') }}" class="btn btn-success btn-lg fa fa-print" target="_blank"></a>

                                {{--@endif--}}
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
                <div>
                    <span class="text-danger font-weight-bold">หมายเหตุ</span>
                </div>
                <div>
                    <ul>
                        <li>เครื่องหมาย <span class="fa fa-check text-success" style="font-size: 1.5em"></span> หมายถึง ดำเนินการเรียบร้อย</li>
                        <li>เครื่องหมาย <span class="fa fa-close text-danger" style="font-size: 1.5em"></span> หมายถึง ยังไม่ดำเนินการ</li>
                    </ul>
                </div>
                {!! $enrolls->links() !!}
            </div>
        </div>
    </div>

@endsection