<?php

if(!function_exists('show_alert')){
    function show_alert($alert_type,$alert_message){
               
        $message = null;
        $alert = array('success' => '<i class="fa fa-check"></i>',
                        'info'  =>  '<i class="fa fa-exclamation-circle"></i>', 
                        'warning'  =>  '<i class="fa fa-exclamation-triangle"></i>',
                        'danger'  =>  '<i class="fa fa-exclamation-triangle"></i>',
        );
        
        $message .= '<div class="alert alert-'.$alert_type.' fade in"> ';
        $message .= '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        $message .= '    <strong>'. $alert[$alert_type].'</strong> ';
        $message .= $alert_message;
        $message .= '</div>';
        
        return $message;
    }
}