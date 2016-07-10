<?php
$teas = $this->mytea_model->get($id);
$tea = $teas[0];
$name = array(
    'name' => 'name',
    'id' => 'name',
    'placeholder' => 'name',
    'class' => 'form-control',
    'value' => set_value('name', $tea->name)
);
$types = array(
    'vert' => 'thé vert',
    'noir' => 'thé noir',
    'blanc' => 'thé blanc',
    'rooibos' => 'Rooibos',
    'oolong' => 'Oolong'
);
$temperature = array(
    'name' => 'temperature',
    'id' => 'temperature',
    'placeholder' => 'Temperature',
    'class' => 'form-control',
    'type' => 'number',
    'value' => set_value('temperature', $tea->temperature)
);

$sleeping = array(
    'name' => 'sleeping',
    'id' => 'sleeping',
    'placeholder' => 'Durée',
    'class' => 'form-control',
    'value' => set_value('sleeping', $tea->sleeping)
);

$seller = array(
    'name' => 'seller',
    'id' => 'seller',
    'placeholder' => 'Vendeur',
    'class' => 'form-control',
    'value' => set_value('seller', $tea->seller)
);
$empty = array(
    'name' => 'empty',
    'id' => 'empty',
    'value' => '1',
    'checked' => set_value('empty', $tea->empty),
    'style' => 'margin:10px'
);

$send = array(
    'name' => 'button',
    'type' => 'submit',
    'class' => 'btn btn-success',
    'content' => 'Ajouter'
);
?>

<script type="text/javascript">
    $(function () {
        $('#sleeping').datetimepicker({
            format: 'HH:mm:ss'
        });
    });
</script>

<div class="container">
    <div class="col-md-4">
        <?php echo validation_errors(); ?>
        <div class="row">
            <h1>Editer <?php echo $tea->name ?></h1>
            <?php echo form_open("mytea/edit/$id"); ?>
            <div class='form-group'>
                <?php echo form_label('Nom', 'name'); ?>
                <?php echo form_input($name); ?>
            </div>

            <div class='form-group'>
                <?php echo form_label('Type', 'type'); ?>
                <?php echo form_dropdown('type', $types, $tea->type, "class='form-control input-md'"); ?>
            </div>

            <div class='form-group'>
                <?php echo form_label('Temperature', 'temperature'); ?>
                <?php echo form_input($temperature); ?>
            </div>

            <div class='form-group'>
                <?php echo form_label('Durée', 'sleeping'); ?>
                <?php echo form_input($sleeping); ?>
            </div>


            <div class='form-group'>
                <?php echo form_label('Vendeur', 'seller'); ?>
                <?php echo form_input($seller); ?>
            </div>

            <div class='form-group'>
                <?php echo form_label('Vide ?', 'empty'); ?>
                <?php echo form_checkbox($empty); ?>
            </div>
            <?php echo form_fieldset_close(); ?>
            <?php echo form_button($send); ?>
            <?php echo anchor(site_url('mytea'), 'Annuler', array('class' => 'btn btn-danger')); ?>
            <?php echo form_close("</div></div>"); ?>
