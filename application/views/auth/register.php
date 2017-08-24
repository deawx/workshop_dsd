<div class="container">
  <div class="row" style="padding-top:10em;">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <?php echo lang('create_user_heading');?>
            <small><?php echo lang('create_user_subheading');?></small>
          </h3>
        </div>
        <div class="panel-body">
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/register",array('class'=>'form-horizontal','autocomplete'=>'off'));?>
          <?php if ($identity_column!=='email') : ?>
            <div class="form-group">
              <?php echo lang('create_user_identity_label', 'identity',array('class'=>'control-label col-md-4')); ?>
              <?php echo form_error('identity'); ?>
            </div>
            <div class="col-md-8">
              <?php echo form_input($identity,'',array('class'=>'form-control')); ?>
            </div>
          <?php endif; ?>
          <div class="form-group">
            <?php echo lang('create_user_email_label', 'email',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8">
              <?php echo form_input($email,'',array('class'=>'form-control'));?>
            </div>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_password_label', 'password',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8">
              <?php echo form_password($password,'',array('class'=>'form-control'));?>
            </div>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8">
              <?php echo form_password($password_confirm,'',array('class'=>'form-control'));?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              <?php echo form_submit('submit', lang('create_user_submit_btn'),array('class'=>'btn btn-primary'));?>
            </div>
          </div>
          <?php echo form_close();?>
        </div>
        <div class="panel-footer text-right">
          <p><a href="login"><?php echo lang('login_heading');?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>
