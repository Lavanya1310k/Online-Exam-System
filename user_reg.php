<?php
include("includes\db.php");
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  if ($pass != $cpass) {
    echo "<script>window.alert('Passwords does not match')</script>";
} else {
    $sql = "INSERT INTO student (name,password,email,phone) VALUES ('$name','$pass','$email','$phone')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "<script>window.alert('Inserted successfully')</script>";
    }
}
}

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Registration Form </title>
  <style>
    /* .note  
{  
    text-align: center;  
    height: 80px;  
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);  
    color: #fff;  
    font-weight: bold;  
    line-height: 80px;  
}  
body {  
  margin: 0;  
  font-family: 'Lato', sans-serif;  
  font-size: 12px;  
  line-height: 1.8em;  
  text-transform: none;  
  letter-spacing: .075em;  
  font-weight: bold;  
  font-style: normal;  
  text-decoration: none;  
  color: #e7bd74;  
  background-color: rgba(34,28,28);  
  display: block;  
}  
.title {  
  margin-top: 2rem;  
  margin-bottom: 1rem;  
}  
.form-content  
{  
    padding: 5%;  
    border: 1px solid #ced4da;  
    margin-bottom: 2%;  
}  
.form-control {  
    border-radius: 1.5rem;  
}  
.btnSubmit  
{  
    border: none;  
    border-radius: 1.5rem;  
    padding: 1%;  
    width: 20%;  
    cursor: pointer;  
    background: #0062cc;  
    color: #fff;  
}  
h1 {  
    font-family: sans-serif;  
  display: block;  
  font-size: 1rem;  
  font-weight: bold;  
  text-align: center;  
  letter-spacing: 3px;  
  color: hotpink;  
 text-transform: uppercase;  
padding-top: 20px;  
}  
a {  
  text-decoration: none;  
  color: #fff;  
}  
a:hover {  
  text-decoration: none;  
  color: #fff;  
}   */
body{
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.container{
  border: solid 1px whitesmoke;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
  border-radius: 9px;
  /* padding: 30px; */
  /* margin-top: 30px; */
  padding-bottom: 10px;

}
.note{
  margin-bottom: 30px;
}

.btnSubmit{
  background: rgb(65, 74, 74);
  width: 120px;
  height: 37px;
  border: none;
  border-radius: 9px;
  color: white;
}
  
  </style>
</head>

<body>

  <div class="container register-form">
    <div style="margin-top: 50px;" class="form">
      <center>
        <div class="note">
          <h1 style="margin-bottom: 80px;"> Register Here..! </h1>
        </div>
        <form method="post">

          <div class="form-content">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required/>
                </div><br>
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" placeholder="Phone Number *" value="" required/>
                </div><br>
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email ID *" value="" required/>
                </div><br>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="password" name="pass" class="form-control" placeholder="Your Password *" value="" required/>
                </div><br>
                <div class="form-group">
                  <input type="password" name="cpass" class="form-control" placeholder="Confirm Password *" value="" required/>
                </div>

              </div>
            </div><br>
      </center>
      <!-- <div class="row align-items-center mt-4">  
            <div class="col">  
              <input type="text" class="form-control" placeholder=" Enter Email Address">  
            </div>  
          </div> <div class="row align-items-center mt-4">  
            <div class="col">  
              <input type="text" class="form-control" placeholder=" Address">  
            </div>  
          </div>   -->
      <center>
        <div class="row justify-content-start mt-4">
          <div class="col">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                I hereby agree to the <a href="/"> Terms and Conditions. </a>
              </label>
            </div><br>
            <input type="submit" name="submit" class="btnSubmit"/>
          </div>
          </form>
        </div>
      </center>
    </div>
</body>

</html>