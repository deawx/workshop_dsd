<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <?=link_tag('assets/css/bootstrap.min.css');?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  $profile = unserialize($record['profile']);
  $address = unserialize($record['address']);
  $address_current = unserialize($record['address_current']);
  $education = unserialize($record['education']);
  $work = unserialize($record['work']);
  $reference = unserialize($record['reference']);
  ?>
  <body>
<div class="container">
  <div class="row">
    <div class="col-md-12"> <p class="text-right">แบบ คร.10</p> </div>
    <div class="col-xs-10 text-center">
      <p><img src="https://placehold.it/250x250"></p>
      <h3>คำขอหนังสือรับรองความรู้ความสามารถ</h3>
    </div>
    <div class="col-xs-2" style="margin:0 auto;">
      <div class="thumbnail" style="height:250px;width:100%;">
        <div class="caption">
          รูปถ่าย <br>
          1 นิ้ว <br>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <p class="col-md-4 col-md-offset-8">เขียนที่ ............................................................</p>
      <p class="col-md-4 col-md-offset-8">วันที่ ..........<?=date('d');?> เดือน ..........<?=date('m');?> พ.ศ. ..........<?=date('Y')+543;?></p>
      <p>๑.ข้าพเจ้า ..........<?=$profile['title'].nbs().$profile['firstname'];?> นามสกุล ..........<?=$profile['lastname'];?></p>
      <p>เกิดวันที่ ..........<?=date('d',$profile['birthdate']);?> เดือน ..........<?=date('m',$profile['birthdate']);?> พ.ศ. ..........<?=date('Y',$profile['birthdate'])+543;?> อายุ ..........<?=age_calculate($profile['birthdate']);?> ปี สัญชาติ ..........<?=$profile['nationality'];?> หมู่โลหิต ..........<?=$profile['blood'];?> </p>
      <?php $split = str_split($profile['id_card'],1);
      foreach ($split as $key => $value) :
        $split[$key] = '<span style="border:1px solid black;padding:0.1em;">'.$value.'</span>';
      endforeach; ?>
      <p>เลขประจำตัวประชาชน <?=$split[0];?>  <?=$split[1].$split[2].$split[3].$split[4];?>  <?=$split[5].$split[6].$split[7].$split[8].$split[9];?>  <?=$split[10].$split[11];?>  <?=$split[12];?></p>
      <p>ที่อยู่ตามทะเบียนบ้าน เลขที่ ..........<?=$address['address'];?> หมู่ ..........<?=$address['moo'];?> ซอย ..........<?=$address['soi'];?> ถนน ..........<?=$address['street'];?></p>
      <p>แขวง/ตำบล ..........<?=$address['tambon'];?> เขต/อำเภอ ..........<?=$address['amphur'];?></p>
      <p>จังหวัด ..........<?=$address['province'];?> รหัสไปรษณีย์ ..........<?=$address['zip'];?></p>
      <p>โทรศัพท์ ..........<?=$address['phone'];?> โทรสาร ..........<?=$address['fax'];?> อีเมล์ ..........<?=$address['email'];?></p>

      <p>ที่อยู่ตามปัจจุบัน เลขที่ ..........<?=$address_current['address'];?> หมู่ ..........<?=$address_current['moo'];?> ซอย ..........<?=$address_current['soi'];?> ถนน ..........<?=$address_current['street'];?></p>
      <p>แขวง/ตำบล ..........<?=$address_current['tambon'];?> เขต/อำเภอ ..........<?=$address_current['amphur'];?></p>
      <p>จังหวัด ..........<?=$address_current['province'];?> รหัสไปรษณีย์ ..........<?=$address_current['zip'];?></p>
      <p>โทรศัพท์ ..........<?=$address_current['phone'];?> โทรสาร ..........<?=$address_current['fax'];?> อีเมล์ ..........<?=$address_current['email'];?></p>

      <p>๒.วุฒิการศึกษา ..........<?=$education['degree'];?> สาขา ..........<?=$education['branch'];?> สถานศึกษา ..........<?=$education['place'];?></p>
      <p>๓.อาชีพ ..........<?=$work['career'];?> สถานที่ทำงาน ..........<?=$work['place'];?></p>
      <p>๔.มีความประสงค์จะขอรับหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ</p>
      <span class="col-md-12">
        <p>(๑) สาขา <?=$record['career1'];?></p>
        <p>(๒) สาขา <?=$record['career2'];?></p>
        <p>(๓) สาขา <?=$record['career3'];?></p>
        <p>(๔) สาขา <?=$record['career4'];?></p>
        <p>(๕) สาขา <?=$record['career5'];?></p>
      </span>
      <p>๕.เอกสารหลักฐานประกอบการยื่นคำขอ</p>
      <span class="col-md-12">
        <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'picture',set_checkbox('reference[picture]','picture',isset($reference['picture'])));?>(๑)รูปถ่ายหน้าตรง ขนาด ๑ X ๑.๕ นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน ๒ รูป</label> </div> </p>
        <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'copy',set_checkbox('reference[copy]','copy',isset($reference['copy'])));?>(๒)สำเนาบัตรประจำตัวประชาชน</label> </div> </p>
        <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[etc]'),'etc',set_checkbox('reference[etc]','etc',isset($reference['etc'])));?>(๓)เอกสารอื่นๆ (โปรดระบุ)</label> <?=$reference['etc'];?></div> </p>
        <p style="text-indent:1em;">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
      </span>
    </div>
    <div class="col-md-6 col-md-offset-6">
      <br> <br> <p>ลงชื่อ ........................................ ผู้ยื่นคำขอ</p>
      <p>( ............................................................ )</p>
    </div>
  </div>
</div>
<div class="clearfix"> </div> <br> <hr> <br>
<div class="container">
  <div class="row">
    <table class="table table-bordered">
        <tr>
          <td style="width:50%;" class="text-center"> บัตรประจำตัวผู้เข้ารับการประเมิน <br>ศูนย์ประเมินความรู้ความสามารถ </td>
          <td rowspan="2" class="text-center"> <br> <br> <br> ให้ผู้สมัครเก็บบัตรนี้ไว้แสดงหลักฐานเมื่อเข้าประเมิน <br>ถ้าไม่มีบัตรไม่อนุญาตให้เข้าประเมิน </td>
        </tr>
        <tr>
          <td style="width:50%;">
            <div class="col-xs-4">
              <div class="text-center" style="border:1px solid gray;">
                <br> รูปถ่ายขนาด <br> ๑ x ๑.๕ นิ้ว <br> <br>
              </div>
              <br> ........................................
              <br> (ลายมือชื่อผู้สมัคร)
            </div>
            <div class="col-xs-8">
              ชื่อ ..................................................
              <br>สาขาอาชีพ ........................................
              <br>๑.สาขา ........................................
              <br>วันที่ประเมิน ........................................
              <br>๒.สาขา ........................................
              <br>วันที่ประเมิน ........................................
            </div>​
            <div class="col-md-12">
              ผู้รับสมัคร ........................................
              <br>วันที่ .......... เดือน .......... พ.ศ. ..........
            </div>
          </td>
        </tr>
    </table>
  </div>
</div>

    <?=script_tag('assets/js/jquery.min.js');?>
    <?=script_tag('assets/js/bootstrap.min.js');?>
  </body>
</html>