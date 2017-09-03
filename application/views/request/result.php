<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติการลงทะเบียนเข้าสอบของคุณ</h3>
  </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-inline pull-right'));?>
    <div class="form-group">
      <?=form_dropdown(array('name'=>'status','class'=>'form-control'),array(''=>'เลือกสถานะ','รออนุมัติ'=>'รออนุมัติ','อนุมัติแล้ว'=>'อนุมัติแล้ว'));?>
    </div>
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
        <th>ประเภทการสอบ</th>
        <th>วันที่บันทึก</th>
        <th>วันที่แก้ไข</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($requests as $value) : ?>
        <tr>
          <td><?=$value['category'];?></td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td>
            <?=anchor('','แก้ไข',array('class'=>'label label-info'));?>
            <?=anchor('','ลบ',array('class'=>'label label-warning'));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> </div>
</div>
