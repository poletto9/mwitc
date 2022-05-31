@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">แก้ไขข้อมูลลงทะเบียนอบรมหลักสูตร</div>
            <div class="card-body">
                @foreach($enroll as $val)
                    <?= Form::model($val,array('url'=>'backend/enrolls/'.$val->enroll_id,'method'=>'put')); ?>
                    {{ csrf_field() }}

                        <input type="hidden" id="batch_id" name="batch_id" value="{{ $val->batch_id }}">
                        <input type="hidden" id="user_id" name="user_id" value="{{ $val->user_id }}">


                        <div class="form-group row {{ $errors->has('course_name') ? ' has-error' : '' }}">
                            <label for="course_name" class="col-sm-2 col-form-label">ชื่อหลักสูตร</label>
                            <div class="col-md-10">
                                <input disabled type="text" class="form-control" id="course_name" name="course_name" value="{{ $val->course_name }}">
                                @if ($errors->has('course_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('batch_name') ? ' has-error' : '' }}">
                            <label for="batch_name" class="col-sm-2 col-form-label">รุ่นที่</label>
                            <div class="col-md-10">
                                <input disabled type="text" class="form-control" id="batch_name" name="batch_name" value="{{ $val->batch_name }}">
                                @if ($errors->has('batch_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 col-form-label">ชื่อผู้ประสาน</label>
                            <div class="col-md-10">
                            <input disabled type="text" class="form-control" id="name" name="name" value="{{ $val->name }}">
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-sm-2 col-form-label">ชื่อองค์กร</label>
                            <div class="col-md-10">
                                <input disabled type="text" class="form-control" id="company" name="company" value="{{ $val->company }}">
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('reg_state') ? ' has-error' : '' }}">
                            <label for="reg_state" class="col-sm-2 col-form-label">สถานะการสมัคร</label>
                            <div class="col-md-10">
                                <select class="form-control" id="reg_state" name="reg_state" required autofocus>
                                    <option selected="selected"
                                        @if($val->reg_state == 0)
                                            value="{{ $val->reg_state }}">ยังไม่ดำเนินการ</option>
                                            <option value = "1">ดำเนินการเรียบร้อย</option>
                                        @else
                                            value="{{ $val->reg_state }}">ดำเนินการเรียบร้อย</option>
                                            <option value = "0">ยังไม่ดำเนินการ</option>
                                        @endif
                                </select>

                                @if ($errors->has('reg_state'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('reg_state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('payment_state') ? ' has-error' : '' }}">
                            <label for="payment_state" class="col-sm-2 col-form-label">สถานะการสมัคร</label>
                            <div class="col-md-10">
                                <select class="form-control" id="payment_state" name="payment_state" required>
                                    <option selected="selected"
                                        @if($val->payment_state == 0)
                                            value="{{ $val->payment_state }}">ยังไม่ดำเนินการ</option>
                                            <option value = "1">ดำเนินการเรียบร้อย</option>
                                        @else
                                            value="{{ $val->payment_state }}">ดำเนินการเรียบร้อย</option>
                                            <option value = "0">ยังไม่ดำเนินการ</option>
                                        @endif
                                </select>

                                @if ($errors->has('payment_state'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('payment_state') }}</strong>
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

                    <? Form::close() ?>
                @endforeach
            </div>
        </div>
    </div>

@endsection