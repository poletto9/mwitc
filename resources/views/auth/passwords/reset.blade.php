@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card" style="margin: auto; max-width: 500px">
      <div class="card-header bg-dark text-white">รีเซ็ตรหัสผ่าน</div>
      {{ csrf_field() }}
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('reset_complete') }}">
          {{ csrf_field() }}

          @foreach ($users as $row)
            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $row->id }}">
          @endforeach

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">กำหนดรหัสผ่านใหม่</label>
            <div>
              <input id="password" type="password" class="form-control" name="password" autofocus required>
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm">ยืนยันรหัสผ่าน</label>
            <div>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <div>
              <button type="submit" class="btn btn-primary">
                รีเซ็ตรหัสผ่าน
              </button>
              <button type="cancel" class="btn btn-danger" onClick="window.location='http://localhost/course/public';">
                  ยกเลิก
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
