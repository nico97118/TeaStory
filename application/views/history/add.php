<?php
$date = array(
    'name' => 'date',
    'id' => 'date',
    'placeholder' => 'Date',
    'class' => 'form-control input-sm',
    'value' => set_value('date',date('Y-m-d G:i',strtotime('now')))
);

$tea_options = array(null=>'');
$teas = $this->mytea_model->get_not_empty();
foreach ($teas as $tea) {
    $tea_options[$tea->id] = $tea->name;
}

$unit_options = $this->config->item('unit_options');


$temperature = array(
    'name' => 'temperature',
    'id' => 'temperature',
    'placeholder' => 'Temperature',
    'class' => 'form-control input-sm',
    'type' => 'number',
    'value' => set_value('temperature')
);

$sleeping = array(
    'name' => 'sleeping',
    'id' => 'sleeping',
    'placeholder' => 'Durée',
    'class' => 'form-control input-sm',
    'value' => set_value('sleeping')
);

$dosage = array(
    'name' => 'dosage',
    'id' => 'dosage',
    'placeholder' => 'Dosage',
    'class' => 'form-control input-sm',
    'type' => 'number',
    'value' => set_value('dosage')
);
$unit = array(
    'name' => 'unit',
    'id' => 'unit',
    'placeholder' => 'Unité',
    'class' => 'form-control input-sm',
    'value' => set_value('unit')
);
$comment = array(
    'name' => 'comment',
    'id' => 'comment',
    'placeholder' => 'Commentaire',
    'class' => 'form-control input-sm',
    'value' => set_value('comment')
);

$rating = array(
    'id' => 'rating',
    'name' => 'rating',
    'type' => 'number',
    'class' => 'rating krajee-fa',
    'min' => '1',
    'max' => '5',
    'step' => '1',
    'data-size' => 'xs',
    'data-rtl' => 'false'
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
        $('#date').datetimepicker({
            sideBySide: true,
            format: 'YYYY-MM-DD HH:mm',
            locale: 'fr'

        });
        $('#sleeping').datetimepicker({
            sideBySide: true,
            format: 'HH:mm:ss',
            locale: 'fr'

        });

        $("#rating").rating();
        
        $("#tea").on('change',function(){
            
            var teas    = <?php echo json_encode($teas, JSON_PRETTY_PRINT); ?>;
            var tea_id      = this.value;

            for (var i=0, iLen=teas.length; i<iLen; i++) 
                if (teas[i].id == tea_id) 
                    var tea = teas[i];

            document.getElementById('sleeping').value    = tea.sleeping;
            document.getElementById('temperature').value = tea.temperature;
            
        });
    });
    
</script>


<div class="container">
    <?php echo validation_errors(); ?>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#add">Ajouter une entrée</a>
                </h4>
            </div>
            <div id="add" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo form_open('history/index', array()); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-2">
                                <?php echo form_input($date); ?>
                            </div>
                            <div class='col-xs-1'>
                                <?php echo form_label('Thé'); ?>
                            </div>
                            <div class='col-xs-3'>
                                <?php echo form_dropdown('tea', $tea_options, 'null', ' id="tea" class="form-control input-sm" '); ?>
                            </div>
                            <div class='col-xs-6'>
                                <?php echo form_input($comment); ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class='col-xs-2'>
                                <div class="input-group">
                                    <?php echo form_input($temperature); ?>
                                    <span class="input-group-addon" >°C</span>
                                </div>
                                
                            </div>
                            <div class='col-xs-2'>
                                <?php echo form_input($sleeping); ?>
                            </div>
                            <div class='col-xs-4'></div>    
                            <div class='col-xs-2'>
                                <?php echo form_input($dosage); ?>
                            </div>   
                            <div class='col-xs-2'>
                                <?php echo form_dropdown('unit', $unit_options, 'cs', "class='form-control input-sm'"); ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_label('Note : '); ?>
                                <input name="rate" type="hidden" class="rating" data-filled="fa fa-leaf" data-empty="fa fa-leaf symbol-empty"/>
                            </div>
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <?php echo form_label('Vide ? '); ?>
                                <?php echo form_checkbox('empty', '1'); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_fieldset_close(); ?>
                </div>
                <div class="panel-footer">
                    <?php echo form_button($send); ?>
                    <?php //echo anchor(site_url('mytea'),'Annuler',array('class'=>'btn btn-danger')); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>