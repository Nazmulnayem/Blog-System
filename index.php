<?php

require_once './class/application.php';
$application =new Application();
$query_result=$application->allPublishedBlogInfo();
$blog_info = mysqli_fetch_assoc($query_result);
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

    <title>Innovation Geeks Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/dist/css/bootstrap.min.css" rel="stylesheet">

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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Innovation Geek Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#">Problem Solving <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Motivation</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Programming languages
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">PHP</a>
                      <a class="dropdown-item" href="#">python</a>

                      <a class="dropdown-item" href="#">Javascript</a>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link " href="#">About me</a>
              </li>
          </ul>

      </div>
  </nav>
  <div class="jumbotron">
      <div class="container">

      </div>
  </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
      <!-- Example row of columns -->
      
      <div class="row">
           <?php while ($blog_info = mysqli_fetch_assoc($query_result)) { 
                                ?>
        <div class="col-md-12 text-center">
           
            <h2><?php echo $blog_info['blog_title']; ?><small>-<?php echo $blog_info['author_name']; ?></small></h2>
            <img  src="admin/<?php echo $blog_info['blog_image']; ?>" alt="" style="height: 500px;width:450;"  />
            <p><?php echo mb_substr($blog_info['blog_description'],0,300)?></p>
          <p><a class="btn btn-default" href="blog_details.php?id=<?php echo $blog_info['blog_id']; ?>&&title<?php echo $blog_info['blog_title']; ?>" role="button">View details &raquo;</a></p>
         
        </div>
         <?php }?> 
      </div>
        
      

      <footer>

        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div>


  <script src="asset/dist/js/jquery-3.3.1.min.js"></script>
  <script src="asset/dist/js/bootstrap.min.js"></script>

  </body>
</html>