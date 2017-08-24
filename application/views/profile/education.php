<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> แก้ไขข้อมูลการศึกษา
      <small><?php echo lang('edit_user_subheading');?></small>
    </h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <div class="form-group">
      <?php echo form_label('ระดับการศึกษาสูงสุด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นประถมศึกษา </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นม.3 </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นม.6 </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปก.ศ.ต้น </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปก.ศ.สูง/อนุปริญญา </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปวช. </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปวท. </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปวส. </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปริญญาตรี </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปริญญาโท </label>
        </div>
        <div class="radio">
          <label> <?php echo form_radio(array('name'=>''),'');?> ชั้นปริญญาเอก </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('สาขาวิชา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('สถานศึกษา','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('จังหวัด','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_input(array('name'=>'','class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('ปีพ.ศ.ที่สำเร็จ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $y = array(''=>'ปี');
        foreach (range('2520',(date('Y')+543)) as $key => $value) $y[++$key] = $value;
        echo form_dropdown(array('name'=>'','class'=>'form-control'),$y);?>
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
