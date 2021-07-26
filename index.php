<?php
include ("config.php");
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=base_name?></title>
    <link rel="favicon icon" href="<?=base_url?>assets/back/img/<?=favicon?>">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Jost:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/style-starter.css">
    
  </head>
  <body>
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark stroke">
        <h1>
          <a class="navbar-brand" href="index.php?menu=home">
            <span class="fa fa-align-right"></span>Toko Cahaya <span class="logo">Terlengkap dan Terpercaya</span></a>
        </h1>
  
        <!-- if logo is image enable this   
          <a class="navbar-brand" href="#index.html">
              <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
          </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>
        <!-- menu header -->
        <?php include "menu.php"; ?>
        
    </div>
  </header>
    <!-- konten -->
    
  <?php include "home.php";?>
<!-- footer -->
  <?php include "footer.php";?>