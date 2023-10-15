<?php
session_start();
include('..\includes\db.php');
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $log_sql = "SELECT * from  faculty where email='$user' and password='$pass' ";
  $log_query = mysqli_query($con, $log_sql);

  if (mysqli_num_rows($log_query)>0) {
    // 
    $log_data=mysqli_fetch_assoc($log_query);
    $fac_id=$log_data['id'];
    $_SESSION['fac_id']=$fac_id;
    header("Location:fac_dashboard.php");

  } else {
    echo "Error occured";
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Login
  </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>
</head>
<style>
  body {
    background-repeat: no-repeat;
    background-position: center;
    padding-top: 50px;
  }

  .login-form {
    background: skyblue;
    margin-top: 10px;
    margin-left: 80px;
    margin-bottom: 20px;
    padding: 50px;
    border-radius: 20px;
    color: white;
    box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
  }

  .login-heading {
    text-align: center;
    margin-top: 20px;
  }

  .btn-primary {
    width: 100%;
  }
</style>

<body>
  <h1 class="text-center"> Welcome..!</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="login-form">
          <form method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Enter Email address </label>
              <input style="width: 250px;" name="user" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted"> We'll never share your email with anyone else. </small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1"> Enter Password </label>
              <input style="width: 250px;" type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <!-- <div class="form-group form-check">  
                <input type="checkbox" class="form-check-input" id="exampleCheck1">  
                <label class="form-check-label" for="exampleCheck1"> Check me out </label>  
              </div>   -->
            <input style="width: 200px;" type="submit" name="submit" class="btn-primary" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
  </script>
</body>

</html>