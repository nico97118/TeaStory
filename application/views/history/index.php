<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$elements = $this->history_model->get();
?>
<style>
    tr.divider{ border-top: 2px solid black; }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        
        $.fn.dataTable.moment('D/M H:m');
        
        $('#history').DataTable({
            "order": [[ 0, "desc" ]]
        }  
        );
        

        $("#rating").rating();
    });
    
    function confirmDelete() {
        return confirm('Etes vous sur de vouloir supprimer cette entrée');
    }
    
    function rate(history_id,e){
        var val = e.value;
        $.ajax({
         type: "POST",
         url: "<?php echo site_url('history/rate') ?>", 
         data: {
             'history_id':history_id,
             'user_id':<?php echo ($this->ion_auth->logged_in() ? $this->ion_auth->user()->row()->id : 'null') ; ?>,
             'rate':val
                },
         dataType: "JSON",  
         cache:false,
         success: 
            function(){alert('OK');}
        });
        return;
    }
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Suivi du thé</h1>

                <table id="history" class="table table-striped">
                    <thead class='thead-inverse'>
                        <tr>
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Dosage</th>
                            <th>Temperature</th>
                            <th>Durée</th>
                            <th>Commentaire</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($elements as $element) : ?>
                            <tr>
                                <td>
                                    <?php echo date('d/m G:i', strtotime($element->date)); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($element->name, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($element->dosage, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($element->unit, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($element->temperature, ENT_QUOTES, 'UTF-8') . ' °C'; ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($element->sleeping, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($element->comment, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php if($element->rate > 0 ): ?>
                                    <span class="badge"><?php echo round($element->rate, 2) ?> <i class="fa fa-leaf"></i></span>
                                    <?php else : ?>
                                    <span class="badge">- <i class="fa fa-leaf"></i></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($this->ion_auth->logged_in()): ?>
                                    <strong>Noter :</strong>  <input name="rating" value="<?php echo $this->history_model->get_user_vote($this->ion_auth->user()->row()->id,$element->id); ?>" onchange="rate(<?php echo $element->id ?>,this);" type="hidden" class="rating" data-filled="fa fa-leaf" data-empty="fa fa-leaf symbol-empty"/>
                                    <?php endif; ?>
                                    <?php if($this->ion_auth->is_admin()): ?>
                                    <a id="delete" class="btn btn-default pull-right" onclick="return confirmDelete();" href="<?php echo site_url("history/delete/$element->id") ?>"><i class="fa fa-trash"></i></a>
                                     <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>