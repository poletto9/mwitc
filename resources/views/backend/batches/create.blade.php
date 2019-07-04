@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">เพิ่มข้อมูลกำหนดการ</div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('backend/batches') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('course_id') ? ' has-error' : '' }}">
                        <label for="course_id" class="col-sm-2 col-form-label">ชื่อหลักสูตร</label>
                        <div class="col-md-10">
                            <select class="form-control" id="course_id" name="course_id" required autofocus>
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">กรุณาเลือกหลักสูตร</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('course_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('course_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('batch_name') ? ' has-error' : '' }}">
                        <label for="batch_name" class="col-sm-2 col-form-label">รุ่นที่</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="batch_name" name="batch_name" placeholder="กรอกเฉพาะตัวเลข" value="{{ old('batch_name') }}" required>

                            @if ($errors->has('batch_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('batch_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('deadline') ? ' has-error' : '' }}">
                        <label for="deadline" class="col-sm-2 col-form-label">วันที่หมดเขต</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" id="deadline" name="deadline" placeholder="เลือกวันที่" value="{{ old('deadline') }}" required>

                            @if ($errors->has('deadline'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deadline') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('training_date') ? ' has-error' : '' }}">
                        <label for="training_date" class="col-sm-2 col-form-label">วันที่อบรม</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" id="training_date" name="training_date" placeholder="เลือกวันที่" value="{{ old('training_date') }}" required>

                            @if ($errors->has('training_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('training_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('place') ? ' has-error' : '' }}">
                        <label for="place" class="col-sm-2 col-form-label">สถานที่จัดอบรม</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="place" name="place" placeholder="สถานที่จัดอบรม" value="{{ old('place') }}" required>

                            @if ($errors->has('place'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection