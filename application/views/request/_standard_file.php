<div class="col-md-8">
  <div class="form-group">
    <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?=img('','',array('class'=>'img-responsive'));?>
    </div>
  </div>
  <div class="form-group">
    <?php echo form_label('รูปภาพที่ใช้','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?=form_upload(array('name'=>'file','class'=>'form-control','id'=>''));?>
      <p class="help-block">*สามารถแก้ไขภายหลังได้</p>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="well well-sm">
    files
    <?php print_data($assets); ?>
  </div>
</div>
