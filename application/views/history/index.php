<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$elements = $this->db->get('tea_history_view')->result();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Suivi du thé</h1>

            <table id="teas" class="table table-striped">
                <thead class='thead-inverse'>
                    <tr>
                        <th>Nom</th>
                        <th>Dosage</th>
                        <th>Temperature</th>
                        <th>Durée</th>
                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($elements as $element) { ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($element->name,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($element->dosage ,ENT_QUOTES,'UTF-8').' '.htmlspecialchars($element->unit,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($element->temperature,ENT_QUOTES,'UTF-8').' °C'; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($element->sleeping,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($element->comment,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("history/delete/$element->id") ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>