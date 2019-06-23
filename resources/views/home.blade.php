@extends('layouts.app')

@section('content')

    <main role="main">

        {{--<section class="jumbotron text-center">--}}
        {{--<div class="container">--}}
        {{--<h1 class="jumbotron-heading">Album example</h1>--}}
        {{--<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>--}}
        {{--<p>--}}
        {{--<a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
        {{--<a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</section>--}}

        {{--<div class="jumbotron">--}}
        {{--<div class="col-sm-8 mx-auto">--}}
        {{--<h1>Navbar examples</h1>--}}
        {{--<p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars extend the width of the viewport, others are confined within a <code>.container</code>. For positioning of navbars, checkout the <a href="../navbar-static/">top</a> and <a href="../navbar-fixed/">fixed top</a> examples.</p>--}}
        {{--<p>At the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.</p>--}}
        {{--<p>--}}
        {{--<a class="btn btn-primary" href="../../components/navbar/" role="button">View navbar docs »</a>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="album bg-light">
            <div class="container">
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">หลักสูตร {{ $course->name  }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#box{{ $course->id  }}">รายละเอียดเพิ่มเติม »</a>
                                            <a href="{{ url('course/register') }}" class="btn btn-sm btn-outline-success @if ( ($course->id != 1) and ($course->id != 6) and ($course->id != 7)) disabled @endif">สมัครอบรม »</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="box{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">หลักสูตร {{ $course->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if( ($course->id != 1) and ($course->id != 6) and ($course->id != 7))
                                            <p class="card-text"><b>หลักสูตรนี้ยังไม่เปิดให้ลงทะเบียน</b></p>
                                        @else
                                            <p class="card-text"><b>วัตถุประสงค์</b><br>{{ $course->desc }}</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:void (0)" class="btn btn-secondary" data-dismiss="modal">ปิด</a>
                                        <a href="{{ url('course/register') }}" class="btn btn-success @if ( ($course->id != 1) and ($course->id != 6) and ($course->id != 7)) disabled @endif">สมัครอบรม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
