<div class="container">
    <div class="col-md-6">
 
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<?php echo validation_errors(); ?>

<?php echo form_open("auth/create_user",array('class'=>'form-horizontal'));?>
<fieldset>
    <div class="form-group">
      <p>
            <label class="control-label"><?php echo lang('create_user_email_label', 'email');?></label>
            <div class="controls">
                <?php echo form_input($email);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('create_user_password_label', 'password');?></label>
            <div class="controls">
                <?php echo form_input($password);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
            <div class="controls">
                <?php echo form_input($password_confirm);?>
            </div>
      </p>
      
      <p>
            <label class="control-label"><?php echo lang('create_user_fname_label', 'first_name');?> </label>
            <div class="controls">
                <?php echo form_input($first_name);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('create_user_lname_label', 'last_name');?></label>
            <div class="controls">
                <?php echo form_input($last_name);?>
            </div>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
          <label class="control-label">Groupes</label>
            <div class="controls">
                <?php foreach ($groups as $group):
                    $checked = null;?>
                <label class="checkbox">
                <?php if($group['name'] == $default_group){
                    $checked = 'checked="checked"';      
                      } ?>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked;?>>
                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8'); ?>  
                </label>
                <?php endforeach ?>
            </div>
      </p>

    </div>


<div class="form-group">  
    <p><?php echo form_submit('submit', lang('create_user_submit_btn'),array('class'=>'btn btn-success'));?>
    <?php    echo anchor('auth','Annuler',array('class'=>'btn btn-danger')) ?></p>
</div>
</fieldset>
<?php echo form_close();?>
</div></div>