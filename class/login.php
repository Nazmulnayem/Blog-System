<?php

class Login{

    protected $connection;
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->connection){
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }
    
    public function admin_login_check($data){
        $password=md5($data['password']); 
        $sql = "SELECT * FROM tbl_admin WHERE email_address ='$data[email_address]' AND password='$password'";
        $query_result = mysqli_query($this->connection, $sql);
        $admin_info = mysqli_fetch_assoc($query_result);
        
       if($admin_info){
           
           session_start();
           $_SESSION['admin_id']=$admin_info['admin_id'];
           $_SESSION['admin_name']=$admin_info['admin_name'];
           
            header('Location: deshboard.php');
           
       }
        else {
            //session_start();
           //$_SESSION['message']='your user id and password not valid';
            $message = 'your user id and password not valid';
            return $message;
           //header('Location:index.php');
       }
    
}
public function admin_logout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header('Location: index.php');
    
}
}
