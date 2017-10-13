<div class="panel panel-default">
  <div class="panel-heading"> <h3 class="panel-title">ข้อมูลคำร้องทั้งหมด <?=count($requests);?> รายการ</h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('method'=>'get','class'=>'form-inline pull-right'));?>
    <div class="form-group"> <?=form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'ค้นหาอีเมล์'),set_value('email',$this->input->get('email')));?> </div>
    <div class="form-group"> <?=form_submit('','ค้นหา',array('class'=>'btn btn-default pull-right'));?> </div>
    <?=form_close();?>
  </div>
  <table class="table table-condensed table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>ผู้ยื่นคำร้อง</th> <th>วันที่ยื่นคำร้อง</th> <th>วันที่แก้ไข</th> <th>วันที่หมดอายุ</th> <th>ผลสอบ</th> <th></th> </tr> </thead>
    <tbody>
      <?php foreach ($requests as $value) : ?>
        <?php $type = (isset($value['category'])?'standards':'skills'); ?>
        <tr class="rows" style="display:none;">
          <td>
            <?=isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';
            if ($value['approve_status'] === '') : ?>
              <span class="label label-primary">ใหม่</span>
            <?php elseif ($value['approve_status'] === 'reject'): ?>
              <span class="label label-info">รอ</span>
            <?php endif; ?>
          </td>
          <td><?=$value['email'];?></td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td>
            <?php $expired = strtotime('+30 days',$value['date_create']);
            echo ($value['date_create']) ? date('d-m-Y',$expired) : 'N/A'; ?>
          </td>
          <td>
            <?php if (time() < $expired && $value['approve_status'] === 'accept') : ?>
              <?php if ($value['status'] === 'ผ่าน') : ?>
                <a href="#" class="label label-success" data-toggle="modal" data-target="#result<?=$value['date_create'];?>">ผ่าน</a>
              <?php elseif ($value['status'] === 'ไม่ผ่าน') : ?>
                <a href="#" class="label label-warning" data-toggle="modal" data-target="#result<?=$value['date_create'];?>">ไม่ผ่าน</a>
              <?php else: ?>
                <a href="#" class="label label-info" data-toggle="modal" data-target="#result<?=$value['date_create'];?>">เลือก</a>
              <?php endif; ?>
              <div class="modal fade" id="result<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                  <?=form_open('admin/approve/status',array('class'=>'form-horizontal'));?>
                  <?=form_hidden('id',$value[rtrim($type,'s').'_id']);?>
                  <?=form_hidden('type',$type);?>
                  <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">ระบุสถานะผลการสอบ</h4> </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group"> <?=form_label('ผลการสอบ','',array('class'=>'control-label col-md-4'));?>
                          <div class="col-md-8">
                            <div class="radio"> <label><?=form_radio('status','ผ่าน',set_radio('status','ผ่าน',($value['status']==='ผ่าน')));?>ผ่าน</label> </div>
                            <div class="radio"> <label><?=form_radio('status','ไม่ผ่าน',set_radio('status','ไม่ผ่าน',($value['status']==='ไม่ผ่าน')));?>ไม่ผ่าน</label> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                    <?=form_close();?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </td>
          <td>
            <?php if (time() < $expired) : ?>

              <?=anchor('admin/approve/view/'.$value['date_create'],'ดู',array('class'=>'label label-default','target'=>'_blank'));?>

              <?=anchor('#','เอกสาร',array('class'=>'label label-default','data-toggle'=>'modal','data-target'=>'#attachment'.$value['date_create']));?>
                <div class="modal fade" id="attachment<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">เอกสารประกอบคำร้อง</h4> </div>
                    <div class="modal-body">
                      <div class="row">
                        <table class="table table-hover">
                          <thead> <tr> <th>ชนิดไฟล์</th> <th>ขนาดไฟล์</th> <th>อัตราส่วนไฟล์</th> <th></th> </tr> </thead>
                          <tbody>
                            <?php $assets_id = unserialize($value['assets_id']);
                              $assets = $this->db->select('id,file_size,file_type,file_name,image_size_str')->where_in('id',$assets_id)->get('assets')->result_array();
                              foreach ($assets as $asset) : ?>
                              <tr>
                                <td><?=$asset['file_type'];?></td>
                                <td><?=byte_format($asset['file_size']);?></td>
                                <td><?=$asset['image_size_str'];?></td>
                                <td><?=anchor('uploads/attachments/'.$asset['file_name'],'ดู',array('class'=>'label label-info','target'=>'_blank'));?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php if ($value['approve_status'] !== 'accept') : ?>

                <?=anchor('#','ตอบรับ',array('class'=>'label label-success','data-toggle'=>'modal','data-target'=>'#accept'.$value['date_create']));?>
                  <div class="modal fade" id="accept<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog">
                      <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
                      <?=form_hidden('id',$value[rtrim($type,'s').'_id']);?>
                      <?=form_hidden('type',$type);?>
                      <div class="modal-content">
                        <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">เงื่อนไขการตอบรับคำร้อง</h4> </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group"> <?=form_label('วันที่อนุมัติ','',array('class'=>'control-label col-md-4'));?>
                              <div class="col-md-8"> <?=form_input(array('name'=>'approve_date','class'=>'form-control','readonly'=>TRUE),date('d-m-Y',time()));?> </div>
                            </div>
                            <div class="form-group"> <?=form_label('สถานะการอนุมัติ','',array('class'=>'control-label col-md-4'));?>
                              <div class="col-md-8"> <?=form_input(array('name'=>'approve_status','class'=>'form-control','readonly'=>TRUE),'accept');?> </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                        <?=form_close();?>
                      </div>
                    </div>
                  </div>

                <?=anchor('#','ปฏิเสธ',array('class'=>'label label-warning','data-toggle'=>'modal','data-target'=>'#reject'.$value['date_create']));?>
                  <div class="modal fade" id="reject<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog">
                    <?=form_open(uri_string(),array('class'=>'form-horizontal')).form_hidden('id',$value[rtrim($type,'s').'_id']);?>
                    <div class="modal-content">
                      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">เงื่อนไขการปฏิเสธคำร้อง</h4> </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="form-group">
                            <?=form_label('วันที่อนุมัติ','',array('class'=>'control-label col-md-4'));?>
                            <div class="col-md-8"> <?=form_input(array('name'=>'approve_date','class'=>'form-control','readonly'=>TRUE),date('d-m-Y',time()));?> </div>
                          </div>
                          <div class="form-group">
                            <?=form_label('สถานะการอนุมัติ','',array('class'=>'control-label col-md-4'));?>
                            <div class="col-md-8"> <?=form_input(array('name'=>'approve_status','class'=>'form-control','readonly'=>TRUE),'reject');?> </div>
                          </div>
                          <div class="form-group">
                            <?=form_label('หมายเหตุ','',array('class'=>'control-label col-md-4'));?>
                            <div class="col-md-8"> <?=form_input(array('name'=>'approve_remark','class'=>'form-control','required'=>TRUE));?> </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                      <?=form_close();?>
                    </div>
                  </div>
                </div>

              <?php endif; ?>

            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="panel-footer"> <?=anchor('#','ก่อนหน้า',array('class'=>'label label-default','id'=>'more'));?> </div>
</div>

<script type="text/javascript">
$(function(){
  var rows = $('.rows');
  var more = $('#more');

  rows.slice(0,10).show();

  if ($('.rows:hidden').length < 10) {
    more.hide();
  }

  more.on('click',function(e){
    e.preventDefault();
    $('.rows:hidden').slice(0,5).fadeIn('slow');
    if ($('.rows:hidden').length == 0) {
      more.fadeOut('slow');
    }
  });
});
</script>
