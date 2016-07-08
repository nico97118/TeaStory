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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        
    <!-- DataTables -->
	<link href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
	<script src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
        
        <link href="<?php echo css_url('dataTable.bootstrap.css') ?>" rel="stylesheet">
        <script src="<?php echo js_url('dataTable.bootstrap.js');?>"></script>
        
    <!-- Bootstrap -->
    <link href="<?php echo css_url('bootstrap.min.css') ?>" rel="stylesheet">

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
    
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo js_url('bootstrap.min.js');?>"></script>
    
    <script type="text/javascript" src="<?php echo js_url('moment-with-locales.js');?>"></script>
    <script type="text/javascript" src="<?php echo js_url('bootstrap-datetimepicker.min.js');?>"></script>
    
  </body>
</html>

