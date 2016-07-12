<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$elements = $this->db->order_by('date', 'desc')->get('tea_history_view')->result();
?>
<style>
    tr.divider{ border-top: 2px solid black; }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('#history').DataTable(  
        );
    });
    function confirmDelete() {
        return confirm('Etes vous sur de vouloir supprimer cette entrée');
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
                                    <input value="<?php echo $element->rate ?>" type="hidden" class="rating" data-filled="fa fa-leaf" data-empty="fa fa-leaf symbol-empty" readonly/>
                                </td>
                                <td>
                                    <?php if($this->ion_auth->is_admin()): ?>
                                    <a id="delete" class="btn btn-default" onclick="return confirmDelete();" href="<?php echo site_url("history/delete/$element->id") ?>"><i class="fa fa-trash"></i></a>
                                     <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>