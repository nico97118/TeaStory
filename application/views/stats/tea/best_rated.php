<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h4>Les mieux notés</h4>
<ul class="list-group">
    <?php
    $best_rated = $this->stats_model->top('rate_avg', 5);
    $it = 1;
    foreach ($best_rated as $tea) :
        ?>
        <li class="list-group-item"><span class="badge"><?php echo round($tea->rate_avg, 2) ?><i class="fa fa-leaf"> </i></span><?php echo $it . '. ' . $tea->name ?></li>    
            <?php
            $it++;
        endforeach;
        ?>
</ul>
