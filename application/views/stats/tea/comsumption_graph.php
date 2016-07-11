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

<div id="count_graph" style="width: 80%;height: <?php echo $height; ?>px;"></div>