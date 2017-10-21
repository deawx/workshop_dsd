<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> อัลบั้มอัพโหลดไฟล์แนบคำร้อง </h3> </div>
  <div class="panel-body">
    <div class="form-group">
      <div class="col-md-8"> <?=form_open_multipart(uri_string(),array('class'=>'dropzone','id'=>'dropzone-upload'));?> </div>
      <div class="col-md-4">
        <?=form_submit('','อัพโหลด',array('class'=>'btn btn-primary btn-block','id'=>'dropzone-submit'));?>
        <p class="help-block">*รองรับไฟล์นามสกุล jpg, jpeg, png, pdf</p>
        <p class="help-block">*รองรับไฟล์ขนาดไม่เกิน 2 MB</p>
        <p class="help-block">*สามารถอัพโหลดได้ครั้งละไม่เกิน 10 ไฟล์</p>
      </div>
      <?=form_close(); ?>
    </div>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="container">
        <table class="table table-hover">
          <thead> <tr> <th>#</th> <th>ชื่อไฟล์</th> <th>ชนิดไฟล์</th> <th>ขนาดไฟล์</th> <th></th> </tr> </thead>
          <?php foreach ($assets as $_a => $asset) : ?>
            <tbody>
              <tr>
                <td><?=++$_a;?></td>
                <td><?=$asset['client_name'];?></td>
                <td><?=$asset['file_type'];?></td>
                <td><?=byte_format($asset['file_size']);?></td>
                <td>
                  <?=anchor('uploads/attachments/'.$asset['file_name'],'ดู',array('class'=>'label label-info','target'=>'_blank'));?>
                  <?=anchor('account/profile/attachment?type=delete&id='.$asset['id'],'ลบไฟล์',array('class'=>'label label-warning','onclick'=>"return confirm('ลบไฟล์และข้อมูลการแนบเอกสารคำร้องที่ใช้ไฟล์นี้?');"));?>
                </td>
              </tr>
            </tbody>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>

<?=result_in_array(array(link_tag('assets/css/dropzone.min.css'),link_tag('assets/css/basic.min.css')));?>
<?=result_in_array(array(script_tag('assets/js/dropzone.min.js')));?>
<script type="text/javascript">
Dropzone.options.dropzoneUpload = {
  parallelUploads: '10',
  maxFilesize: '1',
  maxFiles: '10',
  acceptedFiles: 'image/*,.pdf',
  autoProcessQueue: false,
  addRemoveLinks: true,
  dictDefaultMessage: 'คลิกหรือลากไฟล์วางที่นี่เพื่ออัพโหลด',
  init: function() {
    var submitButton = document.querySelector("#dropzone-submit")
    myDropzone = this;
    submitButton.addEventListener("click",function(){
      myDropzone.processQueue();
      location.reload();
    });
  }
};
</script>
