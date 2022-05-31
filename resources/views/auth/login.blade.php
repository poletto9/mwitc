@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="card" style="max-width: 500px; margin: auto">
            <div class="card-header bg-dark text-white">ลงชื่อเข้าใช้ระบบ</div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">อีเมล</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">รหัสผ่าน</label>

                        <div>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">

                            <div>
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> จดจำฉัน
                                </label>
                            </div>

                    </div>

                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                เข้าใช้ระบบ
                            </button>

                            <a class="btn btn-link" href="{{ url('forgot_password') }}">
                                ลืมรหัสผ่าน?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
