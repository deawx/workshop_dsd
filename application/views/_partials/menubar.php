<?php $parent = isset($parent) ? $parent : ''; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand <?=($parent === 'home') ? 'active' : '';?>" href="<?=site_url();?>">หน้าหลัก</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="<?=($parent === 'dashboard') ? 'active' : '';?>"> <a href="<?=site_url('admin/dashboard');?>">ข้อมูลสถิติ</a> </li>
        <li class="<?=($parent === 'approve') ? 'active' : '';?>"> <a href="<?=site_url('admin/approve');?>">ข้อมูลคำร้อง</a> </li>
        <li class="<?=($parent === 'user') ? 'active' : '';?>"> <a href="<?=site_url('admin/user');?>">ข้อมูลสมาชิก</a> </li>
      </ul>
    </div>
  </div>
</nav>
