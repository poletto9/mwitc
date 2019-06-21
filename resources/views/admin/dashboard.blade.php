@extends('layouts.app')

@section('content')

    <main role="main">
        <div class="container">
            <div class="card">
                <div class="card-header">ระบบจัดการเว็บไซต์และฐานข้อมูล</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="card-title">ข้อมูลหลักสูตร</div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('back-end/course') }}" class="btn btn-sm btn-outline-success">จัดการข้อมูล »</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="card-title">ข้อมูลหลักสูตร</div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('back-end/course') }}" class="btn btn-sm btn-outline-success">จัดการข้อมูล »</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <div class="card-title">ข้อมูลหลักสูตร</div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('back-end/course') }}" class="btn btn-sm btn-outline-success">จัดการข้อมูล »</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection