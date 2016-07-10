<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo img_url('home1.jpg') ?>" alt="Chania">
      <div class="carousel-caption">
        <h3>Malaysia :Cameroun Highland</h3>
      </div>
    </div>

    <div class="item">
      <img src="<?php echo img_url('home2.jpg') ?>" alt="Chania">
      <div class="carousel-caption">
        <h3>Japan Traditional Tea</h3>
      </div>
    </div>

    <div class="item">
      <img src="<?php echo img_url('home3.jpg') ?>" alt="Flower">
      <div class="carousel-caption">
        <h3>Flower in the pot</h3>
      </div>
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>