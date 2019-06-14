<?php

$blog_id = $_GET['id'];
require_once '../class/blog.php';
$blog = new Blog();
$query_result = $blog->select_blog_info_by_id($blog_id);
$blog_info = mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])) {
    $blog->update_blog_info($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
       


    </head>
    <body>

        <div class="card text-center">
           
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center text-success"></h3>
                        <div class="well">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="blog_title" value="<?php echo $blog_info['blog_title']; ?>" required>
                                        <input type="hidden" class="form-control" name="blog_id" value="<?php echo $blog_info['blog_id']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Author Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="author_name"value="<?php echo $blog_info['author_name']; ?>" required>
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Blog description</label>
                                    <div class="col-sm-10">
                                        <textarea  class="form-control" name="blog_description" > <?php echo $blog_info['blog_description']; ?> </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">publication_status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="publication_status" value="<?php echo $blog_info['publication_status'];?>"
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