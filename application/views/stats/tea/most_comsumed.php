<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h4>Les plus préparés</h4>
<ul class="list-group">
    <?php
    $most_prepared = $this->stats_model->top('counter', 5);
    $it = 1;
    foreach ($most_prepared as $tea) :
        ?>
        <li class="list-group-item"><span class="badge"><?php echo $tea->counter ?></span><?php echo $it . '. ' . $tea->name ?></li>    
            <?php
            $it++;
        endforeach;
        ?>
</ul>