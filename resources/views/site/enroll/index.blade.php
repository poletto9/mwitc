@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">ลงทะเบียนหลักสูตรอบรม (กรุณากรอกข้อมูลผู้สมัครให้ครบถ้วน)</div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('courses/enroll') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_id" class="col-sm-3 col-form-label">ชื่อหลักสูตร</label>
                        <div class="col-md-9">
                            <select class="form-control" id="course_id" name="course_id" required autofocus>
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">กรุณาเลือกหลักสูตร</option>
                                @foreach($courses as $course)
                                    @if( $course->id != 0)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('course_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-3 col-form-label">ชื่อผู้สมัคร</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="ชื่อ-นามสกุลผู้สมัคร" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-3 col-form-label">ชื่อองค์กร</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="ชื่อองค์กร/สถานประกอบการ" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('desc') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-3 col-form-label">ที่อยู่</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="description" name="description" placeholder="ที่อยู่องค์กร/สถานประกอบการ" value="{{ old('desc') }}" rows="3" required></textarea>

                            @if ($errors->has('desc'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="รหัสไปรษณีย์" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="เบอร์โทรศัพท์ เช่น 0000000000" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-3 col-form-label">อีเมล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="E-mail Address" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="submit" class="col-sm-3 col-form-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
