<?php

$message = '';
require_once'../class/blog.php';
$blog = new Blog();
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $message = $blog->delete_blog_info($id);
}

$query_result = $blog->select_blog_info();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>view student</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">

        <script>
            function checkDelete(){
            var check=confirm('Are you sure to delete this !');
            if(check){
                return ture;
            }else{
                return false;
            }
        }
            </script>

    </head>
    <body>
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">Mess Managment</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    <form class="navbar-form navbar-left" action method="post" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="btn">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success"></h3>
                    <div class="well">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Blog No</th>
                                <th>Blog Title</th>
                                <th>Auther name</th>
                                
                                <th>Blog_description</th>
                                <th>publication status</th>
                                <th>Go</th>
                                
                            </tr>
                            <?php while ($blog_info = mysqli_fetch_assoc($query_result)) { 
                                ?>
                                <tr>
                                    <td><?php echo $blog_info['blog_id']; ?></td>
                                    <td><?php echo $blog_info['blog_title']; ?></td>
                                    <td><?php echo $blog_info['author_name']; ?></td>
                                    
                                    <td><?php echo $blog_info['blog_description']; ?></td>
                                    <td><?php echo $blog_info['publication_status']; ?></td>
                                    <td><a href="edit_blog.php?id=<?php echo $blog_info['blog_id']; ?>" class="btn btn-success" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>                                 
                                        </a>
                                        <a href="?delete=<?php echo $blog_info['blog_id']; ?>" class="btn btn-danger" title="Delete" onclick="return checkDelete();">
                                            <span class="glyphicon glyphicon-trash"></span>                                 
                                        </a></td>
                                    
                                </tr>     
                            <?php }?> 
                        </table>    
                    </div>
                </div>
            </div>
        </div>



        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>