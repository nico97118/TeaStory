<?php
    $teas = $this->mytea_model->get($id);
    $tea = $teas[0];
    $name   = array(
                'name'        => 'name',
                'id'          => 'name',
                'placeholder' => 'name',
                'class'       => 'form-control',
                'value'       => set_value('name',$tea->name)
            );
    $type = array(
                'name'        => 'type',
                'id'          => 'type',
                'placeholder' => 'Type',
                'class'       => 'form-control',
                'value'       => set_value('type',$tea->type)
            );
    $temperature = array(
                'name'        => 'temperature',
                'id'          => 'temperature',
                'placeholder' => 'Temperature',
                'class'       => 'form-control',
                'value'       => set_value('temperature',$tea->temperature)
            );
    
    $sleeping = array(
                'name'        => 'sleeping',
                'id'          => 'sleeping',
                'placeholder' => 'Durée',
                'class'       => 'form-control',
                'value'       => set_value('sleeping',$tea->sleeping)
            );
    
    $seller = array(
                'name'        => 'seller',
                'id'          => 'seller',
                'placeholder' => 'Vendeur',
                'class'       => 'form-control',
                'value'       => set_value('seller',$tea->seller)
            );
    
    $send   = array(
                'name' => 'button',
                'type' => 'submit',
                'class'=> 'btn btn-success',
                'content' => 'Ajouter'
        );
?>

<div class="container">
    <div class="col-md-4">
    <?php echo validation_errors(); ?>
    <div class="row">
            <h1>Editer <?php echo $tea->name ?></h1>
            <?php echo form_open("mytea/edit/$id");?>
            <div class="form-group">
            <?php echo form_fieldset('Informations');?>
                <?php echo form_label('Nom', 'name'); ?>
                <?php echo form_input($name);?>
                
                <?php echo form_label('Type', 'type'); ?>
                <?php echo form_input($type);?>
                
                <?php echo form_label('Temperature', 'temperature'); ?>
                <?php echo form_input($temperature);?>
                
                <?php echo form_label('Durée', 'sleeping'); ?>
                <?php echo form_input($sleeping);?>
                
                <?php echo form_label('Vendeur', 'seller'); ?>
                <?php echo form_input($seller);?>
                 </div>
            </div>
           <?php echo form_fieldset_close(); ?>
           <?php echo form_button($send); ?>
           <?php echo anchor(site_url('mytea'),'Annuler',array('class'=>'btn btn-danger')); ?>
           <?php echo form_close("</div></div>");?>
