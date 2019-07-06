@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">แก้ไขข้อมูลประสาน</div>
            <div class="card-body">
                <?= Form::model($users,array('url'=>'backend/users/'.$users->id,'method'=>'put')); ?>
                {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('user_type') ? ' has-error' : '' }}">
                        <label for="user_type" class="col-sm-2 col-form-label">เลือกประเภทผู้ใช้</label>
                        <div class="col-md-10">
                            <select class="form-control" id="user_type" name="user_type" required autofocus>
                                <option selected="selected" value="{{ $users->type }}">{{ $users->type }}</option>
                                @if($users->type == 'admin')
                                    <option value = "default">default</option>
                                @else
                                    <option value = "admin">admin</option>
                                @endif

                            </select>

                            @if ($errors->has('user_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_type') }}</strong>
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
                <?= Form::close() ?>
            </div>
        </div>
    </div>


@endsection