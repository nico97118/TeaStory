<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!isset($filter))
    $filter = 'none';

switch ($filter):
    case 'available':
        $this->db->where('empty', 0);
        break;
    case 'empty':
        $this->db->where('empty', 1);
        break;
    default:
        break;
endswitch;

$teas = $this->db->get('tea_store')->result();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mes thés</h1>


                <ul class="nav nav-tabs">
                    <li <?php if($filter=='none') : ?> class='active' <?php endif; ?>>
                        <a href="<?php echo site_url('mytea'); ?>">Tout <span class="badge"><?php echo $this->mytea_model->count(); ?></span></a>
                    </li>
                    <li <?php if($filter=='available') :?>class='active' <?php endif; ?>>
                        <a href="<?php echo site_url('mytea/index/available'); ?>">En stock <span class="badge"><?php echo $this->mytea_model->count(false); ?></span></a>
                    </li>
                    <li <?php if($filter=='empty'): ?>class='active' <?php endif; ?>>
                        <a href="<?php echo site_url('mytea/index/empty'); ?>">Vide <span class="badge"><?php echo $this->mytea_model->count(true); ?></span></a>
                    </li>
                </ul>

                <table id="teas" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Note</th>
                            <th>Temperature</th>
                            <th>Durée</th>
                            <th>Vendeur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teas as $tea) { ?>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($tea->name, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($tea->type, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <input value="<?php echo $this->mytea_model->avg_rate($tea->id) ?>" type="hidden" class="rating" data-filled="fa fa-leaf" data-empty="fa fa-leaf symbol-empty" readonly/>
                                    <span class="label label-default"><?php echo $this->mytea_model->avg_rate($tea->id) ?></span>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($tea->temperature, ENT_QUOTES, 'UTF-8') . ' °C'; ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($tea->sleeping, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($tea->seller, ENT_QUOTES, 'UTF-8'); ?>
                                </td>
                                <td>
                                    <a class="btn btn-default" href="<?php echo site_url("mytea/edit/$tea->id") ?>"><i class="fa fa-pencil"></i></a>  
                                    <a class="btn btn-default" href="<?php echo site_url("mytea/delete/$tea->id") ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p>
                    <?php echo anchor(site_url('mytea/add'), 'Ajouter un thé', array('class' => 'btn btn-success')); ?>
                </p>
