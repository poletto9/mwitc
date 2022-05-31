@extends('layouts.app')

@section('content')
        <div class="container">
                <div class="card" style="max-width: 500px; margin: auto">
                <div class="card-header bg-dark text-white">ข้อมูลสมาชิก</div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}


                        <div class="form-group {{ $errors->has('member_type') ? ' has-error' : '' }}">
                            <label for="member_type">ประเภทสมาชิก</label>
                            <div>
                              <select class="form-control" name="member_type" id="member_type" required autofocus>
                                <option value="" disabled selected>เลือกประเภทสมาชิก</option>
                                <option value="ผู้ประสานงาน">ผู้ประสานงาน</option>
                                <option value="ผู้เข้าอบรม">ผู้เข้าอบรม</option>
                              </select>
                                <!-- <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="เลือกจังหวัด" required> -->

                                @if ($errors->has('member_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('member_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('prefix_name') ? ' has-error' : '' }}">
                            <label for="prefix_name">คำนำหน้าชื่อ</label>
                            <div>
                              <select class="form-control" name="prefix_name" id="prefix_name" required>
                                <option value="" disabled selected>เลือกคำนำหน้าชื่อ</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                              </select>
                                <!-- <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="เลือกจังหวัด" required> -->

                                @if ($errors->has('prefix_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prefix_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">ชื่อ</label>

                            <div>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ระบุชื่อ" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname">นามสกุล</label>

                            <div>
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" placeholder="ระบุนามสกุล" required>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label for="display_name">Display Name</label>

                            <div>
                                <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" placeholder="ชื่อที่แสดง" required>

                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">อีเมล</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ระบุอีเมลเพื่อใช้สำหรับล๊อกอิน" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">รหัสผ่าน</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="กำหนดรหัสผ่านความยาวไม่น้อยกว่า 6 ตัวอักษร" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">ยืนยันรหัสผ่าน</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" required>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company">ชื่อสถานประกอบการ/หน่วยงาน/องค์กร/บริษัท</label>
                            <div>
                                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" placeholder="ระบุชื่อสถานประกอบการ/หน่วยงาน/องค์กร/บริษัท" required>

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">ที่อยู่/หมู่/อาคาร/ชั้น/ถนน/ซอย</label>
                            <div>
                                <textarea class="form-control" id="address" name="address" value="{{ old('address') }}" rows="3" placeholder="ระบุที่อยู่/หมู่/อาคาร/ชั้น/ถนน/ซอย" required></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('provinces') ? ' has-error' : '' }}">
                            <label for="provinces">จังหวัด</label>
                            <div>
                              <select class="form-control provinces" name="provinces" id="provinces" required>
                                <option value="" disabled selected>เลือกจังหวัด</option>
                                @foreach($provinces as $province)
                                  <option value="{{$province->PROVINCE_ID}}">{{$province->PROVINCE_NAME}}</option>
                                @endforeach

                              </select>
                                <!-- <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="เลือกจังหวัด" required> -->

                                @if ($errors->has('provinces'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinces') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('amphures') ? ' has-error' : '' }}">
                            <label for="amphures">เขต/อำเภอ</label>
                            <div>
                              <select class="form-control amphures" name="amphures" id="amphures" required>
                                <option value="" disabled selected>เลือกเขต/อำเภอ</option>
                              </select>
                                <!-- <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="เลือกจังหวัด" required> -->

                                @if ($errors->has('amphures'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amphures') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('districts') ? ' has-error' : '' }}">
                            <label for="district">แขวง/ตำบล</label>
                            <div>
                              <select class="form-control districts" name="districts" id="districts" required>
                                <option value="" disabled selected>เลือกแขวง/ตำบล</option>
                              </select>
                                <!-- <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" placeholder="เลือกจังหวัด" required> -->

                                @if ($errors->has('districts'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('districts') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('zipcodes') ? ' has-error' : '' }}">
                            <label for="zipcodes">รหัสไปรษณีย์</label>
                            <div class="postcode">
                                <input type="text" class="form-control zipcodes" id="zipcodes" name="zipcodes" value="{{ old('zipcodes') }}" placeholder="รหัสไปรษณีย์">

                                @if ($errors->has('zipcodes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcodes') }}</strong>
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
