<div class='container'>
    <div class='col-md-6'>
        <div id="infoMessage"><?php echo $message; ?></div>
        <h1>Mot de passe oublié</h1>
        <h3>Saissiez votre adresse email</h3>
        <?php echo form_open("auth/forgot_password"); ?>

        <p>
            <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
            <?php echo form_input($identity); ?>
        </p>

        <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), array('class' => 'btn btn-success')); ?>
            <?php echo anchor(site_url(), 'Annuler', array('class' => 'btn btn-danger')); ?></p>

        <?php echo form_close(); ?>
    </div>


