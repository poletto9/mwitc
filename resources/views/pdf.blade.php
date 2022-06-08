@foreach($enroll as $val)
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>ใบลงทะเบียนอบรมหลักสูตร {{ $val->name }}</title>
        <link href="{{ url('fonts/thsarabunnew.css') }}" rel="stylesheet">

    </head>
    <body class="thsarabunnew" style="font-size: 14px" >
        <div style="line-height: 10pt; text-align: center;">
            <div>
                <b>แบบฟอร์มการสมัครเข้าร่วมอบรม</b>
            </div>
            <div>
                <b>หลักสูตร {{ $val->name }}</b>
            </div>
            <div>
                @if($val->batch_name != "")
                  <b>{{ $val->batch_name }} วันที่ {{ formatFullDateThai($val->training_date) }}</b>
                @else
                  <b>วันที่ {{ formatFullDateThai($val->training_date) }}</b>
                @endif
            </div>
            <div>
                <b>{{ $val->place }}</b>
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
                <span style="border-bottom: 1px dotted;">{{ $val->PROVINCE_NAME }}</span>
            </div>
            <div style="text-indent: 88px">
                ชื่อผู้ประสานงาน
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->prefix_name }} {{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                เบอร์โทรศัพท์
                <span style="border-bottom: 1px dotted;">{{ Auth::user()->telephone }}</span>
            </div>
            <div>
                2. ผู้เข้าร่วมประชุม
            </div>
            <?php $index = 0; $normal_f = 0; $halal_f = 0; $veggie_f = 0?>
            @foreach($enroll_detail as $values)
                <?php $index++ ?>
                <div style="text-indent: 115px">
                    2.{{ $index }} ชื่อ
                    <span style="border-bottom: 1px dotted;">{{ $values->prefix_name }} {{ $values->name }}</span>
                    นามสกุล
                    <span style="border-bottom: 1px dotted;">{{ $values->surname }}</span>
                    ตำแหน่ง
                    <span style="border-bottom: 1px dotted;">{{ $values->position }}</span>
                </div>

                @if($val->batch_type == 'Online')
                <div style="text-indent: 139px">
                    เบอร์โทรศัพท์ติดต่อ
                    <span style="border-bottom: 1px dotted;">{{ $values->telephone }}</span>
                </div>
                @else
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
                @endif

            @endforeach

            @if($val->batch_type != 'Online')
            <div>
                สรุปจำนวนอาหารตามประเภท :
                ทั่วไป จำนวน <span style="border-bottom: 1px dotted;">{{ $normal_f }}</span> คน
                อิสลาม จำนวน <span style="border-bottom: 1px dotted;">{{ $halal_f }}</span> คน
                มังสวิรัติ จำนวน <span style="border-bottom: 1px dotted;">{{ $veggie_f }}</span> คน
            </div>
            @endif

            <div>
                3.<b> วิธีการชำระเงิน </b>ชำระเงินค่าลงทะเบียนท่านละ <span style="border-bottom: 1px dotted;">{{ $val->cost }}</span> บาท
                จำนวน <span style="border-bottom: 1px dotted;">{{ count($enroll_detail)  }}</span> คน
                รวมเป็นเงิน <span style="border-bottom: 1px dotted;">{{ $val->cost*count($enroll_detail) }}</span> บาท
            </div>
            <div style="text-indent: 115px !important;">
                <div>
                    โดยโอนเงินเข้าบัญชีกระแสรายวัน ธนาคารกรุงไทย สาขาสะพานใหม่
                </div>
                <div>
                    ชื่อบัญชี "เงินนอกงบประมาณ สถาบันพัฒนาสุขภาวะเขตเมือง" หมายเลขบัญชี 065-6-11669-2
                </div>
            </div>
            <div>
                <b>โปรดแนบหลักฐานการชำระเงินค่าลงทะเบียนอบรมส่งที่อีเมล </b><a href="mailto:hrdsince2017@gmail.com " style="color:black;">hrdsince2017@gmail.com </a>
            </div>
            <div>
                <div>
                    พร้อมระบุหัวข้อ <u>“หลักฐานการชำระเงินอบรม”</u>
                </div>
                <div>
                    ระบุข้อความ <u>“หลักฐานชำระเงินอบรม หลักสูตร ........ รุ่นที่ (ถ้าหากมี) ........ บริษัท........และเบอร์โทรติดต่อกลับ”</u>
                </div>
                <div>
                  และโทรแจ้งการโอนเงินที่ กลุ่มงานพัฒนาองค์กรและขับเคลื่อนกำลังคน โทรศัพท์ 02-521-6550 ต่อ 303
                </div>
            </div>
            <div>
                <b>ติดต่อสอบถามรายละเอียด</b>
            </div>
            <div style="text-indent: 115px">
                1.รายละเอียดเนื้อหาหลักสูตรรายวิชา
            </div>
            <div style="text-indent: 115px">
                กลุ่มงานอนามัยสิ่งแวดล้อม โทรศัพท์ 02-521-6550-2, 02-521-6554 ต่อ 313
            </div>
            <div style="text-indent: 115px">
                2.สถานะการชำระเงินและการยืนยันผู้เข้าอบรม
            </div>
            <div style="text-indent: 115px">
                กลุ่มงานพัฒนาองค์กรและขับเคลื่อนกำลังคน โทรศัพท์ 02-521-6550-2, 02-521-6554 ต่อ 302,303
            </div>

            @if($val->batch_type != 'Online')
            <div style="text-indent: 115px">
                <b>ผู้เข้าร่วมประชุมกรุณานำหลักฐานการลงทะเบียนมาในการประชุมด้วย </b>โปรดตรวจสอบรายซื่อได้ที่
            </div>
            <div>
                เว็บไซต์ของสถาบันพัฒนาสุขภาวะเขตเมือง <a href="http://mwi.anamai.moph.go.th" target="_blank">http://mwi.anamai.moph.go.th</a> <u>ก่อนวันประชุม 1 สัปดาห์</u>
            </div>
            @endif

            <div>
                <b>หมดเขตรับสมัคร </b>วันที่ {{ formatFullDateThai($val->end_reg) }}
            </div>
            <div>
                <b><u>หมายเหตุ</u></b> :
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; การลงทะเบียนจะสมบูรณ์ต่อเมื่อชำระค่าลงทะเบียนเรียบร้อยแล้ว
            </div>
            <div style="text-indent: 170px !important;">
                <div>
                    กรุณาสมัครเข้าร่วมอบรมล่วงหน้า เพื่อการเตรียมเอกสารและข้อมูลประกอบการอบรมให้ท่าน
                </div>
            </div>
            <div style="text-indent: 170px !important;">
                <div>
                    ขอสงวนสิทธิ์งดรับผู้สมัครอบรมหน้างาน
                </div>
            </div>
        </div>


    </body>
</html>
@endforeach
