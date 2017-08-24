<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"></h3>
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
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>ชื่อ-นามสกุล</th>
        <th>อีเมล์</th>
        <th>วันที่สมัคร</th>
        <th>ใช้งานล่าสุด</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $key => $value): ?>
        <?php $profile = $this->db->where('user_id',$value['id'])->get('profile')->row_array(); ?>
        <tr>
          <td><?=$profile['title'].nbs().$profile['firstname'].nbs().$profile['lastname'];?></td>
          <td><?=$value['username'];?></td>
          <td><?=date('d-m-Y',$value['created_on']);?></td>
          <td><?=($value['last_login']) ? date('d-m-Y',$value['last_login']) : '';?></td>
          <td style="width:10%">
            <?=anchor('','แก้ไข',array('class'=>'label label-info'));?>
            <?=anchor(uri_string(),'ลบ',array('class'=>'label label-danger','onclick'=>"return confirm('ยืนยันการลบ?');"));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer">
  </div>
</div>
