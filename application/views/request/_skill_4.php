<div class="form-group">
  <?php echo form_label('เอกสารหลักฐานประกอบการยื่นคำขอ','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'reference[]'),'');?>(๑)รูปถ่ายหน้าตรง ขนาด ๑ X ๑.๕ นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน ๒ รูป</label>
    </div>
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'reference[]'),'');?>(๒)สำเนาบัตรประจำตัวประชาชน</label>
    </div>
    <p class="help-block"></p>
    <?=form_input(array('name'=>'reference[]','class'=>'form-control','placeholder'=>'(๓)เอกสารอื่นๆ โปรดระบุ'));?>
    <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('เอกสารสำคัญ','needed',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <div class="checkbox">
      <label><?=form_checkbox(array('name'=>'needed','required'=>TRUE),'1');?>สำเนาใบผ่านการสอบมาตรฐานฝีมือแรงงานแห่งชาติ</label>
    </div>
    <p class="help-block">*ข้าพเจ้าได้ผ่านการสอบมาตรฐานฝีมือแรงงานแล้วและพร้อมแนบสำเนาเอกสารดังกล่าวมาเพื่อขอรับการอนุมัติ</p>
  </div>
</div>
<div class="form-group">
  <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?>
  </div>
</div>
