<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติการลงทะเบียนคำร้องของคุณ</h3>
  </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-inline pull-right'));?>
    <div class="form-group">
      <?=form_input(array('name'=>'q','class'=>'form-control','placeholder'=>'คำค้นหา'));?>
    </div>
    <div class="form-group">
      <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?>
    </div>
    <?=form_close();?>
  </div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ประเภทรายการ</th>
        <th>วันที่บันทึก</th>
        <th>วันที่แก้ไข</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($requests as $key => $value) : ?>
        <tr class="rows" style="display:none;">
          <td><?=isset($value['category']) ? 'ใบสมัครทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ' : 'คำขอหนังสือรับรองความรู้ความสามารถ';?></td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td>
            <?=anchor('','แก้ไข',array('class'=>'label label-info'));?>
            <?=anchor('','แนบไฟล์',array('class'=>'label label-primary'));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer">
    <?=anchor('#','ก่อนหน้า',array('class'=>'label label-default','id'=>'more'));?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var rows = $('.rows');
  var more = $('#more');

  rows.slice(0,10).show();

  if ($('.rows:hidden').length < 10) {
    more.hide();
  }

  more.on('click',function(e){
    e.preventDefault();
    $('.rows:hidden').slice(0,5).fadeIn('slow');
    if ($('.rows:hidden').length == 0) {
      more.fadeOut('slow');
    }
  });
});
</script>
