<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$teas = $this->mytea_model->get();

?>

<script src="<?php echo js_url('chart/highcharts.js'); ?>"></script>

<script type="text/javascript">
    $(function () {
    $('#month_recap_graph').highcharts({
    chart: {
    type: 'spline'
    },
            title: {
            text: 'Recapitulatif des thés consommés'
            },
            subtitle: {
            text: ' ces 30 derniers jours'
            },
            xAxis: {
            type: 'datetime',
                    dateTimeLabelFormats: {// don't display the dummy year
                    month: '%e. %b',
                            year: '%b'
                    },
                    title: {
                    text: 'Date'
                    }
            },
            yAxis: {
            title: {
            text: 'compteur'
            },
                    min: 0
            },
            tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e. %b}: {point.y:.f}'
            },
            plotOptions: {
            spline: {
            marker: {
            enabled: true
            }
            }
            },
            series: [
<?php
$i=0;
$lenght = count($teas);
foreach ($teas AS $tea):
    $recap = $this->stats_model->tea_recap_count($tea->id, 30);
    ?>
                {
                name: '<?php echo $tea->name; ?>',
                        // Define the data points. All series have a dummy year
                        // of 1970/71 in order to be compared on the same x axis. Note
                        // that in JavaScript, months start at 0 for January, 1 for February etc.
                        data: [
    <?php
    $date = strtotime("-30 days");
    $end = strtotime("Now");
    while ($date <= $end):
        ?>
                            [Date.UTC(<?php echo date('Y', $date); ?>, <?php echo date('m', $date)-1; ?>, <?php echo date('d', $date); ?>), <?php echo $this->stats_model->count_day($tea->id, date('Y-m-d', $date)); ?>]
                            <?php echo (strtotime($date)!=$end?',':'');?>

        <?php
        $date = strtotime("+1 day", $date);
    endwhile;
    ?>
                        ]
                }
<?php if($i!=$lenght-1) echo ',';
$i++; endforeach; ?>
            ]
    });
    });
</script>

<div id="month_recap_graph" style="width: 80%;height: <?php echo 200; ?>px;"></div>