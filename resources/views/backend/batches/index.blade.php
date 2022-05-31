@extends('layouts.app')

@section('content')
<?php
// echo json_encode($batches);
// exit();
?>

    <div class="container">
        <?= link_to('backend/batches/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-success'], $secure = null); ?>
        <hr>
        <div class="card">
            <div class="card-header">แสดงกำหนดการอบรม จำนวนทั้งหมด {{ sizeof($batches) }} รายการ</div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-responsive-md">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">รหัส</th>
                        <th scope="col">ชื่อหลักสูตร</th>
                        <th scope="col">รุ่นที่</th>
                        <th scope="col">วันที่เริ่มต้น</th>
                        <th scope="col">วันที่หมดเขต</th>
                        <th scope="col">วันที่อบรม</th>
                        <th scope="col">รูปแบบอบรม</th>
                        <th scope="col">สถานที่จัดอบรม</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($batches as $batch)
                        <tr>
                            <td class="text-center">{{ $batch->batch_id }}</td>
                            <td>{{$batch->name}}</td>
                            <td class="text-center">{{ $batch->batch_name }}</td>
                            <td class="text-center">{{ formatDateThai($batch->start_reg) }}</td>
                            <td class="text-center">{{ formatDateThai($batch->end_reg) }}</td>
                            <td class="text-center">{{ formatDateThai($batch->training_date) }}</td>
                            <td class="text-center">{{ $batch->batch_type }}</td>
                            <td class="text-center">{{ $batch->place }}</td>
                            <td class="text-center">
                                <a href="{{ url('backend/batches/'.$batch->batch_id.'/edit') }}" class="btn btn-warning btn-lg fa fa-edit"></a>
                            </td>
                            <td class="text-center">
                                {!! Form::open(array('url'=>'backend/batches/'.$batch->batch_id, 'method'=>'delete')) !!}
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
                {!! $batches->links() !!}
            </div>
        </div>
    </div>

@endsection
