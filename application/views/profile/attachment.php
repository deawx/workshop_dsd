<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> อัลบั้มอัพโหลดไฟล์แนบคำร้อง </h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="col-md-8">
        <?=form_open_multipart(uri_string(),array('class'=>'dropzone','id'=>'dropzone-upload'));?>
      </div>
      <div class="col-md-4">
        <?php echo form_submit('','อัพโหลด',array('class'=>'btn btn-primary btn-block','id'=>'dropzone-submit'));?>
        <p class="help-block">*รองรับไฟล์นามสกุล jpg, jpeg, png</p>
        <p class="help-block">*รองรับไฟล์ขนาดไม่เกิน 2 MB</p>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="container">
        <?php foreach ($assets as $key => $value) : ?>
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="thumbnail">
              <img class="img-responsive" src="<?=base_url('uploads/attachments/'.$value['file_name']);?>" style="height:200px;width:100%;">
              <div class="caption">
                <?=anchor('account/profile/attachment?type=delete&id='.$value['id'],'ลบไฟล์',array('class'=>'btn btn-warning btn-block','onclick'=>"return confirm('ลบไฟล์และข้อมูลการแนบเอกสารคำร้องที่ใช้ไฟล์นี้?');"));?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  Dropzone.options.dropzoneUpload = {
    parallelUploads: '10',
    maxFilesize: '1',
    maxFiles: '10',
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    addRemoveLinks: true,
    dictDefaultMessage: 'คลิกหรือลากไฟล์วางที่นี่เพื่ออัพโหลด',
    init: function() {
      var submitButton = document.querySelector("#dropzone-submit")
      myDropzone = this;
      submitButton.addEventListener("click", function() {
        myDropzone.processQueue();
      });
    }
  };
});
</script>
