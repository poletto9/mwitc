@extends('layouts.app')

@section('content')

        {{--{{ json_encode($courses) }}--}}
        {{--{{ exit() }}--}}

    <div class="container">
        <?= link_to('backend/courses/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null); ?>
        <hr>
            <div class="card">
                <div class="card-header">แสดงหลักสูตร จำนวนทั้งหมด {{ $courses->total() }} หลักสูตร</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr class="text-center">
                            <th>รหัส</th>
                            <th>ชื่อหลักสูตร</th>
                            <th>วัตถุประสงค์</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->desc }}</td>
                                <td>
                                    <a href="{{ url('backend/courses/'.$course->id.'/edit') }}" class="btn btn-warning">แก้ไข</a>
                                </td>
                                <td>
                                    {!! Form::open(array('url'=>'backend/courses/'.$course->id, 'method'=>'delete')) !!}
                                    <button type="submit" class="btn btn-danger">
                                        ลบ
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    {!! $courses->render() !!}
                </div>
            </div>
    </div>
@endsection