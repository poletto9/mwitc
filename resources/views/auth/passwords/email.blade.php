@extends('layouts.app')

<!-- Main Content -->
@section('content')
        <div class="container">
            <div class="card" style="margin: auto; max-width: 500px">
                <div class="card-header bg-dark text-white">ระบุอีเมลที่ท่านลงทะเบียน</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('password_reset') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">อีเมล</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    ตกลง
                                </button>
                                <button type="submit" class="btn btn-danger" onClick="window.location='http://localhost/course/public';">
                                    ยกเลิก
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
