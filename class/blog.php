<?php

class Blog{
    protected $connection;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    public function save_blog_info($data){
        $image_url=$this->save_image_info();


        $sql = "INSERT INTO tbl_blog(blog_title,author_name,date,blog_description,blog_image,publication_status)"
                ."VALUES('$data[blog_title]','$data[author_name]','$data[date]','$data[blog_description]','$image_url','$data[publication_status]')";

        if (mysqli_query($this->connection, $sql)) {
            $message = 'blog info save successfully';
            return $message;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }
    
    public function select_blog_info() {
        $sql = "SELECT * FROM tbl_blog ORDER BY blog_id DESC";
       
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
        
    }
    
  
    public function select_blog_info_by_id($blog_id) {
        $sql = "SELECT * FROM tbl_blog WHERE blog_id='$blog_id'";
        
            
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }
     public function update_blog_info($data){
        $sql ="UPDATE tbl_blog SET blog_title = '$data[blog_title]',author_name = '$data[author_name]',date='$data[date]',blog_description = '$data[blog_description]' WHERE blog_id='$data[blog_id]'";

        if (mysqli_query($this->connection, $sql)) {
             header('Location: manage.php');
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }
     public function delete_blog_info($id) {
       $sql="DELETE FROM tbl_blog WHERE blog_id='$id'";

        if(mysqli_query($this->connection, $sql)) {
            header('Location: manage.php');
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
    }
    public function save_image_info(){
       $image_name = $_FILES['blog_image']['name'];
       $directory ='../asset/blog_image/';
        $image_url=$directory.$image_name;
        
        $image_type = pathinfo($image_name,PATHINFO_EXTENSION);
        $IMAGE_SIZE=$_FILES['blog_image']['size'];
        $check = getimagesize($_FILES['blog_image']['tmp_name']);
        if($check){
            
            if(file_exists($image_url)){
                die('this file exits already');
            }else{
                if($IMAGE_SIZE > 50000){
                    die('file size is too long');
                }
                else{
                    if($image_type!='jpg' && $image_type!='png'){
                        die('file type not valid.please use jpg or png');
                    }
                    else{
                        move_uploaded_file($_FILES['blog_image']['tmp_name'],$image_url);
                        return $image_url;
                    }
                }
                
            }
            
            
        }
        else{
            die('this is not an imasge');
        }
        
        
        
    }
    public function selectAllimageinfo() {
        $sql = "SELECT * FROM tbl_image";
        
            
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('query problem' . mysqli_error($this->connection));
        }
        
    }
    
    

}


