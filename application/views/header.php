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
  <title>Hello, world!</title>
</head>
<body>

	<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4><a href="<?php echo base_url();  ?>" class="text-white, btn btn-primary">HARLIE</a></h4>
      <span class="text-muted">Movies for free.</span><br>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle, text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-database"> Database </i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo anchor('Create/read_all_films' , 'Films', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/read_all_actors' , 'Actor', 'class="dropdown-item"'); ?>
          <a class="dropdown-item" href="#">Producer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">click to login</a>
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle, text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-edit"> Cre/Up/Del </i> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php echo anchor('Create/films' , 'Film', 'class="dropdown-item"'); ?>
          <?php echo anchor('Create/actor' , 'Actor', 'class="dropdown-item"'); ?>
          <a class="dropdown-item" href="#">Producer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">click to login</a>
        </div>
      </li>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span>HARLIE</span>
    </button>
      <a href="#" class="text-white"><i class="fa fa-unlock">     LOGIN    </i></a>
  </nav>
</div>