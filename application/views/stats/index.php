<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$teas = $this->mytea_model->get();
?>

<script src="<?php echo js_url('chart/highcharts.js'); ?>"></script>

<?php
$categories = array();
$data = array();
foreach ($teas as $tea) {
    array_push($categories, $tea->name);
    array_push($data, $this->stats_model->count_history($tea->id));
}

$height = 110 + count($categories) * 30;
?>
<script>
    $(function () {
        //alert(<?php echo json_encode($data); ?>);
        $('#count_graph').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Compteur de préparation'
            },
            xAxis: {
                categories: <?php echo json_encode($categories); ?>
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                    name: 'Compteur',
                    data: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                }]
        });
    });
</script>

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
                        <h4>Les mieux notés</h4>
                        <ul class="list-group">
                            <?php
                            $best_rated = $this->stats_model->top('rate_avg',5);
                            $it = 1;
                            foreach ($best_rated as $tea) :
                                ?>
                                <li class="list-group-item"><span class="badge"><?php echo round($tea->rate_avg, 2) ?><i class="fa fa-leaf"> </i></span><?php echo $it . '. ' . $tea->name ?></li>    
                                    <?php
                                    $it++;
                                endforeach;
                                ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Les plus préparés</h4>
                        <ul class="list-group">
                            <?php
                            $most_prepared = $this->stats_model->top('counter',5);
                            $it = 1;
                            foreach ($most_prepared as $tea) :
                                ?>
                                <li class="list-group-item"><span class="badge"><?php echo $tea->counter ?></span><?php echo $it . '. ' . $tea->name ?></li>    
                                    <?php
                                    $it++;
                                endforeach;
                                ?>
                        </ul>
                    </div>
                    
                    <div class="col-md-12">
                        <div id="count_graph" style="width: 80%;height: <?php echo $height; ?>px;"></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>