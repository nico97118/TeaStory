<div class="container">
    <div class="col-md-6">
        <h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login",array('class'=>'form-horizontal'));?>
<fieldset>
     <div class="form-group">
  <p>
      <label class="control-label"><?php echo lang('login_identity_label', 'identity');?></label>
       <div class="controls">
          <?php echo form_input($identity);?>
       </div>
  </p>

  <p>
      <label class="control-label"><?php echo lang('login_password_label', 'password');?></label>
       <div class="controls">
          <?php echo form_input($password);?>
       </div>
  </p>
        </div>
    <div class="form-group form-inline">
  <p>
      <label class="control-label"><?php echo lang('login_remember_label', 'remember');?></label>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
     
    </div>
    <div class="form-group">

  <p><?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn btn-success'));?></p>
    </div>
</fieldset>
<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
    </div>
    </div>
