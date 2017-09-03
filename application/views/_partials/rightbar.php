<div class="list-group">
  <a href="<?=site_url('account/request/standard');?>" class="list-group-item <?=($menu === 'standard') ? 'active' : '';?>">ขอสอบมาตรฐานฝีมือแรงงาน</a>
  <a href="<?=site_url('account/request/skill');?>" class="list-group-item <?=($menu === 'skill') ? 'active' : '';?>">ขอสอบรับรองความรู้ความสามารถ</a>
</div>
<div class="list-group">
  <a href="<?=site_url('account/request/index');?>" class="list-group-item <?=($menu === 'index') ? 'active' : '';?>">ประวัติการยื่นคำร้อง</a>
  <a href="<?=site_url('account/request/result');?>" class="list-group-item <?=($menu === 'result') ? 'active' : '';?>">รายการตรวจผลการสอบ</a>
  <a href="<?=site_url('account/request/calendar');?>" class="list-group-item <?=($menu === 'calendar') ? 'active' : '';?>">ตารางเลือกวันสอบ</a>
</div>
<?php $this->load->view('_partials/messages'); ?>
