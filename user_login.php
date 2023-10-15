<?php
session_start();
include('includes\db.php');
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
//   echo "$user";
//   echo "$pass";
  $user_sql = "SELECT * from  student where `email` ='$user' and `password`='$pass' ";
  $user_query = mysqli_query($con, $user_sql);

  if (mysqli_num_rows($user_query)>0) {
    // 
    $user_data=mysqli_fetch_assoc($user_query);
    $user_id=$user_data['id'];
    $_SESSION['user_id']=$user_id;
    header("Location:index.php");
   

  } else {
    echo "<script>window.alert('Invalid User')</script>";
  }
}



?>

<!DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title>Login Here
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
html {   
    height: 100%;   
}  
body {   
    height: 100%;   
}  
.global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color: #f5f5f5;  
}  
form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title {   
font-weight: 300;  
 }  
.btn {  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form {   
    width: 330px;  
    margin: 20px;  
}  
.sign-up {  
    text-align: center;  
    padding: 20px 0 0;  
}  
.alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 20px;  
} 
.navbar{
            padding: 3%;
            padding-bottom: 1%;

        } 
</style>  

<body>  
<div class="pt-5">  
  <div class="global-container">  
    <div class="card login-form">  
    <div class="card-body">  
          
        <div class="card-text">  
            <form method="post">  
                <center><img width="100px" src="login logo.jpg"/></center>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Enter Email address </label>  
                    <input type="email" name="user" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">  
                </div>  
                <div class="form-group">  
                    <label for="exampleInputPassword1">Enter Password </label>  
                    <input type="password" name="pass" class="form-control form-control-sm" id="exampleInputPassword1">  
                    <a href="#" style="float:right;font-size:12px;"> Forgot password? </a>  
                </div>  
                <input type="submit" name="submit" class="btn btn-primary btn-block"/>  
                  
                <div class="sign-up">  
                    Don't have an account? <a href="user_reg.php"> Create One </a>  <br>
                    <a style="font-size: 15px; color: green;" href="index.php">Home</a>
                </div>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>