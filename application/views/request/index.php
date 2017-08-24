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
        <th>หน่วยงาน</th>
        <th>สาขาอาชีพ</th>
        <th>ระดับ</th>
        <th>สถานะ</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (range('1','20') as $key => $value): ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer">
  </div>
</div>
