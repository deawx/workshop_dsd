<div class="well well-sm">
  <ul class="nav nav-pills">
    <li role="presentation" class="<?=($step==='1')?'active':'';?>">
      <a href="<?=site_url('account/request/skill/1');?>"><span class="badge">1</span></a>
    </li>
    <li role="presentation" class="<?=($step==='2')?'active':'';?>">
      <a href="<?=site_url('account/request/skill/2');?>"><span class="badge">2</span></a>
    </li>
    <li role="presentation" class="<?=($step==='3')?'active':'';?>">
      <a href="<?=site_url('account/request/skill/3');?>"><span class="badge">3</span></a>
    </li>
    <li role="presentation" class="<?=($step==='4')?'active':'';?>">
      <a href="<?=site_url('account/request/skill/4');?>"><span class="badge">4</span></a>
    </li>
  </ul>
</div>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title"> <?//=$step_title;?> </h3>
  </div>
  <?php echo form_open(uri_string(),array('name'=>'skill','class'=>'form-horizontal'));?>
  <?php echo form_hidden('id', $user['id']);?>
  <div class="panel-body">
    <?php $this->load->view('request/_skill_'.$step); ?>
  </div>
  <div class="panel-footer">
    <nav aria-label="">
      <ul class="pager">
        <?php if ($prev >= 1) : ?>
          <li class="previous">
            <a href="<?=site_url('account/request/skill/'.$prev);?>" id="prev">
              <span aria-hidden="true">&larr;</span> ก่อนหน้า
            </a>
          </li>
        <?php endif; ?>
        <?php if ($next <= 4) : ?>
          <li class="next">
            <a href="<?=site_url('account/request/skill/'.$next);?>" id="next">
              ถัดไป <span aria-hidden="true">&rarr;</span>
            </a>
          </li>
        <?php else: ?>
          <li class="next">
            <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary pull-right'));?>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
  <?php echo form_close();?>
</div>
