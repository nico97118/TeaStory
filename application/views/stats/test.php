<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo js_url('chart/highcharts.js');?>"></script>

<script>
$(function () { 
    $('#graph').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});    
</script>

<div id="graph" style="width:100%; height:400px;"></div>