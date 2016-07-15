<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('display_error')){
    function display_error($error){
        if(!empty($error)){
            $message = "<div class=\"alert alert-danger\">\n";
            $message .= "<strong>Erreurs :</strong><br>\n";
            $message .= $error;
            $message .= "</div>\n";
            return $message;
        }
    }
}