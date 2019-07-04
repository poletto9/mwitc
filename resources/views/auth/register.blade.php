@extends('layouts.app')

@section('content')
        <div class="container">
                <div class="card" style="max-width: 500px; margin: auto">
                <div class="card-header bg-dark text-white">ข้อมูลผู้ประสานงาน</div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Full Name</label>

                            <div>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ชื่อ-นามสกุล" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label for="display_name">Display Name</label>

                            <div>
                                <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" placeholder="ชื่อที่แสดง" required>

                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="xxx@xxx.com" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="รหัสความยาวไม่น้อยกว่า 6 ตัวอักษร" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัส" required>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company">Organization Name</label>
                            <div>
                                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" placeholder="ชื่อองค์กร/สถานประกอบการ" required>

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">Address</label>
                            <div>
                                <textarea class="form-control" id="address" name="address" value="{{ old('address') }}" rows="3" placeholder="เลขที่ ถนน ตำบล/แขวง อำเภอ/เขต" required></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                            <label for="province">Province</label>
                            <div>
                                <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="จังหวัด" required>

                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <label for="postcode">Postcode</label>
                            <div>
                                <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode') }}" placeholder="รหัสไปรษณีย์" required>

                                @if ($errors->has('postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone">Phone Number</label>

                            <div>
                                <input id="telephone" type="tel" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="เบอร์โทรศัพท์ที่ติดต่อได้" required>

                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection