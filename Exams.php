<?php
include('includes\db.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:user_login.php");
}
$uid=$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        .exams {
            padding-top: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 40px;
        }
        .userdetails{
      
      width: 400px;
      height: 250px;
      border: 1px solid blue;
      text-align: left;
      padding-left: 20px;
      padding-top: 20px;
  
}
/* #examname{
   font-size: 40px;
} */
.ename{
    /* padding-left: 170px; */
    font-size: 60px;
    text-transform: uppercase;
    font-weight: 30px;
    
}

.atts{
    font-weight: 250px;
    font-size: 20px;
    display: flex;
    flex-direction: column;
    /* align-items: center; */
    justify-content: center;
    row-gap: 2px;
    
}
#btn{
    border: 1px solid silver;
    padding: 10px;
    
    display: flex;
    align-items: center;
    justify-content: center;
    /* margin-top: 28px; */
   border-radius: 8px;
    
}




        .exam {
            
            
            column-gap: 65%;
           
            padding-bottom: 30px;
            padding-top: 40px;
            padding-left: 30px;
            width: 90%;
            height: 180px;
            /* border: 1px solid blue; */
            /* display: flex; */
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            /* align-items: center;
            justify-content: center; */
            /* flex-direction: column; */
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: space-around;
            column-gap: 6%;
            padding-right: 30px;
            border-radius: 5px;
            
        }
        a{
            color: black;
            text-decoration: none;
        }
        a:hover{
            /* background-color: wheat; */
            text-decoration: none;

        }
        #Eavail{
            margin-top: 30px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 50px;
            text-transform: capitalize;
            color: #0c0b0bd7;

        }
        .navbar{
            padding: 3%;
            padding-bottom: 1%;

        }
    </style>
</head>

<body>
<nav  class="navbar navbar-expand-lg navbar-light bg-light">
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
    <h3 id="Eavail">Exams Available </h3>
    <div class="exams">
        <?php
        $exam_query = "SELECT * from exams ";
        $exam_lavs = mysqli_query($con, $exam_query);
        while ($row = mysqli_fetch_assoc($exam_lavs)) {
          $eid=$row['examid'];
          $masql="SELECT * from exam1 where exam_id=$eid  and std_id=$uid";
          $maquery=mysqli_query($con,$masql);
          if(mysqli_num_rows($maquery)>0){
            echo " <div class='exam'>
                        
            <div class='exname'><label> <p class='ename'>{$row['examname']}</p></label><br></div>
            <div class='atts'><label class='att'><b>Questions </b>{$row['noofques']}</label>
            <label class='att'><b>Duration </b>{$row['exam_dur']}</label>
            <a id='btn' href='#'>Already Submitted</a></div>
           
            </div>";

          }
          else{
            echo " <div class='exam'>
                        
            <div class='exname'><label> <p class='ename'>{$row['examname']}</p></label><br></div>
            <div class='atts'><label class='att'><b>Questions </b>{$row['noofques']}</label>
            <label class='att'><b>Duration </b>{$row['exam_dur']}</label>
            <a id='btn' target='_blank' href='questions.php?exam_id={$row['examid']}'>Take Test</a></div>
           
            </div>";
        }
      }

        ?>

    </div>
</body>

</html>