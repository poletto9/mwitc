@foreach($enroll as $val)
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>ใบลงทะเบียนอบรมเลขที่ {{ $val->enroll_id }}</title>
        <link href="{{ url('fonts/thsarabunnew.css') }}" rel="stylesheet">

    </head>
    <body class="thsarabunnew" style="font-size: 14px" >
        <div style="line-height: 10pt; text-align: center;">
            <div>
                <b>แบบฟอร์มการสมัครเข้าร่วมอบรม</b>
            </div>
            <div>
                <b>หลักสูตร "{{ $val->name }}"</b>
            </div>
            <div>
                <b>รุ่นที่ {{ $val->batch_name }} วันที่ {{ formatFullDateThai($val->training_date) }}</b>
            </div>
            <div>
                <b>ณ {{ $val->place }}</b>
            </div>
        </div>
        <br>
        <div style="line-height: 10pt;text-indent: 35px">
            <div>
                <b>ข้อมูลการลงทะเบียน</b>
            </div>
            <div>
                1. สถานที่ปฏิบัติงาน
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->company }}</span>
                จังหวัด
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->province }}</span>
            </div>
            <div style="text-indent: 88px">
                ชื่อผู้ประสาน
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->name }}</span>
                เบอร์โทรศัพท์ติดต่อ
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->telephone }}</span>
            </div>
            <div>
                2. ผู้เข้าร่วมประชุม
            </div>
            <?php $index = 0; $normal_f = 0; $halal_f = 0; $veggie_f = 0?>
            @foreach($enroll_detail as $values)
                <?php $index++ ?>
                <div style="text-indent: 115px">
                    2.{{ $index }} ชื่อ-นามสกุล
                    <span style="border-bottom: 1px dotted;">{{ $values->name }}</span>
                    ตำแหน่ง
                    <span style="border-bottom: 1px dotted;">{{ $values->position }}</span>
                </div>
                <div style="text-indent: 139px">
                    อาหาร
                    <span style="border-bottom: 1px dotted;">{{ $values->food }}</span>
                    @if ($values->food == "ทั่วไป")
                        <?php $normal_f++; ?>
                    @elseif($values->food == "อิสลาม")
                        <?php $halal_f++; ?>
                    @else
                        <?php $veggie_f++; ?>
                    @endif
                    เบอร์โทรศัพท์ติดต่อ
                    <span style="border-bottom: 1px dotted;">{{ $values->telephone }}</span>
                </div>
            @endforeach
            <div>
                สรุปจำนวนอาหารตามประเภท :
                ทั่วไป จำนวน <span style="border-bottom: 1px dotted;">{{ $normal_f }}</span> คน
                อิสลาม จำนวน <span style="border-bottom: 1px dotted;">{{ $halal_f }}</span> คน
                มังสวิรัติ จำนวน <span style="border-bottom: 1px dotted;">{{ $veggie_f }}</span> คน
            </div>
            <div>
                3.<b> วิธีการชำระเงิน </b>ชำระเงินค่าลงทะเบียนท่านละ <span style="border-bottom: 1px dotted;">{{ $val->cost }}</span> บาท
                จำนวน <span style="border-bottom: 1px dotted;">{{ count($enroll_detail)  }}</span> คน
                รวมเป็นเงิน <span style="border-bottom: 1px dotted;">{{ $val->cost*count($enroll_detail) }}</span> บาท
            </div>
            <div style="text-indent: 170px !important;">
                <div>
                    โดยโอนเงินเข้าบัญชีกระแสรายวัน ธนาคารกรุงไทย สาขาสะพานใหม่
                </div>
                <div>
                    ซื่อ เงินนอกงบประมาณ สถาบันพัฒนาสุขภาวะเขตเมือง หมายเลขที่ 065-6-11669-2
                </div>
            </div>
            <div>
                <b>โปรดส่งหลักฐานการชำระเงินค่าลงทะเบียนเข้าร่วมประชุมไปยังอีเมล </b><a href="mailto:hrdsince2017@gmail.com ">hrdsince2017@gmail.com </a>
            </div>
            <div style="text-indent: 170px !important;">
                <div>
                    พร้อมระบุหัวข้อ “หลักฐานชำระเงิน”
                </div>
                <div>
                    และระบุข้อความ “หลักฐานชำระเงิน หลักสูตร .......... รุ่นที่ ....... บริษัท...........................”
                </div>
            </div>
            <div>
                <b>ติดต่อสอบถามรายละเอียดได้ที่ </b>สถาบันพัฒนารสุขภาวะเขตเมือง กลุ่มงานพัฒนาองค์กรและขับเคลื่อนกำลังคน
            </div>
            <div style="text-indent: 255px !important;">
                <div>
                    โทรศัพท์ 02-521-6550-2, 02-521-6554 ต่อ 302 , 303
                </div>
            </div>
            <div style="text-indent: 115px">
                <b>ผู้เข้าร่วมประชุมกรุณานำหลักฐานการลงทะเบียนมาในการประชุมด้วย </b>โปรดตรวจสอบรายซื่อได้ที่
            </div>
            <div>
                เว็บไซต์ของสถาบันพัฒนาสุขภาวะเขตเมือง <a href="http://mwi.anamai.moph.go.th" target="_blank">http://mwi.anamai.moph.go.th</a> <u>ก่อนวันประชุม 1 สัปดาห์</u>
            </div>
            <div>
                <b>หมดเขตรับสมัคร รุ่นที่ {{$val->batch_name}} </b>ภายในวันที่ {{ formatFullDateThai($val->deadline) }}
            </div>
            <div>
                <b><u>หมายเหตุ</u></b> :
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; การลงทะเบียนจะสมบูรณ์ต่อเมื่อชำระค่าลงทะเบียนเรียบร้อยแล้ว
            </div>
            <div style="text-indent: 170px !important;">
                <div>
                    กรุณาสมัครเข้าร่วมอบรมล่วงหน้า ไม่รับสมัครหน้างาน
                </div>
            </div>
        </div>


    </body>
</html>
@endforeach