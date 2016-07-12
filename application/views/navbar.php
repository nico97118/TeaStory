<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($categorie))
    $categorie = 'home';
?>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">Tea Story <i class="fa fa-leaf"></i></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
             <li <?php if ($categorie == 'home') echo 'class="active"'; ?>><a href="<?php echo site_url() ?>">Accueil</a></li>
              <li <?php if ($categorie == 'mytea') echo 'class="active"'; ?>><a href="<?php echo site_url('mytea') ?>">Mes thés</a></li>
              <li <?php if ($categorie == 'history') echo 'class="active"'; ?>><a href="<?php echo site_url('history') ?>">Suivi</a></li>
              <li <?php if ($categorie == 'stats') echo 'class="active"'; ?>><a href="<?php echo site_url('stats') ?>">Stats</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <?php if ($this->ion_auth->is_admin()): ?>
              <li <?php if ($categorie == 'auth') echo 'class="active"';?>><a href="<?php echo site_url('auth') ?>">Administration <i class='fa fa-gear'></i></a></li>
              <?php endif; ?>
              <li><?php if ($this->ion_auth->logged_in()): ?>
                  <a href="<?php echo site_url('auth/logout') ?>">Se déconnecter <i class='fa fa-sign-out'></i></a>
                  <?php else : ?>
                  <a href="<?php echo site_url('auth/login') ?>">Se connecter <i class='fa fa-sign-in'></i></a>
                  <?php endif; ?>
              </li>
              <li><?php echo $this->config->item('version')?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php
foreach (array('success', 'danger', 'warning', 'info') as $alert):
    if ($this->session->flashdata($alert))
        echo show_alert($alert, $this->session->flashdata($alert));
endforeach;
?>
