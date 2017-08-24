<div class="form-group">
  <?php echo form_label('คำนำหน้าชื่อ','title',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
    echo form_dropdown(array('name'=>'title','class'=>'form-control'),$tt,set_value('title'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อ','firstname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'firstname','class'=>'form-control'),set_value('firstname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('นามสกุล','lastname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'lastname','class'=>'form-control'),set_value('lastname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ว/ด/ป เกิด','birthdate',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $key => $value) $d[++$key] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d'));?>
  </div>
  <div class="col-md-3">
    <?php $m = array(''=>'เดือน');
    foreach (range('1','12') as $key => $value) $m[++$key] = $value;
    echo form_dropdown(array('name'=>'m','class'=>'form-control'),$m,set_value('m'));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2520',(date('Y')+543)) as $key => $value) $y[++$key] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อายุ','age',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'age','class'=>'form-control','disabled'=>TRUE));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สัญชาติ','nationality',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมู่โลหิต','blood',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'blood','class'=>'form-control'),set_value('blood'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมายเลขบัตรประชาชน','id_card',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'id_card','class'=>'form-control'),set_value('id_card'));?>
  </div>
</div>
