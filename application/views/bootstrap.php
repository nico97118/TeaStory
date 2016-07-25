<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tea Story</title>
    
    <!-- jQuery + plugins -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        
    <!--Moment.js-->
        <script type="text/javascript" src="<?php echo js_url('moment-with-locales.js');?>"></script>
          
    <!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/DataTables/datatables.min.css');?>"/>
        <script type="text/javascript" src="<?php echo site_url('assets/DataTables/datatables.min.js');?>"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
    
    <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--   Loading Font Awesome   -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link href="<?php echo css_url('teastory.css') ?>" rel="stylesheet">
    <link href="<?php echo css_url('bootstrap-datetimepicker.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/> 
    
    
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo js_url('bootstrap.min.js');?>"></script>
    
   
    <script type="text/javascript" src="<?php echo js_url('bootstrap-datetimepicker.min.js');?>"></script>
    
  </body>
</html>

