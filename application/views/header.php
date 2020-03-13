<?php //session_start();  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <!-- Bootstrap CSS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <style class="cp-pen-styles"></style>
  <script type="text/javascript" src="https://use.fontawesome.com/releases/v5.10.2/js/conflict-detection.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <title>Hello, world!</title>
</head>
<body>

      <?php  //if($this->session->userdata('username') == null) {
         //echo "<script> location.replace(\"".base_url()."Create/login\");</script>";;
      //}else { ?>
	<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4><?php echo anchor(''.base_url().'',"HARLIE","class=text-white btn btn-primary");?></h4>
        <?php //} ?>
      <span class="text-muted">Movies for free.</span><br>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle, text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-database"> Database </i>
        </a>
        <?php if(!isset($_SESSION['username'])){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="visibility: hidden">
          <?php echo anchor('Create/read_all_films' , 'Films', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/read_all_actors' , 'Actor', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/read_all_prods' , 'Producer', 'class="dropdown-item"'); ?>
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#">click to login</a> -->
        </div><?php }else{ ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo anchor('Create/read_all_films' , 'Films', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/read_all_actors' , 'Actor', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/read_all_prods' , 'Producer', 'class="dropdown-item"'); ?>
          <div class="dropdown-divider"></div><?php } ?>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle, text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-edit"> Cre/Up/Del </i> 
        </a>
        <?php if(!isset($_SESSION['username'])){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="visibility: hidden">
          <?php echo anchor('Create/films' , 'Film', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/actor' , 'Actor', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/producer' , 'Producer', 'class="dropdown-item"'); ?>
          <div class="dropdown-divider"></div>
        </div><?php }else{ ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo anchor('Create/films' , 'Film', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/actor' , 'Actor', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/producer' , 'Producer', 'class="dropdown-item"'); ?>
          <div class="dropdown-divider"></div><?php } ?>
          <!-- <a class="dropdown-item" href="#">click to login</a> -->
        </div>
      </li>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span>HARLIE</span>
    </button>
<!--       <a href="<?php //echo base_url()."Create/login"; ?>" class="text-white"><i class="fa fa-unlock">     LOGIN    </i></a> -->
    <?php if(!isset($_SESSION['username'])) {
      ?>
          <?php echo anchor('Create/login' , '<i class="fa fa-unlock fa-2x">LOGIN</i>', 'class="navbar text-white"'); ?>
         <i class="navbar fa fa-shopping-cart fa-2x text-white"></i>
    <?php } else { ?>
          <?php echo anchor('Create/logout' , '<i class="fa fa-unlock fa-2x">LOGOUT</i>', 'class="text-white"'); ?>
          <?php echo anchor('carts', '<i class="fa fa-shopping-cart fa-2x"></i><span class="badge badge-danger">'.$_SESSION['qty'].'</span>', 'class="text-white"' ); ?>
    <?php } ?>
  </nav>
</div>