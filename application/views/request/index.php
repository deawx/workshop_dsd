<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title">ประวัติการลงทะเบียนคำร้องของคุณทั้งหมด <?=count($requests);?> รายการ</h3> </div>
  <div class="panel-body"> </div>
  <table class="table table-hover">
    <thead> <tr> <th>ประเภทรายการ</th> <th>วันที่บันทึก</th> <th>วันที่แก้ไข</th> <th>วันที่หมดอายุ</th> <th></th> </tr> </thead>
    <tbody>
      <?php foreach ($requests as $key => $value) : ?>
        <tr class="rows" style="display:none;">
          <td>
            <?php echo isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';
              if ($value['approve_status'] === '') : ?>
              <span class="label label-primary">ใหม่</span>
            <?php elseif ($value['approve_status'] === 'accept'): ?>
              <span class="label label-success">ตอบรับ</span>
            <?php elseif ($value['approve_status'] === 'reject'): ?>
              <span class="label label-info">ปฏิเสธ</span>
            <?php endif; ?>
          </td>
          <td><?=($value['date_create']) ? date('d-m-Y',$value['date_create']) : 'N/A';?></td>
          <td><?=($value['date_update']) ? date('d-m-Y',$value['date_update']) : 'N/A';?></td>
          <td>
            <?php $expired = strtotime('+30 days',$value['date_create']);
            echo ($value['date_create']) ? date('d-m-Y',$expired) : 'N/A'; ?>
          </td>
          <td class="text-right">
            <?php if ($value['approve_status'] !== 'accept') : ?>

              <?=anchor('account/request/edit?code='.$value['date_create'],'แก้ไข',array('class'=>'label label-info','target'=>'_blank'));?>
              <?=anchor('#','แนบไฟล์',array('class'=>'label label-primary','data-toggle'=>'modal','data-target'=>'#attachment'.$value['date_create']));?>

              <div class="modal fade" id="attachment<?=$value['date_create'];?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <?=form_open().form_hidden('id',$value['id']).form_hidden('type',isset($value['category']) ? 'standards' : 'skills');?>
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h4 class="modal-title">รายการแนบไฟล์เอกสาร</h4> </div>
                    <div class="modal-body" style="padding:0px;">
                      <table class="table table-hover">
                        <tbody>
                          <?php $assets_id = unserialize($value['assets_id']);
                          foreach ($assets as $asset) : ?>
                          <tr>
                            <td><?=form_checkbox(array('name'=>'assets_id[]'),$asset['id'],set_checkbox('assets_id',$asset['id'],(any_in_array($asset['id'],$assets_id))));?></td>
                            <td><?=img('uploads/attachments/'.$asset['file_name'],'',array('style'=>'height:75px;width:75px;'));?></td>
                            <td><?=$asset['image_size_str'];?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer"> <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button> </div>
                  <?=form_close();?>
                </div>
              </div>
            </div>

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
