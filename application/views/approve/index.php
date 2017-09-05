<?php
$uri_get = $this->input->get();
unset($uri_get['order_by']);
$uri_get = http_build_query($uri_get);
$uri_string = uri_string().'?'.$uri_get;
$order_by = $this->input->get('order_by');
?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลคำร้องทั้งหมด</h3>
  </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('method'=>'get','class'=>'form-inline pull-right'));?>
    <div class="form-group">
      <?=form_input(array('name'=>'q','class'=>'form-control','placeholder'=>'ค้นหาอีเมล์'));?>
    </div>
    <div class="form-group">
      <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?>
    </div>
    <?=form_close();?>
  </div>
  <table class="table table-condensed table-hover">
    <thead>
      <tr>
        <th>ประเภทรายการ</th>
        <th>วันที่ยื่นคำร้อง</th>
        <th>วันที่แก้ไข</th>
        <th>ผู้ยื่นคำร้อง</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <?php print_data($requests); ?>
      <?php foreach ($requests as $value) : ?>
        <?php print_data($value); ?>
        <tr>
          <td><?=isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';?></td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td></td>
          <td>
            <?=anchor('','',array('class'=>'label label-info'));?>
            <?=anchor('','',array('class'=>'label label-warning'));?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> <?=$this->pagination->create_links();?> </div>
</div>
