<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
if(!isset($categorie))
        $categorie = 'home';
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tea Story</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if($categorie == 'home') echo 'class="active"'; ?>><a href="<?php echo site_url()?>">Accueil</a></li>
      <li <?php if($categorie == 'mytea') echo 'class="active"'; ?>><a href="<?php echo site_url('mytea')?>">Mes thés</a></li>
      <li <?php if($categorie == 'story') echo 'class="active"'; ?>><a href="#">Story</a></li>
      <li <?php if($categorie == 'stat') echo 'class="active"'; ?>><a href="#">Stats</a></li>
    </ul>
  </div>
</nav>

<?php
foreach (array('success', 'danger', 'warning', 'info') as $alert):
    if ($this->session->flashdata($alert))
        echo show_alert($alert, $this->session->flashdata($alert));
endforeach;
?>
