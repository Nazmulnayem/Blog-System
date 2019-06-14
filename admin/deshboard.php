<?php
session_start();
if($_SESSION['admin_id']==NULL){
    header('Location: index.php');
    
}
if(isset($_GET['logout'])){
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
    
}
require_once'../class/blog.php';
    $blog = new Blog();
$message = '';
if (isset($_POST['btn'])) {
    
    $message = $blog->save_blog_info($_POST);
}
$blog->selectAllimageinfo();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
        <link href=""


    </head>
    <body>

        <div class="card text-center">
            <div class="card-header">

                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="deshboard.php">Home</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="deshboard.php">Add Blog<span class="sr-only">(current)</span></a></li>
                        <li><a href="manage.php">Manage Blog</a></li>
                        <li><a href="add_image.php">Add Image</a></li>

                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Welcome   <strong><?php echo $_SESSION['admin_name']?></strong></a></li>
                        <li><a href="?logout=logout">Logout</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->

        </div> 
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center text-success"><?php echo $message; ?></h3>
                        <div class="well">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="blog_title" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Author Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="author_name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Blog description</label>
                                    <div class="col-sm-10">
                                        <textarea  class="form-control" name="blog_description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Select Image</label>
                                    <div class="col-sm-10">
                                        <input type="file"  name="blog_image" multiple accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Publication Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="publication_status">
                                            <option>---select publication status---</option>
                                            <option value="1">published</option>
                                            <option value="0">unpublished</option>
                                           
                                            
                                        </select>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"name="btn" class="btn btn-success btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>




    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>

</body>
</html>