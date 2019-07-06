<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ url('images/favicon.ico') }}">

    <!-- Bootstrap 4.3.1 CSS -->
    <link rel="stylesheet" href="{{ url('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ระบบลงทะเบียนหลักสูตรฝึกอบรม สถาบันพัฒนาสุขภาวะเขตเมือง</title>

    <!-- Custom styles for this template -->
    <link href="{{ url('css/album.css') }}" rel="stylesheet">
    <link href="{{ url('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ url('css/lity.css') }}" rel="stylesheet">
    <link href="{{ url('css/paginate.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="bg-light" style="padding-top: 5.5rem;">
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('images/MWI_White_LOGO.png') }}" height="30" class="d-inline-block align-top" alt="">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmenu" aria-controls="navbarmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse flex-grow-0" id="navbarmenu" style="">
                <ul class="nav navbar-nav mr-auto">
                    @if(Auth::guest())
                        <li class="nav-item active">
                            <a class="nav-link btn btn-dark" href="{{ url('/') }}">ลงชื่อเข้าใช้</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link btn btn-dark" href="{{ url('register') }}">สมัครสมาชิก</a>
                        </li>
                    @else
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('/') }}">ระบบจัดการข้อมูล</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('/report') }}">ระบบรายงาน</a>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('/') }}">หลักสูตร</a>
                            </li>
                        @endif
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->display_name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_user">
                            <a class="dropdown-item" href="#">แก้ไขข้อมูลส่วนตัว</a>
                            <a class="dropdown-item" href="#">ตรวจสอบสถานะ</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                ออกจากระบบ
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
                {{--<form class="form-inline my-2 my-lg-0">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                {{--</form>--}}
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="text-muted text-center small">
        <p class="mb-1">© 2019 สถาบันพัฒนาสุขภาวะเขตเมือง กรมอนามัย กระทรวงสาธารณสุข</p>
        <p class="mb-1">เลขที่ 18 ถนนพหลโยธิน แขวงอนุสาวรีย์ เขตบางเขน กรุงเทพมหานคร 10220</p>
        <p class="mb-1">โทร 02-521-6550-2, 02-521-6554 โทรสาร 02-521-0226, 02-986-1133</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ url('jquery/dist/vendor/popper.min.js') }}"></script>
    <script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/lity.js') }}"></script>
</body>
</html>
