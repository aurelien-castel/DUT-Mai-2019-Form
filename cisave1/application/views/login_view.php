<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php
          if($this->session->flashdata('success_msg')){
        ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('success_msg'); ?>
          </div>
        <?php   
        
          }
        ?>


        <?php
          if($this->session->flashdata('error_msg')){
        ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error_msg'); ?>
          </div>
        <?php   
          }
        ?>
        <label for="username" class="sr-only">Username</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <center><b>You are not registered ?</b> <br>
          <a href="<?php echo site_url('register'); ?>">Register here</a> <br>
          <p>Or</p>
        </center>
        <!--for centered text-->

      </form>

      <form action="<?php echo site_url('login/auth_reponse')?>" method="post">
        <input type="text" name="form_password" class="form-control" placeholder="Form password" required>
        <p>
          Enter the password above and access to the form
        </p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Answer a form here</button>
        <p> </p>
        <p>
          You can also go directly to the form by entering the url has folow: /the current url/?cle=yourkeyhere 
        </p>
      </form>

    </div>
  </div> <!-- /container -->


</body>

</html>