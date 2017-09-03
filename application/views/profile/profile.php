<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> แก้ไขข้อมูลส่วนตัว
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <?php echo form_hidden('profile_id', $profile['id']);?>
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
      <?php echo form_label('สัญชาติ','nationality',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality',$profile['nationality']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('ศาสนา','religion',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'religion','class'=>'form-control'),set_value('religion',$profile['religion']));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('หมายเลขบัตรประชาชน','id_card',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_number(array('name'=>'id_card','class'=>'form-control','maxlength'=>'13'),set_value('id_card',$profile['id_card']));?>
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
      <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?php echo form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="panel-footer">
    <?php $this->load->view('_partials/messages'); ?>
  </div>
</div>
