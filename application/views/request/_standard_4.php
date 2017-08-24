<div class="form-group">
  <?php echo form_label('ความต้องการหางาน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ',
    'ไม่ต้องการ'=>'ไม่ต้องการ',
    'ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ',
    'ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
    echo form_dropdown(array('name'=>'','class'=>'form-control','id'=>'tf'),$tt,set_value(''));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ตำแหน่ง/อาชีพ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'','class'=>'form-control lc')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('กลุ่มอุตสาหกรรม','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'','class'=>'form-control lc')); ?>
    <p class="help-block">*ให้เลือกกรรีจัดหางานในประเทศ</p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อสถานที่ทำงาน/บริษัทจัดหางาน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control oc'),set_value(''));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ถนน','street',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'street','class'=>'form-control oc'),set_value('street'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ตำบล','district',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'district','class'=>'form-control oc'),set_value('district'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อำเภอ','city',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'city','class'=>'form-control oc'),set_value('city'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','province',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'province','class'=>'form-control oc'),set_value('province'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('รหัสไปรษณีย์','zip',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'zip','class'=>'form-control oc'),set_value('zip'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('เบอร์โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'phone','class'=>'form-control oc'),set_value('phone'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อบริษัทนายจ้าง','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'','class'=>'form-control oc'),set_value(''));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ประเทศที่จะไปทำงาน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'','class'=>'form-control oc')); ?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ระยะเวลาจ้าง','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'','class'=>'form-control oc'),set_value(''));?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var tf = $('#tf');
  var lc = $('.lc');
  var oc = $('.oc');
  lc.prop('disabled',true);
  oc.prop('disabled',true);
  tf.on('change',function(){
    if (this.value === 'ไม่ต้องการ') {
      lc.prop('disabled',true);
      oc.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในประเทศ') {
      lc.prop('disabled',false);
      oc.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในต่างประเทศ') {
      lc.prop('disabled',true);
      oc.prop('disabled',false);
    } else {
      lc.prop('disabled',true);
      oc.prop('disabled',true);
    }
  });
});
</script>
