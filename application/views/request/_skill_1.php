<div class="form-group">
  <?php echo form_label('คำนำหน้าชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
    echo form_dropdown(array('name'=>'profile[title]','class'=>'form-control'),$tt,set_value('title',$profile['title']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'profile[firstname]','class'=>'form-control'),set_value('firstname',$profile['firstname']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('นามสกุล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'profile[lastname]','class'=>'form-control'),set_value('lastname',$profile['lastname']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ว/ด/ป เกิด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $value) $d[$value] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',date('d',$profile['birthdate'])));?>
  </div>
  <div class="col-md-3">
    <?php echo form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',date('m',$profile['birthdate'])));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',date('Y',$profile['birthdate'])+543));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สัญชาติ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'profile[nationality]','class'=>'form-control'),set_value('nationality',$profile['nationality']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมู่โลหิต','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'profile[blood]','class'=>'form-control'),set_value('blood'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมายเลขบัตรประชาชน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'profile[id_card]','class'=>'form-control','disabled'=>TRUE),set_value('id_card',$profile['id_card']));?>
  </div>
</div>
