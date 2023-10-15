<?php
session_start();
include('includes/db.php');
$user_id = $_SESSION['user_id'];
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Registration Form </title>
    <style>
        .navbar{
            padding: 3%;
            padding-bottom: 1%;

        }
body{
    font-family: cursive;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img style="width: 40px;" src="Logo.png" />
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Exams.php"> Exams <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Results</a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="user_reg.php">Register</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
    <div class="container register-form">
        <div style="margin-top: 50px;" class="form">
            <center>
                <h1>Edit Profile</h1>
                <?php
                $user_edit = "SELECT * from student where id=$user_id";
                $user_query = mysqli_query($con, $user_edit);
                $edit_data = mysqli_fetch_assoc($user_query);
                $name = $edit_data['name'];
                $phone = $edit_data['phone'];
                $email = $edit_data['email'];


                ?>
                <form method="post">
                    <div class="form-content">
                        
                            
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control w-50" placeholder="Your Name *" value="<?php echo "$name"; ?>" required />
                                </div><br>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control w-50" placeholder="Phone Number *" value="<?php echo "$phone"; ?>" required />
                                </div><br>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control w-50" placeholder="Email ID *" value="<?php echo "$email"; ?>" required />
                                </div><br>
</div> 
                        <br>
            </center>
            <center>
                <div class="row justify-content-start mt-4">
                    <div class="col">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                I hereby agree to the <a href="/"> Terms and Conditions. </a>
                            </label>
                        </div><br>
                        <input type="submit" name="submit" class="btnSubmit" />
                    </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $sql = "UPDATE student set name='$name', phone='$phone', email='$email' where id =$user_id ";
                        $user_query = mysqli_query($con, $sql);
                        if ($user_query) {
                            echo "<script>window.alert('Updated successfully')</script>";
                            echo "<script>window.open('user_edit.php')</script>";
                        } else {
                            echo "<script>window.alert('Error Occured')</script>";
                        }
                    }

                    ?>
                </div>
            </center>
        </div>
</body>

</html>