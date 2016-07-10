<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$teas = $this->db->get('tea_store')->result();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mes thés</h1>

            <table id="teas" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Temperature</th>
                        <th>Durée</th>
                        <th>Vendeur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teas as $tea) { ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($tea->name,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($tea->type,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($tea->temperature,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($tea->sleeping,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($tea->seller,ENT_QUOTES,'UTF-8'); ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("mytea/edit/$tea->id") ?>"><i class="fa fa-wrench"></i></a><br/>
                                <a href="<?php echo site_url("mytea/delete/$tea->id") ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p><?php echo anchor('mytea/add',"Ajouter un thé")?></p>