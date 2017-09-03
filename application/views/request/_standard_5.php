<div class="form-group">
  <?php echo form_label('ประเภทผู้สมัคร','type',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $c = array(''=>'เลือกรายการ',
    'ผู้รับการฝึกจาก กพร.'=>'ผู้รับการฝึกจาก กพร.',
    'จากสถานศึกษา'=>'จากสถานศึกษา',
    'จากภาครัฐ'=>'จากภาครัฐ',
    'จากภาคเอกชน'=>'จากภาคเอกชน',
    'บุคคลทั่วไป'=>'บุคคลทั่วไป');
    echo form_dropdown(array('name'=>'type','class'=>'form-control'),$c,set_value('type'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สภาพร่างกาย','health',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $h = array(''=>'เลือกรายการ','ปกติ'=>'ปกติ','พิการ'=>'พิการ');
    echo form_dropdown(array('name'=>'health','class'=>'form-control','id'=>'health'),$h,set_value('health'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ความพิการ','health_status',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $hs = array('การมองเห็น'=>'การมองเห็น','การได้ยิน'=>'การได้ยิน','การเคลื่อนไหว'=>'การเคลื่อนไหว');
    echo form_dropdown(array('name'=>'health_status','class'=>'form-control','id'=>'health_status'),$hs,set_value('health_status'));?>
    <p class="help-block">*ให้เลือกกรณีสถาพร่างกายพิการ</p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('เอกสารที่แนบมาด้วย','reference',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'reference[]'),'สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน');?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label>
    </div>
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'reference[]'),'สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน');?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label>
    </div>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'reference[]','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value(''));?>
    <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ยอมรับการเปิดเผยข้อมูล','allow',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'allow'),TRUE);?></label>
    </div>
    <p class="help-block">*ข้าพเจ้ายินยอมเปิดเผยข้อมูลส่วนบุคคลให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</p>
  </div>
</div>
<hr>
<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var health = $('#health');
  $('#health_status').prop('disabled',true);
  health.on('change',function(){
    if (this.value == 'พิการ') {
      $('#health_status').prop('disabled',false);
    } else {
      $('#health_status').prop('disabled',true);
    }
  });
  $('#health_status').editableSelect();
});
</script>
