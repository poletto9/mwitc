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
                            <input type="text" class="form-control" id="batch_name" name="batch_name" placeholder="กรอกเฉพาะตัวเลข" value="{{ old('batch_name') }}">

                            @if ($errors->has('batch_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('batch_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('start_reg') ? ' has-error' : '' }}">
                        <label for="start_reg" class="col-sm-2 col-form-label">วันที่เริ่มต้น</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" id="start_reg" name="start_reg" placeholder="เลือกวันที่" value="{{ old('start_reg') }}" required>

                            @if ($errors->has('start_reg'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_reg') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('end_reg') ? ' has-error' : '' }}">
                        <label for="end_reg" class="col-sm-2 col-form-label">วันที่หมดเขต</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" id="end_reg" name="end_reg" placeholder="เลือกวันที่" value="{{ old('end_reg') }}" required>

                            @if ($errors->has('end_reg'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('end_reg') }}</strong>
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

                    <div class="form-group row {{ $errors->has('batch_type') ? ' has-error' : '' }}">
                        <label for="batch_type" class="col-sm-2 col-form-label">รูปแบบอบรม</label>
                        <div class="col-md-10">
                            <select class="form-control" id="batch_type" name="batch_type" required>
                                <option value="" selected disabled>เลือกรูปแบบอบรม</option>
                                <option value="Online">Online</option>
                                <option value="On-site">On-site</option>
                            </select>

                            @if ($errors->has('batch_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('batch_type') }}</strong>
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
