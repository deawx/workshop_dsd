<div class="form-group">
  <?php echo form_label('เอกสารหลักฐานประกอบการยื่นคำขอ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?>(๑)รูปถ่ายหน้าตรง ขนาด ๑ X ๑.๕ นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน ๒ รูป</label>
    </div>
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>''),'');?>(๒)สำเนาบัตรประจำตัวประชาชน</label>
    </div>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'','class'=>'form-control','placeholder'=>'(๓)เอกสารอื่นๆ โปรดระบุ'));?>
    <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
  </div>
</div>
