<div class="container">
<div class="col-md-6">
<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<?php echo display_error(validation_errors()); ?>

<?php echo form_open(uri_string());?>
    <div class="form-group">
      <p>
            <label class="control-label"><?php echo lang('edit_user_email_label', 'email');?></label>
            <div class="controls">
                <?php echo form_input($email);?>
            </div>
      </p>
      
      <p>
            <label class="control-label"><?php echo "Nom d'utilisateur";?></label>
            <div class="controls">
                <?php echo form_input($username);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('edit_user_password_label', 'password');?></label>
            <div class="controls">
                <?php echo form_input($password);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
            <div class="controls">
                <?php echo form_input($password_confirm);?>
            </div>
      </p>
      
      <p>
            <label class="control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
            <div class="controls">
                <?php echo form_input($first_name);?>
            </div>
      </p>

      <p>
            <label class="control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
            <div class="controls">
                <?php echo form_input($last_name);?>
            </div>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>
          
          </div>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'),array('class'=>'btn btn-success'));?>
      <?php    echo anchor('auth','Annuler',array('class'=>'btn btn-danger')) ?></p>

<?php echo form_close("</div></div>");?>
</div></div>