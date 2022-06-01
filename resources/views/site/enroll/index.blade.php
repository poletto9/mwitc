@extends('layouts.app')

@section('content')

@foreach($batches as $batch)

@endforeach

    <div class="container">
        <div class="card" style="max-width: 700px; margin: auto">
            <div class="card-header">ลงทะเบียนหลักสูตรอบรม (กรุณากรอกข้อมูลผู้สมัครให้ครบถ้วน)</div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/enroll') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('batch_id') ? ' has-error' : '' }}">
                        <label for="batch_id" class="col-sm-3 col-form-label">ชื่อหลักสูตร</label>
                        <div class="col-md-9">
                            <select class="form-control" id="batch_id" name="batch_id" required autofocus>
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">กรุณาเลือกหลักสูตร</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->batch_id }}">{{ $batch->name }} {{ $batch->batch_name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('batch_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('batch_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                    @if(Auth::user()->member_type != "ผู้เข้าอบรม")
                    <div class="form-group border p-3" id="fieldGroup">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">คำนำหน้าชื่อ</label>
                                <select class="form-control" name="prefix_name[]" id="prefix_name" required>
                                  <option value="" disabled selected>เลือกคำนำหน้าชื่อ</option>
                                  <option value="นาย">นาย</option>
                                  <option value="นาง">นาง</option>
                                  <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">ชื่อ</label>
                                <input type="text" name="name[]" class="form-control" placeholder="ระบุชื่อ" required>
                            </div>
                            <div class="col-md-6">
                                <label for="surname" class="col-form-label">นามสกุล</label>
                                <input type="text" name="surname[]" class="form-control" placeholder="ระบุนามสกุล" required>
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="col-form-label">ตำแหน่งงาน</label>
                                <input type="text" name="position[]" class="form-control" placeholder="ตำแหน่งงาน" required>
                            </div>
                        </div>
                        <div class="form-row">
                            @if($batch->batch_type != 'Online')
                            <div class="col-md-6">
                                <label for="food" class="col-form-label">อาหาร</label>
                                <select class="form-control" name="food[]" required>
                                    <option value="" disabled selected>กรุณาเลือกอาหาร</option>
                                    <option value="ทั่วไป">ทั่วไป</option>
                                    <option value="อิสลาม">อิสลาม</option>
                                    <option value="มังสวิรัติ">มังสวิรัติ</option>
                                </select>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <label for="telephone" class="col-form-label">เบอร์ติดต่อ</label>
                                <input type="text" name="telephone[]" class="form-control" placeholder="เบอร์ติดต่อ" required>
                            </div>
                        </div><br>
                        <a id="addMore" href="javascript:void(0)" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
                    </div>
                    @else
                    <div class="form-group border p-3" id="fieldGroup">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">คำนำหน้าชื่อ</label>
                                <select class="form-control" name="prefix_name[]" id="prefix_name" required>
                                  <option value="" disabled>เลือกคำนำหน้าชื่อ</option>
                                  @if(Auth::user()->prefix_name == "นาย")
                                    <option value="นาย" selected>นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                  @elseif(Auth::user()->prefix_name == "นาง")
                                    <option value="นาย">นาย</option>
                                    <option value="นาง" selected>นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                  @else
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว" selected>นางสาว</option>
                                  @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">ชื่อ</label>
                                <input type="text" name="name[]" class="form-control" value="{{ Auth::user()->name }}" placeholder="ระบุชื่อ" required>
                            </div>
                            <div class="col-md-6">
                                <label for="surname" class="col-form-label">นามสกุล</label>
                                <input type="text" name="surname[]" class="form-control" value="{{ Auth::user()->surname }}" placeholder="ระบุนามสกุล" required>
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="col-form-label">ตำแหน่งงาน</label>
                                <input type="text" name="position[]" class="form-control" placeholder="ตำแหน่งงาน" required>
                            </div>
                        </div>
                        <div class="form-row">
                            @if($batch->batch_type != 'Online')
                            <div class="col-md-6">
                                <label for="food" class="col-form-label">อาหาร</label>
                                <select class="form-control" name="food[]" required>
                                    <option value="" disabled selected>กรุณาเลือกอาหาร</option>
                                    <option value="ทั่วไป">ทั่วไป</option>
                                    <option value="อิสลาม">อิสลาม</option>
                                    <option value="มังสวิรัติ">มังสวิรัติ</option>
                                </select>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <label for="telephone" class="col-form-label">เบอร์ติดต่อ</label>
                                <input type="text" name="telephone[]" class="form-control" value="{{ Auth::user()->telephone }}" placeholder="เบอร์ติดต่อ" required>
                            </div>
                        </div><br>
                        <a id="addMore" href="javascript:void(0)" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span> Add</a>
                    </div>
                    @endif

                    <!-- copy of input fields group -->
                    <div class="form-group border p-3" id="fieldGroupCopy" style="display: none;">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">คำนำหน้าชื่อ</label>
                                <select class="form-control" name="prefix_name[]" id="prefix_name">
                                  <option value="" disabled selected>เลือกคำนำหน้าชื่อ</option>
                                  <option value="นาย">นาย</option>
                                  <option value="นาง">นาง</option>
                                  <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">ชื่อ</label>
                                <input type="text" name="name[]" class="form-control" placeholder="ระบุชื่อ">
                            </div>
                            <div class="col-md-6">
                                <label for="surname" class="col-form-label">นามสกุล</label>
                                <input type="text" name="surname[]" class="form-control" placeholder="ระบุนามสกุล">
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="col-form-label">ตำแหน่งงาน</label>
                                <input type="text" name="position[]" class="form-control" placeholder="ตำแหน่งงาน">
                            </div>
                        </div>
                        <div class="form-row">
                          @if($batch->batch_type != 'Online')
                          <div class="col-md-6">
                              <label for="food" class="col-form-label">อาหาร</label>
                              <select class="form-control" name="food[]" required>
                                  <option value="" disabled selected>กรุณาเลือกอาหาร</option>
                                  <option value="ทั่วไป">ทั่วไป</option>
                                  <option value="อิสลาม">อิสลาม</option>
                                  <option value="มังสวิรัติ">มังสวิรัติ</option>
                              </select>
                          </div>
                          @endif
                            <div class="col-md-6">
                                <label for="telephone" class="col-form-label">เบอร์ติดต่อ</label>
                                <input type="text" name="telephone[]" class="form-control" placeholder="เบอร์ติดต่อ">
                            </div>
                        </div><br>
                        <a id="remove" href="javascript:void(0)" class="btn btn-danger"><span class="fa fa-remove" aria-hidden="true"></span> Remove</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">ลงทะเบียน</button>

                </form>
            </div>
        </div>
    </div>
@endsection
