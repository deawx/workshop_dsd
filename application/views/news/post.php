<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลการโพสต์ข่าวสาร</h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$news['id']);?>
    <div class="form-group">
      <?=form_label('หัวข้อข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_input(array('name'=>'title','class'=>'form-control'),set_value('title',$news['title']));?>
      </div>
    </div>
    <div class="form-group">
      <?=form_label('หมวดหมู่ข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_dropdown(array('name'=>'category','class'=>'form-control'),array(''=>'เลือกรายการ','ประชาสัมพันธ์'=>'ประชาสัมพันธ์','ข่าวสารทั่วไป'=>'ข่าวสารทั่วไป','ประกาศผลการสอบ'=>'ประกาศผลการสอบ',),set_value('category',$news['category']));?>
      </div>
    </div>
    <div class="form-group">
      <?=form_label('วันที่โพสต์','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_input(array('name'=>'date_create','class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?=form_label('วันที่แก้ไข','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_input(array('name'=>'date_update','class'=>'form-control','disabled'=>TRUE));?>
      </div>
    </div>
    <div class="form-group">
      <?=form_label('เนื้อหาข่าวสาร','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_textarea(array('name'=>'detail','class'=>'form-control wysihtml5','value'=>$news['detail']),set_value('detail'));?>
      </div>
    </div>
    <div class="form-group">
      <?=form_label('','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
  <div class="panel-footer"> <?php $this->load->view('_partials/messages'); ?> </div>
</div>

<script type="text/javascript">
$(function(){
  $('.wysihtml5').wysihtml5();
});
</script>
