<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login Registration</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

  <span>
    <div class="container">
      <!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="form-signin">
        <!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4">
          <!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
          <div>
            <div>
              <h3 class="form-signin-heading">Please do Registration here</h3>
            </div>
            <div>

              <?php
              if($this->session->flashdata('error_msg')){
            ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_msg'); ?>
              </div>
            <?php   
              }
            ?>

              <form role="form" method="post" action="<?php echo site_url('register/register_user'); ?>">
                <fieldset>
                  <div>
                    <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus required>
                  </div>

                  <div>
                    <input class="form-control" placeholder="Please enter E-mail" name="user_email" type="email" 
                      autofocus required>
                  </div>
                  <div>
                    <input class="form-control" placeholder="Enter Password" name="user_password" type="password"
                      value="" required>
                  </div>

                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="register">

                </fieldset>
              </form>
              <center><b>You have Already registered ?</b> <br></b><a href="<?php echo site_url('login'); ?>">
                  Please Login</a></center>
              <!--for centered text-->
            </div>
          </div>
        </div>
      </div>
    </div>

  </span>

</body>

</html>
