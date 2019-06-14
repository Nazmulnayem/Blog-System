<?php

session_start();
if(isset($_SESSION['admin_id'])){
    
    if($_SESSION['admin_id']!=NULL){
        header('Location: deshboard.php');
    }
}
$message = '';
if(isset($_POST['btn'])){
require_once'../class/login.php';
$login = new Login();
$message = $login->admin_login_check($_POST);
}
?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron/">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-offset-2 col-md-8">
                  
                  <div class="well" style="margin-top:230px; padding:50px;">
                      <h3 class="text-center text-success">Login form</h3>
                      <form class="form-horizontal" action="" method="POST">
                          <div class="form-group">
                              <label class="control-label col-md-3">Email Address</label>
                              <div class="col-md-9">
                                  <input type="email" name="email_address" required class="form-control">
                                  
                              </div>
                          </div>                       
                          <div class="form-group">
                              <label class="control-label col-md-3">Password</label>
                              <div class="col-md-9">
                                  <input type="password" name="password" required class="form-control">
                                  
                              </div>
                          </div>                       
                          <div class="form-group">
                              
                              <div class="col-md-offset-3 col-md-9">
                                  <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"class="form-control">
                                  
                              </div>
                          </div>  
                        <h3 class="text-center text-danger"><?php echo $message; ?></h3>
                      </form>
                  </div>
              </div>              
          </div>
      </div>

   
    <script src="../asset/js/bootstrap.min.js"></script>
    
     </body>
</html>