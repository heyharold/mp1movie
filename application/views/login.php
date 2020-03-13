<!DOCTYPE html>
<html>
<head>
	<title>LOGIN IN HARLIE MOVIES</title>
</head>
<body>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <style class="cp-pen-styles"></style>
  <script type="text/javascript" src="https://use.fontawesome.com/releases/v5.10.2/js/conflict-detection.js"></script>
<div>
	<!-- Default form subscription -->
<!-- Material form subscription -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
       <!-- <i class="fa fa-login"></i>  -->LOGIN
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="<?php echo base_url()."Create/verify" ?>" method="POST">

            <h1>HARLIE MOVIES FREE</h1>

            <p>
                <a href="" target="_blank">See the last newsletter</a>
            </p>

            <!-- Name -->
            <div class="md-form mt-3">
                <input type="text" id="materialSubscriptionFormPasswords" class="form-control" name="username">
                <label for="materialSubscriptionFormPasswords">Username</label>
            </div>

            <!-- E-mai -->
            <div class="md-form">
                <input type="password" id="materialSubscriptionFormEmail" class="form-control" name="password">
                <label for="materialSubscriptionFormEmail">Password</label>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="login_submit">Sign in</button>

        </form>
        <!-- Form -->
            <?php  echo anchor('register', 'Sign up', 'class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"'); ?>
    </div>

</div>
<!-- Material form subscription -->
<!-- Default form subscription -->
</div>
</body>
</html>