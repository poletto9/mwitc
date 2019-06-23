@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">แก้ไขข้อมูลหลักสูตร</div>
            <div class="card-body">
                <?= Form::model($course,array('url'=>'backend/courses/'.$course->id,'method'=>'put')); ?>
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="course_name" class="col-sm-2 col-form-label">ชื่อหลักสูตร</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="course_name" name="course_name" placeholder="ชื่อหลักสูตร" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('desc') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-2 col-form-label">วัตถุประสงค์</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" placeholder="วัตถุประสงค์" value="{{ old('desc') }}" rows="5" required></textarea>

                            @if ($errors->has('desc'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
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
            </div>
        </div>
    </div>
@endsection