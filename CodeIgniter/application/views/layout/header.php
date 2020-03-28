<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
      <div class="row">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">PT21_WIM2018</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

              <ul class="nav navbar-nav">
                <!--ACCESS MENUS FOR ADMIN-->
                <?php if($this->session->userdata('level')==='1'):?>
                  <li><a href="<?php echo site_url('page');?>">Dashboard</a></li>
                  <!--<li><a href="#">Posts</a></li>-->
                  <li class="active"><a href="#">Manage Form</a></li>
                  <!--<li><a href="#">Media</a></li>-->
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <li><a href="<?php echo site_url('page/staff');?>">Dashboard</a></li>
                  <li class="active"><a href="#">Manage Form</a></li>
                  <!--<li><a href="#">Media</a></li>-->
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php else:?>
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Posts</a></li>
                <?php endif;?>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url('login/logout');?>">Sign Out</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>