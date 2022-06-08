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
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
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
<body class="bg-light" style="padding-top: 7rem;">
    <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark shadow" style="background-image: linear-gradient(to left, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('images/MWI_LOGO.png') }}" height="40" width="auto" class="d-inline-block align-top" alt="">
                &nbsp;{{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmenu" aria-controls="navbarmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse flex-grow-0" id="navbarmenu" style="">
                <ul class="nav navbar-nav mr-auto">
                    @if(Auth::guest())
                        <li class="nav-item active">
                            <a class="nav-link btn btn-dark" href="{{ url('/') }}">ลงชื่อเข้าใช้ระบบ</a>
                        </li>
                        &nbsp;
                        <li class="nav-item active">
                            <a class="nav-link btn btn-dark" href="{{ url('register') }}">สมัครสมาชิก</a>
                        </li>
                        &nbsp;
                        <li class="nav-item active">
                            <a class="nav-link btn btn-dark" href="{{ url('https://drive.google.com/file/d/1Ox-KjASPLQaYXOSZ-rMUpUmyDDDwxwv6/view?usp=sharing') }}" target="_blank">คู่มือใช้งาน</a>
                        </li>
                    @else
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('/') }}">ระบบจัดการข้อมูล</a>
                            </li>
                            &nbsp;
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('report') }}">ระบบรายงาน</a>
                            </li>

                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">คุณ {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_user">
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('https://drive.google.com/file/d/1Ox-KjASPLQaYXOSZ-rMUpUmyDDDwxwv6/view?usp=sharing') }}" target="_blank">คู่มือใช้งาน</a>
                            </li>
                            &nbsp;
                            <li class="nav-item active">
                                <a class="nav-link btn btn-dark" href="{{ url('/') }}">หลักสูตร</a>
                            </li>

                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">คุณ {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_user">
                                    <a class="dropdown-item" href="{{ url('user/edit') }}">แก้ไขข้อมูลส่วนตัว</a>
                                    <a class="dropdown-item" href="{{ url('status') }}">ตรวจสอบสถานะ</a>
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        ออกจากระบบ
                                    </a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
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
    <script src="{{ url('jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('jquery/dist/vendor/popper.min.js') }}"></script>
    <script src="{{ url('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/lity.js') }}"></script>
</body>

<script type="text/javascript">

    $('.provinces').change(function(){
        var province_id = $(this).val();
        // console.log(province_id);
        var _token = $('input[name="_token"]').val();
        // console.log(_token);
        //ส่งค่า province_id ผ่านคำสั่ง Ajax ไปยัง Controller เพื่อ query หาอำเภอ
        $.ajax({
          url:"{{route('dropdown.amphures')}}",
          method:"POST",
          data:{province_id:province_id,_token:_token},
          //ถ้าสำเร็จให้ทำอะไรต่อ
          success:function(result){
            $('.amphures').html(result);
          }
        })
    });

    $('.amphures').change(function(){
        var amphur_id = $(this).val();
        //console.log(amphur_id);
        var _token = $('input[name="_token"]').val();
        //ส่งค่า amphur_id ผ่านคำสั่ง Ajax ไปยัง Controller เพื่อ query หาตำบล
        $.ajax({
          url:"{{route('dropdown.districts')}}",
          method:"POST",
          data:{amphur_id:amphur_id,_token:_token},
          //ถ้าสำเร็จให้ทำอะไรต่อ
          success:function(result){
            $('.districts').html(result);
          }
        })
    });

    $('.districts').change(function(){
        var districts_code = $(this).val();
        //console.log(amphur_id);
        var _token = $('input[name="_token"]').val();
        //ส่งค่า districts_code ผ่านคำสั่ง Ajax ไปยัง Controller เพื่อ query หารหัสไปรษณีย์
        $.ajax({
          url:"{{route('dropdown.zipcodes')}}",
          method:"POST",
          data:{districts_code:districts_code,_token:_token},
          //ถ้าสำเร็จให้ทำอะไรต่อ
          success:function(result){
            $('.postcode').html(result);
          }
        })
    });


</script>

<script>
    {{--Add or Remove Enroll Record--}}
    $(document).ready(function () {

        //add more field group
        $('#addMore').click(function () {
            var fieldHTML = '<div class="form-group border p-3" id="fieldGroup">'+$('#fieldGroupCopy').html()+'</div>';
            $('body').find('#fieldGroup:last').after(fieldHTML);
        });

        //remove fields group
        $('body').on('click','#remove',function () {
            $(this).parent('#fieldGroup').remove();
        });
    });

    {{--Table Toggle--}}
    $(".plusIcon").on("click",function(){
        var obj = $(this);
        if( obj.hasClass("fa-plus") ){
            obj.hide();
            obj.next().show();
            obj.parent().parent().next().show();
        }else{
            obj.hide();
            obj.prev().show();
            obj.parent().parent().next().hide();
        }
    });


    $(document).on('click','.show_data',function()
    {
        var id = $(this).attr('id');

        var url = "../backend/enrolls/"+id+"/detail" ;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method:"post",
            data:{id:id},
                success:function(data)
            {
                $('#data').html(data);
                $('#dataModal').modal("show");
            }
        });
    });
</script>
</html>
