<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$teas = $this->mytea_model->get();
$types = $this->config->item('types');
?>

<script src="<?php echo js_url('chart/highcharts.js'); ?>"></script>

<script type="text/javascript">
    $(function () {
    $('#pie_type').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Types de thés'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:f}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Types',
            colorByPoint: true,
            data: [
                <?php 
            $it= 0;
            $lenght = count($types);
            foreach($types AS $short_name => $full_name) : ?>
                        {
                name: '<?php echo $full_name?>',
                y: <?php echo count($this->mytea_model->get_type($short_name)); ?>
                        }
                
        <?php  echo ($it!=$lenght-1?',':'');
        $it++;
        endforeach; ?>
                ]
                }]
                });
});
</script>

<div id="pie_type" style="width: 100%;height: <?php echo 300; ?>px;"></div>

