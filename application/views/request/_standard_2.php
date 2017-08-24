<?php
$address = unserialize($profile['address']);
$address_current = unserialize($profile['address_current']);
?>
<div class="form-group">
  <?php echo form_label('คำนำหน้าชื่อ','title',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $tt = array(''=>'เลือกรายการ','นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว');
    echo form_dropdown(array('name'=>'title','class'=>'form-control'),$tt,set_value('title',$profile['title']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อ','firstname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'firstname','class'=>'form-control'),set_value('firstname',$profile['firstname']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('นามสกุล','lastname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'lastname','class'=>'form-control'),set_value('lastname',$profile['lastname']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ชื่อเต็ม(ภาษาอังกฤษ)','fullname',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'fullname','class'=>'form-control'),set_value('fullname'));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ศาสนา','religion',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'religion','class'=>'form-control'),set_value('religion',$profile['religion']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('สัญชาติ','nationality',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality',$profile['nationality']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('หมายเลขบัตรประชาชน','id_card',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'id_card','class'=>'form-control'),set_value('id_card',$profile['id_card']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ว/ด/ป เกิด','birthdate',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-2">
    <?php $d = array(''=>'วัน');
    foreach (range('1','31') as $value) $d[$value] = $value;
    echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',date('d',$profile['birthdate'])));?>
  </div>
  <div class="col-md-3">
    <?php $m = array(''=>'เดือน');
    foreach (range('1','12') as $value) $m[$value] = $value;
    echo form_dropdown(array('name'=>'m','class'=>'form-control'),$m,set_value('m',date('m',$profile['birthdate'])));?>
  </div>
  <div class="col-md-3">
    <?php $y = array(''=>'ปี พ.ศ.');
    foreach (range('2520',(date('Y')+543)) as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',date('Y',$profile['birthdate'])+543));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อายุ','age',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input('age',age_calculate($profile['birthdate']),array('class'=>'form-control','disabled'=>TRUE));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ที่อยู่เลขที่(ปัจจุบัน)','address',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'address','class'=>'form-control'),set_value('address',$address['address']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ถนน','street',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'street','class'=>'form-control'),set_value('street',$address['street']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('ตำบล','tambon',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'tambon','class'=>'form-control'),set_value('tambon',$address['tambon']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อำเภอ','amphur',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'amphur','class'=>'form-control'),set_value('amphur',$address['amphur']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('จังหวัด','province',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'province','class'=>'form-control'),set_value('province',$address['province']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('รหัสไปรษณีย์','zip',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'zip','class'=>'form-control'),set_value('zip',$address['zip']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('อีเมล์','email',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_input(array('name'=>'email','class'=>'form-control'),set_value('email',$user['email']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'phone','class'=>'form-control'),set_value('phone',$profile['phone']));?>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php echo form_number(array('name'=>'fax','class'=>'form-control'),set_value('fax',$profile['fax']));?>
  </div>
</div>
