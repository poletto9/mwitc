@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">ลงทะเบียนหลักสูตรอบรม (กรุณากรอกข้อมูลผู้สมัครให้ครบถ้วน)</div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('course_id') ? ' has-error' : '' }}">
                        <label for="course_id" class="col-sm-3 col-form-label">ชื่อหลักสูตร</label>
                        <div class="col-md-9">
                            <select class="form-control" id="course_id" name="course_id" required autofocus>
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">กรุณาเลือกหลักสูตร</option>
                                @foreach($courses as $course)
                                    @if( $course->status != 0)
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

                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 col-form-label">ชื่อผู้สมัคร</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ-นามสกุลผู้สมัคร" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-sm-3 col-form-label">ชื่อองค์กร</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="company" name="company" placeholder="ชื่อองค์กร/สถานประกอบการ" value="{{ old('company') }}" required>

                            @if ($errors->has('company'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-sm-3 col-form-label">ที่อยู่</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="address" name="address" placeholder="ที่อยู่องค์กร/สถานประกอบการ" value="{{ old('address') }}" rows="3" required></textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('postcode') ? ' has-error' : '' }}">
                        <label for="postcode" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="รหัสไปรษณีย์" value="{{ old('postcode') }}" required>

                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <label for="telephone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="เบอร์โทรศัพท์ เช่น 0000000000" value="{{ old('telephone') }}" required>

                            @if ($errors->has('telephone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-3 col-form-label">อีเมล</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
