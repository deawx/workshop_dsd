<div class="form-group">
  <?php echo form_label('ระดับการศึกษาสูงสุด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $e = array(''=>'เลือกรายการ',
      'ประถมศึกษา'=>'ประถมศึกษา',
      'ม.3'=>'ม.3',
      'ม.6'=>'ม.6',
      'ปก.ศ.ต้น'=>'ปก.ศ.ต้น',
      'ปก.ศ.สูง/อนุปริญญา'=>'ปก.ศ.สูง/อนุปริญญา',
      'ปวช.'=>'ปวช.',
      'ปวท.'=>'ปวท.',
      'ปวส.'=>'ปวส.',
      'ปริญญาตรี'=>'ปริญญาตรี',
      'ปริญญาโท'=>'ปริญญาโท',
      'ปริญญาเอก'=>'ปริญญาเอก');
    echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control'),$e,set_value('education[degree]'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สาขาวิชา','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?php echo form_input(array('name'=>'education[branch]','class'=>'form-control'),set_value('education[branch]'));?> </div>
</div>
<div class="form-group">
  <?php echo form_label('สถานศึกษา','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?php echo form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]'));?> </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?php echo form_input(array('name'=>'education[province]','class'=>'form-control'),set_value('education[province]'));?> </div>
</div>
<div class="form-group">
  <?php echo form_label('ปี พ.ศ.ที่สำเร็จ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $y = array(''=>'ปี');
    foreach (range((date('Y')+543),'2520') as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'education[year]','class'=>'form-control'),$y,set_value('education[year]'));?>
  </div>
</div>
<hr>
<div class="form-group">
  <?php echo form_label('ข้อมูลการทำงานในปัจจุบัน','work_status',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $ws = array(''=>'เลือกรายการ','ผู้มีงานทำ'=>'ผู้มีงานทำ','ผู้ไม่มีงานทำ'=>'ผู้ไม่มีงานทำ');
    echo form_dropdown(array('name'=>'work_status','class'=>'form-control','id'=>'work_status'),$ws,set_value('work_status'));?>
  </div>
</div>

<div class="form-group">
  <?php echo form_label('สถานภาพ(ผู้ไม่มีงานทำ)','work_no',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $wn = array(
      'อยู่ระหว่างหางาน'=>'อยู่ระหว่างหางาน','นักเรียน/นักศึกษา'=>'นักเรียน/นักศึกษา',
      'ทหารก่อนปลดประจำการ'=>'ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ'=>'ผู้อยู่ในสถานพินิจ',
      'ผู้ต้องขัง'=>'ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง'=>'ผู้ประกันตนที่ถูกเลิกจ้าง');
      echo form_dropdown(array('name'=>'work_no','class'=>'form-control','id'=>'work_no'),$wn,set_value('work_no'));?>
      <p class="help-block">*ให้เลือกกรณีเป็นผู้ไม่มีงานทำ</p>
    </div>
  </div>

<div id="work_yes">
  <div class="form-group">
    <?php echo form_label('สถานภาพ(ผู้มีงานทำ)','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $w = array(''=>'เลือกรายการ',
        'ทำงานภาครัฐ'=>'ทำงานภาครัฐ',
        'ทำงานภาคเอกชน'=>'ทำงานภาคเอกชน',
        'ทำงานรัฐวิสาหกิจ'=>'ทำงานรัฐวิสาหกิจ',
        'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ'=>'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ',
        'ช่วยธุรกิจครัวเรือน'=>'ช่วยธุรกิจครัวเรือน');
      echo form_dropdown(array('name'=>'work_yes[category]','class'=>'form-control','id'=>'work_category'),$w,set_value('work_yes[category]'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ประเภทงาน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $c = array(''=>'เลือกรายการ');
      echo form_dropdown(array('name'=>'work_yes[type]','class'=>'form-control','id'=>'work_type'),$c,set_value('work_yes[type]'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ประเภทอุตสาหกรรม','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $g = array(
        'ยานยนต์และชิ้นส่วน'=>'ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า'=>'เหล็กและเหล็กกล้า',
        'เฟอร์นิเจอร์'=>'เฟอร์นิเจอร์','อาหาร'=>'อาหาร','ซอฟต์แวร์'=>'ซอฟต์แวร์',
        'ปิโตรเคมี'=>'ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์'=>'ไฟฟ้าและอิเล็กทรอนิกส์',
        'สิ่งทอและแฟชั่น'=>'สิ่งทอและแฟชั่น','เซรามิกส์'=>'เซรามิกส์','แม่พิมพ์'=>'แม่พิมพ์',
        'ก่อสร้าง'=>'ก่อสร้าง','โลจิสติกส์'=>'โลจิสติกส์','ท่องเที่ยวและบริการ'=>'ท่องเที่ยวและบริการ',
        'ผลิตภัณฑ์ยาง'=>'ผลิตภัณฑ์ยาง');
        echo form_dropdown(array('name'=>'work_yes[group]','class'=>'form-control','id'=>'work_group'),$g,set_value('work_yes[group]'));?>
        <p class="help-block">*ให้เลือกกรณีไม่ได้ทำงานภาครัฐ</p>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ประเภทการจ้าง','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wi = array(''=>'เลือกรายการ',
        'รายเดือน'=>'รายเดือน','รายสัปดาห์'=>'รายสัปดาห์',
        'รายวัน'=>'รายวัน','รายชั่วโมง'=>'รายชั่วโมง',
        'งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
      echo form_dropdown(array('name'=>'work_yes[income]','class'=>'form-control'),$wi,set_value('work_yes[income]'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('รายได้เฉลี่ยต่อเดือน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wia = array(''=>'เลือกรายการ',
        '1-5,000 บาท'=>'1-5,000 บาท',
        '5,001-9,000 บาท'=>'5,001-9,000 บาท',
        '9,001-15,000 บาท'=>'9,001-15,000 บาท',
        '15,001-20,000 บาท'=>'15,001-20,000 บาท',
        '20,001-30,000 บาท'=>'20,001-30,000 บาท',
        '30,001-40,000 บาท'=>'30,001-40,000 บาท',
        '40,001 บาทขึ้นไป'=>'40,001 บาทขึ้นไป');
      echo form_dropdown(array('name'=>'work_yes[income_amount]','class'=>'form-control'),$wia,set_value('work_yes[income_amount]'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ตำแหน่ง/อาชีพ','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[position]','class'=>'form-control'),set_value('work_yes[position]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('อายุงาน(ปี)','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[age]','class'=>'form-control'),set_value('work_yes[age]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ชื่อสถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[place]','class'=>'form-control'),set_value('work_yes[place]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[street]','class'=>'form-control'),set_value('work_yes[street]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[tambon]','class'=>'form-control'),set_value('work_yes[tambon]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[amphur]','class'=>'form-control'),set_value('work_yes[amphur]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[province]','class'=>'form-control'),set_value('work_yes[province]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php echo form_input(array('name'=>'work_yes[zip]','class'=>'form-control zip'),set_value('work_yes[zip]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[phone]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[phone]'));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[fax]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[fax]'));?> </div>
  </div>
  <div class="form-group">
    <?php echo form_label('จำนวนลูกจ้างทั้งหมด','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $e = array(''=>'เลือกรายการ','1-100 คน'=>'1-100 คน','101-200 คน'=>'101-200 คน','201-300 คน'=>'201-300 คน','301 คนขึ้นไป'=>'301 คนขึ้นไป');
      echo form_dropdown(array('name'=>'work_yes[employee_amount]','class'=>'form-control'),$e,set_value('work_yes[employee_amount]'));?>
    </div>
  </div>
</div>
