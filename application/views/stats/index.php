<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    .list-group-item {padding: 3px 10px}
</style>

<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#tea_panel">Les thés</a>
                </h4>
            </div>
            <div id="tea_panel" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php $this->load->view('stats/tea/best_rated'); ?>
                    </div>
                    <div class="col-md-6">
                       <?php $this->load->view('stats/tea/most_comsumed'); ?>
                    </div>
                    
                    <div class="col-md-6">
                       <?php $this->load->view('stats/tea/pie_type'); ?>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#comsumption_panel">Consommation</a>
                </h4>
            </div>
            <div id="comsumption_panel" class="panel-collapse collapse in">
                <div class="panel-body">
                    
                    <div class="col-md-12">
                       <?php $this->load->view('stats/consumption/comsumption_graph'); ?>
                    </div> 
                    
                    <div class="col-md-12">
                       <?php $this->load->view('stats/consumption/month_recap_graph'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
    </div>
</div>