<div class="form-group">
  <?php echo form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)','address',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'address','class'=>'form-control'),set_value('address'));?>
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
<hr>
<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label> <?php echo form_checkbox(array('name'=>'exist','id'=>'exist'));?>ใช้ที่อยู่ตามทะเบียนบ้าน </label>
    </div>
  </div>
</div>
<div id="exist_ctn">
  <div class="form-group">
    <?php echo form_label('ที่อยู่เลขที่(ปัจจุบัน)','address',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php echo form_input(array('name'=>'address','class'=>'form-control'),set_value('address'));?>
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
<hr>
<div class="form-group">
  <?php echo form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'phone','class'=>'form-control'),set_value('phone'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'fax','class'=>'form-control'),set_value('fax'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อีเมล์','email',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'email','class'=>'form-control'),set_value('email'));?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');
  exist.prop('checked',true);
  exist_ctn.prop('disabled',true);
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });
});
</script>
