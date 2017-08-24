<div class="list-group">
  <a href="<?=site_url('account/profile/index');?>" class="list-group-item <?=($menu === 'profile') ? 'active' : '';?>">แก้ไขข้อมูลส่วนตัว</a>
  <a href="<?=site_url('account/profile/address');?>" class="list-group-item <?=($menu === 'address') ? 'active' : '';?>">แก้ไขข้อมูลที่อยู่</a>
  <a href="<?=site_url('account/profile/edit');?>" class="list-group-item <?=($menu === 'edit') ? 'active' : '';?>">แก้ไขข้อมูลบัญชี</a>
  <a href="<?=site_url('account/profile/change_picture');?>" class="list-group-item <?=($menu === 'change_picture') ? 'active' : '';?>">เปลี่ยนรูปภาพ</a>
  <a href="<?=site_url('account/profile/change_password');?>" class="list-group-item <?=($menu === 'change_password') ? 'active' : '';?>">เปลี่ยนรหัสผ่าน</a>
  <a href="<?=site_url('auth/logout');?>" class="list-group-item">ออกจากระบบ</a>
</div>
