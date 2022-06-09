@extends('layouts.app')

@section('content')

    <div class="container">
        <?= link_to('backend/courses/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-success'], $secure = null); ?>
        <hr>
            <div class="card">
                <div class="card-header">แสดงหลักสูตร จำนวนทั้งหมด {{ $courses->total() }} หลักสูตร</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">รหัส</th>
                                <th scope="col">ชื่อหลักสูตร</th>
                                <th scope="col">วัตถุประสงค์</th>
                                <th scope="col">จำนวนรุ่น</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">ส่วนลด</th>
                                <th scope="col">จำนวนขั้นต่ำ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">แก้ไข</th>
                                <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td class="text-center">{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->desc }}</td>
                                <td class="text-center">{{ $course->amount }}</td>
                                <td class="text-center">{{ $course->cost }}</td>
                                <td class="text-center">{{ $course->discount }}</td>
                                <td class="text-center">{{ $course->minimum }}</td>
                                <td class="text-center">
                                    @if( $course->status == 0)
                                        {{ 'ปิด' }}
                                    @else
                                        {{ 'เปิด' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('backend/courses/'.$course->id.'/edit') }}" class="btn btn-warning btn-lg fa fa-edit"></a>
                                </td>
                                <td>
                                    {!! Form::open(array('url'=>'backend/courses/'.$course->id, 'method'=>'delete')) !!}
                                    <button type="submit" class="btn btn-danger btn-lg fa fa-trash"></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    {!! $courses->links() !!}
                </div>
            </div>
    </div>
@endsection
