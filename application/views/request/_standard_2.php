<?php $address_current = unserialize($user['address_current']); ?>
<div class="form-group">
  <?=form_label('คำนำหน้าชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
    echo form_dropdown(array('name'=>'profile[title]','class'=>'form-control'),$tt,set_value('profile[title]',$user['title']));?>
  </div>
</div>
<div class="form-group">
  <?=form_label('ชื่อ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control'),set_value('profile[firstname]',$user['firstname']));?> </div>
</div>
<div class="form-group">
  <?=form_label('นามสกุล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control'),set_value('profile[lastname]',$user['lastname']));?> </div>
</div>
<div class="form-group">
  <?=form_label('ชื่อเต็ม(ภาษาอังกฤษ)','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[fullname]','class'=>'form-control'),set_value('profile[fullname]'));?> </div>
</div>
<div class="form-group">
  <?=form_label('ศาสนา','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[religion]','class'=>'form-control'),set_value('profile[religion]',$user['religion']));?> </div>
</div>
<div class="form-group">
  <?=form_label('สัญชาติ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control'),set_value('profile[nationality]',$user['nationality']));?> </div>
</div>
<div class="form-group">
  <?=form_label('หมายเลขบัตรประชาชน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card'),set_value('profile[id_card]',$user['id_card']));?> </div>
</div>
<div class="form-group">
  <?=form_label('ว/ด/ป เกิด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $value) $d[$value] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',($user['birthdate']) ? date('d',($user['birthdate'])) : NULL));?>
  </div>
  <div class="col-md-3">
    <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',($user['birthdate']) ? date('m',$user['birthdate']) : NULL));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',($user['birthdate']) ? date('Y',$user['birthdate'])+543 : NULL));?>
  </div>
</div>
<div class="form-group">
  <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address_current['address']));?>
  </div>
</div>
<div class="form-group">
  <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',$address_current['street']));?> </div>
</div>
<div class="form-group">
  <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[tambon]','class'=>'form-control'),set_value('address[tambon]',$address_current['tambon']));?> </div>
</div>
<div class="form-group">
  <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[amphur]','class'=>'form-control'),set_value('address[amphur]',$address_current['amphur']));?> </div>
</div>
<div class="form-group">
  <?=form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[province]','class'=>'form-control'),set_value('address[province]',$address_current['province']));?> </div>
</div>
<div class="form-group">
  <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip'),set_value('address[zip]',$address_current['zip']));?> </div>
</div>
<div class="form-group">
  <?=form_label('อีเมล์','email',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_email(array('name'=>'address[email]','class'=>'form-control'),set_value('address[email]',$user['email']));?> </div>
</div>
<div class="form-group">
  <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[phone]','class'=>'form-control tel','max_length'=>'10'),set_value('address[phone]',$user['phone']));?> </div>
</div>
<div class="form-group">
  <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'address[fax]','class'=>'form-control tel','max_length'=>'10'),set_value('address[fax]',$user['fax']));?> </div>
</div>
