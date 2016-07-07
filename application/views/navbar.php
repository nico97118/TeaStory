<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tea Story</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url()?>">Accueil</a></li>
      <li><a href="<?php echo site_url('mytea')?>">Mes thés</a></li>
      <li><a href="#">Story</a></li>
      <li><a href="#">Stats</a></li>
    </ul>
  </div>
</nav>

<?php
foreach (array('success', 'danger', 'warning', 'info') as $alert):
    if ($this->session->flashdata($alert))
        echo show_alert($alert, $this->session->flashdata($alert));
endforeach;
?>
