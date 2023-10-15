<?php
include('includes\db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location:user_login.php");
} else {
  $user_id = $_SESSION['user_id'];
  $userindex_sql = "SELECT * from  student where id='$user_id' ";
  $userindex_query = mysqli_query($con, $userindex_sql);
  $userindex_data = mysqli_fetch_assoc($userindex_query);
  $user_name = $userindex_data['name'];
  $user_phone = $userindex_data['phone'];
  $user_email = $userindex_data['email'];
  $user_password = $userindex_data['password'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  <style>
    .userdetails{
      
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

        color: rgb(247, 248, 252);
    }

    .userdetails a{
      color: whitesmoke;
      font-size: 32px;
    }
    .navbar{
            padding: 3%;
            padding-bottom: 2%;
            

        }
        body{
          font-family: cursive;
         
        }
*{
  margin: 0;
          padding: 0;
}
        #header{
          text-align: left;
          /* margin-left: 20px; */
          margin-top: 50px;
         font-size: 50px;
        }
        .headicon{
          width: 40px;
          height: 40px;

        }
        
        .container{
          padding: 20px;
          padding-top: 7%;
          display: flex;
          align-items: center;
          column-gap: 15%;
          justify-content: space-around;
        }


  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
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
  <div class="container">
 
    <h2 id="header">Welcome <?php echo "$user_name "; ?>... <img class="headicon"src="https://d3sxshmncs10te.cloudfront.net/icon/free/svg/1570793.svg?token=eyJhbGciOiJoczI1NiIsImtpZCI6ImRlZmF1bHQifQ__.eyJpc3MiOiJkM3N4c2htbmNzMTB0ZS5jbG91ZGZyb250Lm5ldCIsImV4cCI6MTY5NzU4NzIwMCwicSI6bnVsbCwiaWF0IjoxNjk3MzUyNDM3fQ__.abebc594d68e26b0a4b15f49b4d2b9d6e82dd0e4c67e581f934f521f55f7df7c" alt=""> </h2>
    


  
    <div class="userdetails">
      <p>Name:<?php
          echo "$user_name "; ?>
      </p>
      <p>Phone Number: <?php
          echo" $user_phone";?> </p>
      <p>Email:  <?php
          echo " $user_email ";?></p>
     
     <a href="user_edit.php"><i class="fa-regular fa-pen-to-square"></i></a>
        

    </div>
  </div>
</body>

</html>