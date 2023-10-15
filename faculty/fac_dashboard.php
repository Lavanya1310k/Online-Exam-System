<?php
include('..\includes\db.php');
session_start();
if (!isset($_SESSION['fac_id'])) {
    header("Location:fac_login.php");
} else {
    $fac_id = $_SESSION['fac_id'];
    $dashboard_sql = "SELECT * from  faculty where id=$fac_id ";
    $dashboard_query = mysqli_query($con, $dashboard_sql);
    $dashboard_data = mysqli_fetch_assoc($dashboard_query);
    $fac_name = $dashboard_data['name'];
    $fac_email = $dashboard_data['email'];
  $fac_password = $dashboard_data['password'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
        }
        .dashb{
            display: flex;
            height: 100vh;
        
        }
        .exnames{
            padding-left: 40%;
        }
        .exams {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 40px;
        }

        .exam {
            width: 300px;
            height: 200px;
            border-radius: 5px;
            box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75);
            border: 2px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .facdetails{
      
      width: 400px;
      height: 250px;
      border: 2px solid skyblue;
      border-radius: 5px;
      box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.75);
      text-align: left;
      padding-left: 20px;
      padding-top: 20px;
  
}
#adde{
    border: 1px solid midnightblue;
    color: black;
    background-color: rgb(218, 218, 218);
    height: 80px;
    width: 180px;
    border-radius: 2px;
}
    </style>
</head>

<body>
    <div class="dashb" >
<div class="details">
    <h1>Welcome <?php echo "$fac_name "; ?> </h1>
    <div class="facdetails">
      <h3>Name:<?php
          echo "$fac_name "; ?>
      </h3>
      <h3>Email:  <?php
          echo " $fac_email ";?></h3>
      <h3>Password: <?php
          echo" $fac_password"; ?> </h3>
      <button><a href="fac_edit.php">Edit</a></button>
        

    </div>
    </div>

  
  <div class="exnames">
   
    <a id="adde" href="addexam.php?fac_id=<?php echo "$fac_id"; ?>">Add Exam</a>
    <h3>Exams Conducted: </h3>
    <div class="exams">
        <?php
        $facdashboard_query = "SELECT * from exams where faculty_id=$fac_id ";
        $facdashboard_sql = mysqli_query($con, $facdashboard_query);
        while ($row = mysqli_fetch_assoc($facdashboard_sql)) {
            echo " <div class='exam'>
                        
            <label>{$row['examname']}</label><br>
            <a href='addque.php?exam_id={$row['examid']}'>Add Question</a>
            <a href='viewque.php?exam_id={$row['examid']}'>View Questions</a>
            
            </div>";

        }

        ?>

        <!-- <div class="exam">
            <p>Exam1</p>
        </div> -->
        <!-- <a href='editque.php?exam_id={$row['examid']}'>Edit</a> -->
    </div>
    </div>
    </div>
    
</body>

</html>