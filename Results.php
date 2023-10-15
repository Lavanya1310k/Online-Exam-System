<?php
include('includes\db.php');
session_start();
if(isset($_GET['exam_id'])){
    $eid=$_GET['exam_id'];
    $uid=$_SESSION['user_id'];
    $sql="SELECT * from student where id=$uid";
    $query=mysqli_query($con,$sql);
    if(mysqli_num_rows($query)>0){
        $udata=mysqli_fetch_assoc(($query));
        $uname=$udata['name'];
    }
    $esql="SELECT * from exams where examid=$eid";
    $equery=mysqli_query($con,$esql);
    if(mysqli_num_rows($equery)>0){
        $edata=mysqli_fetch_assoc(($equery));
        $ename=$edata['examname'];
    }
    $msql="SELECT * from exam1 where exam_id=$eid  and std_id=$uid";
    $mquery=mysqli_query($con,$msql);
    if(mysqli_num_rows($mquery)>0){
        $mdata=mysqli_fetch_assoc($mquery);
        $marks=$mdata['std_marks'];
    }

    

}
else{
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .results{
      
      width: 400px;
      height: 250px;
      background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);
      /* border: 1px solid blue; */
      background-image: linear-gradient(to top, #48c6ef 0%, #6f86d6 100%);
      color: whitesmoke;
      text-align: left;
      padding-left: 20px;
      padding-top: 20px;
      border-radius: 7px;
      font-size: 17px;
      display: flex;
      flex-direction: column;
      row-gap: 10px;
      margin-top: 10%;

  color: rgb(247, 248, 252);
}
.results a{
    border: 1px solid white;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;

}
span{
    color: wheat;
    font-size: 20px;
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
          <a class="nav-link" href="Exams.php"> Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allresults.php">Results</a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="user_reg.php">Register</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' style='color:red;' href='logout.php'>Log Out</a>

        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <center>
  <div class="results">
  <p>Exam Name  &nbsp;&nbsp;&nbsp;<span><b> <?php echo"$ename";  ?> </b></span></p>
  <p>Submitted by &nbsp;&nbsp;&nbsp; <span><b><?php echo"$uname";?></b></span> </p>
  <p>Marks Obtained &nbsp;&nbsp;&nbsp; <span><b><?php echo"$marks";?></b></span> </p>
  <center><a style="color: white;" href="index.php">Go to Home</a></center>
  </div>
  </center>
</body>
</html>