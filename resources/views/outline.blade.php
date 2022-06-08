@extends('layouts.app')

@section('content')
  <main role="main" class="container">
    <div class="card">
      <div class="card-body">
        @foreach ($outlines as $outline)
        <div id="wrapper">
          <!-- Begin Page Content -->
          <div class="container" style="margin-top:80px">
            <h2 class="ribbon">
              <strong class="ribbon-content">หลักสูตร {{ $outline->name }}</strong>
            </h2>
            <div class="row">
              <!-- เริ่ม column1 -->
              <div class="col-12 col-lg-5">
                <!-- <img src="upload/cimg/2021-07-28-12-23-27.jpg" class="img-fluid" style="margin-top: 0px;border-top-left-radius: 20px;border-top-right-radius: 20px"> -->
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> แนะนำหลักสูตร</div>
                  <div class="card-body">
                    <p>หลักสูตร "การป้องกันและระงับการแพร่เชื้อหรืออันตรายที่เกิดจากมูลฝอยติดเชื้อ” ตามกฎกระทรวงว่าด้วยการกำจัดมูลฝอยติดเชื้อ พ.ศ. 2545 เป็นหลักสูตรสำหรับผู้ปฏิบัติงานมูลฝอยติดเชื้อ ตามกฎกระทรวงว่าด้วยการกำจัดมูลฝอยติดเชื้อ พ.ศ. 2545 ได้กำหนดไว้ในหมวด 2 ข้อ 17(1) หมวด 3 ข้อ 20(2) หมวด 4 ข้อ 24(4) ซึ่งกำหนดให้ผู้ปฏิบัติงานซึ่งมีความรู้เกี่ยวกับมูลฝอยติดเชื้อ โดยต้องผ่านการฝึกอบรมหลักสูตร การป้องกันและระงับการแพร่เชื้อหรืออันตรายที่อาจเกิดจากมูลฝอยติดเชื้อ ตามหลักสูตรและระยะเวลาตามที่กระทรวงสาธารณสุขกำหนดโดยประกาศในราชกิจจานุเบกษา</p>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> ระยะเวลารับสมัคร</div>
                  <div class="card-body">
                    <p>วันที่ 1 มิถุนายน 2565 ถึง 15 กรกฎาคม 2565</p>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> วันที่อบรม</div>
                  <div class="card-body">
                    <p>วันที่ 26 กรกฎาคม 2565</p>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> รูปแบบการอบรม/สถานที่จัดอบรม</div>
                  <div class="card-body">
                    อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> ค่าลงทะเบียนอบรม</div>
                  <div class="card-body">
                    <p>600 บาท ต่อ 1 ท่าน</p>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> ผู้รับผิดชอบหลักสูตร</div>
                  <div class="card-body">
                    <table border="0">
                      <tbody>
                        <tr>
                          <!-- <td>
                            <div style="width:50px:height:50px;overflow:hidden">
                              <a class="highslide" onclick="return hs.expand(this)" href="upload/usersimg/2021_09_21_10_55_48.png">
                                <img src="upload/usersimg/2021_09_21_10_55_48.png" style="width:50px;">
                              </a>
                            </div>
                          </td> -->
                          <td>นางสาวศิริทร ดวงสวัสดิ์</td>
                        </tr>
                        <tr>
                          <!-- <td>
                            <div style="width:50px:height:50px;overflow:hidden">
                              <a class="highslide" onclick="return hs.expand(this)" href="upload/usersimg/2021_06_29_10_00_46.jpg">
                                <img src="upload/usersimg/2021_06_29_10_00_46.jpg" style="width:50px;">
                              </a>
                            </div>
                          </td> -->
                          <td>นางสาวทิพย์วัลย์ ปราบคะเซ็น</td>
                        </tr>
                        <tr>
                          <!-- <td>
                            <div style="width:50px:height:50px;overflow:hidden">
                              <a class="highslide" onclick="return hs.expand(this)" href="upload/usersimg/2021_04_04_14_09_31.jpg">
                                <img src="upload/usersimg/2021_04_04_14_09_31.jpg" style="width:50px;">
                              </a>
                            </div>
                          </td> -->
                          <td>นางสาวเมธ์วดี นามจรัสเรืองศรี</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-header"><i class="fa fa-book"></i> ติดต่อสื่อสาร</div>
                  <div class="card-body">
                    <img src="{{ url('images/S__16474191.jpg') }}" style="max-width:45%;height:auto;">
                  </div>
                </div>
              </div>
              <!-- สิ้นสุด column1 -->

              <!-- เริ่ม column2 -->
              <div class="col-12 col-lg-7" style="padding:10px">
                <ul class="list-group">
                  <li class="list-group-item bg-info text-white">
                    <h2><i class="fa fa-book"></i> แผนการอบรม</h2>
                  </li>
                  <ul class="timeline">
                    <!-- แสดงข้อมูลบทเรียนจากฐานข้อมูล -->
                    <li class="timeline-inverted">
                      <div class="timeline-badge info">1</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>วัตถุประสงค์ของหลักสูตร</b></h5>
                        </div>
                        <div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><blockquote>
                              <p>1.	เพื่อให้ผู้ปฏิบัติงานมูลฝอยติดเชื้อมีความรู้ ความเข้าใจการป้องกันและระงับการแพร่เชื้อหรืออันตรายที่อาจเกิดจากมูลฝอยติดเชื้อ</p>
                              <p>2.	เพื่อให้ผู้ปฏิบัติงานมีทักษะทางการปฏิบัติงานจัดการมูลฝอยติดเชื้อที่ถูกต้องตามมาตรฐานที่กฎหมายกำหนด</p>
                            </blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted">
                      <div class="timeline-badge info">2</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>ทดสอบก่อนเรียน</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote><p>เพื่อทดสอบความความรู้พื้นฐานก่อนอบรม</p></blockquote>
                            </li>

                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote><p>แบบทดสอบ จำนวน 20 ข้อ แบบมี 4 ตัวเลือก เลือกตอบข้อที่ถูกต้องที่สุด</p></blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>ทำแบบทดสอบ จำนวน 20 ข้อ ภายในเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">3</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>มูลฝอยติดเชื้อกับผลกระทบต่อสุขภาพและสิ่งแวดล้อม</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้มีความรู้เบื้องต้นเกี่ยวกับโรคติดต่อและการทำลายเชื้อ</p>
                                <p>2. เพื่อให้รู้ถึงผลกระทบต่อสุขภาพและสิ่งแวดล้อมจากการจัดการมูลฝอยติดเชื้อรวมทั้งสามารถป้องกันอันตรายจากมูลฝอยติดเชื้อ</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. ผลกระทบต่อสุขภาพ</p>
                                <ul>
                                  <li>โรคติดต่อที่เกิดจากมูลฝอยติดเชื้อ</li>
                                  <li>วิธีการทำลายเชื้อ</li>
                                  <li>ความเสี่ยงต่อสุขภาพและอันตรายที่อาจเกิดจากมูลฝอยติดเชื้อ</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>2. ผลกระทบต่อสิ่งแวดล้อม</p>
                                <ul>
                                  <li>มลพิษทางน้ำ ทางอากาศ เสียง หรือฝุ่นละออง</li>
                                </ul>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">4</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>ความรู้พื้นฐานและหลักการทั่วไปเกี่ยวกับการจัดการมูลฝอยติดเชื้อ</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้รู้ถึงแหล่งกำเนิด ชนิดประเภทมูลฝอยติดเชื้อได้</p>
                                <p>2. เพื่อให้รู้ถึงขั้นตอนการจัดการมูลฝอยติดเชื้อได้</p>
                                <p>3. เพื่อให้ทราบถึงกฎกระทรวงว่าด้วยการกำจัดมูลฝอยติดเชื้อ</p>
                                <p>4. เพื่อให้ทราบนโยบายการจัดการมูลฝอยติดเชื้อของหน่วยงาน</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. ประเภทมูลฝอยและการคัดแยกมูลฝอยในสถานบริการการสาธารณสุข</p>
                                <ul>
                                  <li>มูลฝอยทั่วไป</li>
                                  <li>มูลฝอยรีไซเคิล</li>
                                  <li>มูลฝอยอันตราย</li>
                                  <li>มูลฝอยติดเชื้อ</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>2. การจัดการมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>แหล่งกำเนิด ชนิด ประเภทของมูลฝอยติดเชื้อและการคัดแยก</li>
                                  <li>ขั้นตอนการจัดการมูลฝอยติดเชื้อ</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>3. กฎกระทรวงว่าด้วยการกำจัดมูลฝอยติดเชื้อ</p>
                                <p>4. นโยบายการจัดการมูลฝอยติดเชื้อของหน่วยงาน</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">5</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>มาตรการป้องกันอันตรายส่วนบุคคลของผู้ปฏิบัติงาน และการคัดแยกมูลฝอย</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้สามารถป้องกันอันตรายที่อาจเกิดจากมูลฝอยติดเชื้อได้</p>
                                <p>2. เพื่อให้ทราบถึงวิธีการการคัดแยกมูลฝอยแต่ละชนิด</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. มาตรการป้องกันอันตราย</p>
                                <ul>
                                  <li>การป้องกันโรคติดต่อและการอาชีวอนามัยในการทำงาน</li>
                                  <li>การตรวจสุขภาพ ชนิดของโรคที่จำเป็นต้องได้รับการตรวจและความถี่ที่เหมาะสม</li>
                                  <li>การป้องกันอันตรายส่วนบุคคลและการมีพฤติกรรมอนามัยที่ถูกต้อง</li>
                                  <li>สิ่งแวดล้อมที่มีผลกระทบต่อสุขภาพจากการทำงานและการยศาสตร์</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>2. ขั้นตอนการคัดแยกมูลฝอย</p>
                                <p>3. วิธีการคัดแยกมูลฝอย (สาธิต ฝึกปฏิบัติ)</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">6</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>การเก็บรวบรวมและการเคลื่อนย้ายมูลฝอยติดเชื้อ</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้ทราบถึงลักษณะของภาชนะบรรจุและภาชนะรองรับมูลฝอยติดเชื้อที่ถูกหลักสุขาภิบาล</p>
                                <p>2. เพื่อให้สามารถเก็บรวบรวมและเคลื่อนย้ายมูลฝอยติดเชื้อได้อย่างถูกวิธี</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. การเก็บรวบรวมมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>ลักษณะของภาชนะบรรจุและภาชนะรองรับมูลฝอยติดเชื้อ</li>
                                  <li>วิธีการเก็บรวบรวมมูลฝอยติดเชื้ออย่างถูกต้องเหมาะสมตามประเภทและปริมาณ</li>
                                  <li>วิธีการปฏิบัติกรณีมูลฝอยติดเชื้อตกหล่นถุงแตก ถุงรั่ว</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>2. การเคลื่อนย้ายมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>ลักษณะรถเข็น</li>
                                  <li>วิธีการเคลื่อนย้าย การยก การจัดวาง</li>
                                  <li>การเคลื่อนย้ายด้วยรถเข็น เส้นทางการขน และเวลาที่ขน</li>
                                  <li>การทำความสะอาดรถเข็น ภาชนะรองรับและอุปกรณ์</li>
                                  <li>การจัดเก็บรวบรวมมูลฝอยติดเชื้อ ณ ที่พักรวมมูลฝอยติดเชื้อ</li>
                                  <li>การบันทึกข้อมูลปริมาณมูลฝอยติดเชื้อก่อนเก็บเข้าสู่ที่พักรวมมูลฝอยติดเชื้อ</li>
                                  <li>สุขลักษณะอาคารที่พักรวมมูลฝอยติดเชื้อและการทำความสะอาด</li>
                                  <li>การควบคุมแมลงสัตว์นำโรค</li>
                                </ul>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">7</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>หลักปฏิบัติในการขนส่งมูลฝอยติดเชื้อ</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้ทราบถึงหลักเกณฑ์และวิธีการขนส่งมูลฝอยติดเชื้อ</p>
                                <p>2. เพื่อให้สามารถเก็บขนมูลฝอยติดเชื้อได้อย่างถูกวิธี</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. การขับขี่ และเก็บขนมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>ลักษณะของรถขนมูลฝอยติดเชื้อ</li>
                                  <li>วิธีปฏิบัติในการขับขี่และเก็บขนมูลฝอยติดเชื้อ</li>
                                  <li>แผนการจัดเก็บ เส้นทางและระยะเวลาในการเก็บ</li>
                                  <li>การยก จัดวางภาชนะบรรจุมูลฝอยติดเชื้อในยานพาหนะอย่างถูกวิธี เช่น ท่ายก/ข้อห้ามในการยกมูลฝอยติดเชื้อ</li>
                                  <li>กฎหมายและข้อปฏิบัติในการขนส่ง</li>
                                  <li>การปฏิบัติในกรณีมูลฝอยติดเชื้อตกหล่นถุงแตก ถุงรั่ว หรือกรณีประสบอุบัติเหตุ</li>
                                  <li>การทำความสะอาดเครื่องใช้อุปกรณ์และยานพาหนะ</li>
                                </ul>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted"><div class="timeline-badge info">8</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>เทคโนโลยีการกำจัดมูลฝอยติดเชื้อ</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote>
                                <p>1. เพื่อให้ทราบวิธีการกำจัดมูลฝอยติดเชื้อที่ถูกวิธี</p>
                                <p>2. เพื่อให้สามารถนำไปปฏิบัติในโรงพยาบาลอย่างถูกต้อง</p>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote>
                                <p>1. เทคโนโลยีในการกำจัดมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>การเผาในเตาเผา ลักษณะเตาเผา</li>
                                  <li>การทำลายเชื้อด้วยไอน้ำ</li>
                                  <li>การทำลายเชื้อด้วยความร้อน</li>
                                </ul>
                              </blockquote>
                              <blockquote>
                                <p>2. วิธีการปฏิบัติในการกำจัดมูลฝอยติดเชื้อ</p>
                                <ul>
                                  <li>การเคลื่อนย้ายมูลฝอยติดเชื้อจากที่พักมูลฝอยติดเชื้อเพื่อนำไปกำจัดอย่างถูกวิธี</li>
                                  <li>การควบคุมดูแลระบบการกำจัดให้เป็นไปตามข้อกำหนด</li>
                                  <li>การตรวจสอบ บำรุงรักษาเบื้องต้น การทำความสะอาดเครื่องมือและอุปกรณ์</li>
                                </ul>
                              </blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>อบรมณ์ออนไลน์ผ่านระบบ Zoom Meeting เป็นเวลา 1 ชั่วโมง</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted">
                      <div class="timeline-badge info">9</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>ประเมินความพึงพอใจระบบการอบรมออนไลน์</b></h5>
                        </div><div class="timeline-body" style="padding:20px">
                          <ul class="timeline1">
                            <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                              <br>
                              <blockquote><p>เพื่อประเมินความพึงพอใจของผู้เรียนต่อระบบการอบรมออนไลน</p></blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                              <br>
                              <blockquote><p>แบบประเมินความพึงพอใจ</p></blockquote>
                            </li>
                            <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                              <br>
                              <blockquote><p>ทำแบบประเมินความพึงพอใจและแสดงความคิดเห็น</p></blockquote>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="timeline-inverted">
                      <div class="timeline-badge info">10</div>
                      <div class="timeline-panel">
                        <div class="timeline-heading" style="padding:20px">
                          <h5 class="timeline-title"><b>ทดสอบหลังเรียน</b></h5></div>
                          <div class="timeline-body" style="padding:20px">
                            <ul class="timeline1">
                              <li><font style="font-weight:bolder;color:red">วัตถุประสงค์</font>
                                <br>
                                <blockquote><p>เพื่อประเมินความรู้หลังอบรม</p></blockquote>
                              </li>
                              <li><font style="font-weight:bolder;color:red">สาระสำคัญ</font>
                                <br>
                                <blockquote><p>แบบทดสอบ จำนวน 20 ข้อ แบบ 4 ตัวเลือก</p></blockquote>
                              </li>
                              <li><font style="font-weight:bolder;color:red">กิจกรรมการเรียนรู้</font>
                                <br>
                                <blockquote><p>ทำแบบทดสอบ จำนวน 20 ข้อ ภายในเวลา 1 ชั่วโมง</p></blockquote>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li class="timeline-inverted">
                        <div class="timeline-badge info">11</div>
                        <div class="timeline-panel">
                          <div class="timeline-heading" style="padding:20px">
                            <h5 class="timeline-title"><b>การวัดและประเมินผลและการให้ประกาศนียบัตร</b></h5></div>
                            <div class="timeline-body" style="padding:20px">
                              <ul class="timeline1">
                                <li>
                                  <blockquote>
                                    <p>1. ผู้เข้ารับการฝึกอบรมตลอดหลักสูตร ต้องมีจำนวนเวลาเข้าฝึกอบรมไม่น้อยกว่าร้อยละ 80 ของจำนวนเวลาทั้งหมดที่กำหนดในหลักสูตรฝึกอบรม</p>
                                    <p>2.	ผ่านการทดสอบหลังผ่านการอบรม โดยมีผลคะแนนผ่านไม่น้อยกว่า ร้อยละ 70 </p>
                                    <p>3.	ผู้สำเร็จการศึกษาจะได้รับประกาศนียบัตรการเข้าฝึกอบรมหลักสูตรการฝึกอบรมการป้องกันและระงับการแพร่เชื้อหรืออันตรายที่อาจเกิดจากมูลฝอยติดเชื้อผู้เข้ารับการฝึกอบรมตลอดหลักสูตร ต้องมีจำนวนเวลาเข้าฝึกอบรมไม่น้อยกว่าร้อยละ 80 ของจำนวนเวลาทั้งหมดที่กำหนดในหลักสูตรฝึกอบรม</p>
                                  </blockquote>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                    </ul>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </card>
  </main>
@endsection
