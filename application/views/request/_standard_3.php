<div class="form-group">
  <?php echo form_label('ระดับการศึกษาสูงสุด','education_degree',array('class'=>'control-label col-md-4'));?>
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
    echo form_dropdown(array('name'=>'education_degree','class'=>'form-control'),$e,set_value('education_degree'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สาขาวิชา','education_department',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'education_department','class'=>'form-control'),set_value('education_department'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สถานศึกษา','education_place',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'education_place','class'=>'form-control'),set_value('education_place'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','education_province',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'education_province','class'=>'form-control'),set_value('education_province'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ปีพ.ศ.ที่สำเร็จ','education_year',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $y = array(''=>'ปี');
    foreach (range('2520',(date('Y')+543)) as $key => $value) $y[++$key] = $value;
    echo form_dropdown(array('name'=>'education_year','class'=>'form-control'),$y,set_value('education_year'));?>
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

<div id="work_no">
  <div class="form-group">
    <?php echo form_label('สถานภาพ(ผู้ไม่มีงานทำ)','work_no_category',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wn = array(
        'อยู่ระหว่างหางาน'=>'อยู่ระหว่างหางาน',
        'นักเรียน/นักศึกษา'=>'นักเรียน/นักศึกษา',
        'ทหารก่อนปลดประจำการ'=>'ทหารก่อนปลดประจำการ',
        'ผู้อยู่ในสถานพินิจ'=>'ผู้อยู่ในสถานพินิจ',
        'ผู้ต้องขัง'=>'ผู้ต้องขัง',
        'ผู้ประกันตนที่ถูกเลิกจ้าง'=>'ผู้ประกันตนที่ถูกเลิกจ้าง');
      echo form_dropdown(array('name'=>'work_no_category','class'=>'form-control','id'=>'work_no_category'),$wn,set_value('work_no_category'));?>
      <p class="help-block">*ให้เลือกกรณีเป็นผู้ไม่มีงานทำ</p>
    </div>
  </div>
</div>

<div id="work_yes">
  <div class="form-group">
    <?php echo form_label('สถานภาพ(ผู้มีงานทำ)','work_category',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $w = array(''=>'เลือกรายการ',
        'government'=>'ทำงานภาครัฐ',
        'company'=>'ทำงานภาคเอกชน',
        'state'=>'ทำงานรัฐวิสาหกิจ',
        'private'=>'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ',
        'family'=>'ช่วยธุรกิจครัวเรือน');
      echo form_dropdown(array('name'=>'work_category','class'=>'form-control','id'=>'work_category'),$w,set_value('work_category'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ประเภทงาน','work_category_type',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $c = array(''=>'เลือกรายการ',
        'ข้าราชการพลเรือน'=>'ข้าราชการพลเรือน');
      echo form_dropdown(array('name'=>'work_category_type','class'=>'form-control','id'=>'work_category_type'),$c,set_value('work_category_type'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ประเภทการจ้าง','work_income',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wi = array(''=>'เลือกรายการ',
        'รายเดือน'=>'รายเดือน',
        'รายสัปดาห์'=>'รายสัปดาห์',
        'รายวัน'=>'รายวัน',
        'รายชั่วโมง'=>'รายชั่วโมง',
        'งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
      echo form_dropdown(array('name'=>'work_income','class'=>'form-control'),$wi,set_value('work_income'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('รายได้เฉลี่ยต่อเดือน','work_income_amount',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wia = array(''=>'เลือกรายการ',
        '1-5,000 บาท'=>'1-5,000 บาท',
        '5,001-9,000 บาท'=>'5,001-9,000 บาท',
        '9,001-15,000 บาท'=>'9,001-15,000 บาท',
        '15,001-20,000 บาท'=>'15,001-20,000 บาท',
        '20,001-30,000 บาท'=>'20,001-30,000 บาท',
        '30,001-40,000 บาท'=>'30,001-40,000 บาท',
        '40,001 บาทขึ้นไป'=>'40,001 บาทขึ้นไป');
      echo form_dropdown(array('name'=>'work_income_amount','class'=>'form-control'),$wia,set_value('work_income_amount'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ตำแหน่ง/อาชีพ','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'','class'=>'form-control'),set_value(''));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('อายุงาน(ปี)','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'','class'=>'form-control'),set_value(''));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ชื่อสถานที่ทำงาน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'','class'=>'form-control'),set_value(''));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ถนน','street',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'street','class'=>'form-control'),set_value('street'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('ตำบล','district',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'district','class'=>'form-control'),set_value('district'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('อำเภอ','city',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'city','class'=>'form-control'),set_value('city'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('จังหวัด','province',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'province','class'=>'form-control'),set_value('province'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('รหัสไปรษณีย์','zip',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'zip','class'=>'form-control'),set_value('zip'));?>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var work_category = $('#work_category');
  var work_category_type = $('#work_category_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');

  work_yes.prop('disabled',true);
  $('#work_no_category').prop('disabled',true);
  work_status.on('change',function(){
    if (this.value === 'ผู้มีงานทำ') {
      work_yes.prop('disabled',false);
      $('#work_no_category').prop('disabled',true);
    } else if (this.value === 'ผู้ไม่มีงานทำ') {
      work_yes.prop('disabled',true);
      $('#work_no_category').prop('disabled',false);
    } else {
      work_yes.prop('disabled',true);
      $('#work_no_category').prop('disabled',true);
    }
  });

  $('#work_no_category').editableSelect();

  work_category.on('change',function(){
    $.post('../get_work_category_type/'+this.value ,function(data) {
      work_category_type.empty();
      $.each(data,function(key,value) {
        work_category_type.append('<option value="'+key+'">'+value+'</option>');
      });
    });
  });

});
</script>
