<?php
$pnn = array();
$org = array();
foreach ($news as $value) :
  if ($value['pinned'] === '1') :
    $pnn[] = $value;
  else:
    $org[] = $value;
  endif;
endforeach;
?>

<div class="row">
  <div class="panel panel-success">
    <div class="panel-body">
      <h4>รายการปักหมุด (<?=count($pnn);?>)</h4>
    </div>
    <ul class="list-group">
      <?php foreach ($pnn as $value) : ?>
        <li class="list-group-item">
          <h4 class="list-group-item-heading"><?=mb_substr(strip_tags($value['title']),0,100,'UTF-8');?>
            <small><?=anchor('welcome/read/'.$value['id'],'อ่านต่อ',array('class'=>'label label-primary'));?></small>
          </h4>
          วันที่ประกาศ : <span class="label label-info"><?=date('d-m-Y',$value['date_create']);?></span>
          วันที่แก้ไข : <span class="label label-warning"><?=date('d-m-Y',$value['date_update']);?></span>
          จำนวนผู้เข้าชม : <span class="label label-default"><?=$value['views'];?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <h4>รายการทั้งหมด (<?=count($org);?>)</h4>
    </div>
    <ul class="list-group">
      <?php foreach ($org as $value) : ?>
        <li class="list-group-item">
          <h4 class="list-group-item-heading"><?=mb_substr(strip_tags($value['title']),0,100,'UTF-8');?></h4>
          <p class="list-group-item-text"><?=mb_substr(strip_tags($value['detail']),0,200,'UTF-8');?></p>
          <?=anchor('welcome/read/'.$value['id'],'อ่านต่อ',array('class'=>'label label-primary'));?>
          <hr>
          วันที่ประกาศ : <span class="label label-info"><?=date('d-m-Y',$value['date_create']);?></span>
          วันที่แก้ไข : <span class="label label-warning"><?=date('d-m-Y',$value['date_update']);?></span>
          จำนวนผู้เข้าชม : <span class="label label-default"><?=$value['views'];?></span>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="panel-footer"> <?=$this->pagination->create_links();?> </div>
  </div>

</div>
