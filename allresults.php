<?php 

session_start();
include('includes\db.php');

if(!isset($_SESSION['user_id']))
{
    header('Location : user_login.php');
}

$userid = $_SESSION['user_id'];

$query_res = "SELECT * FROM exam1 where std_id=$userid";
$res_exe = mysqli_query($con,$query_res);


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
    <title>Document</title>
</head>
<body>
<style>
    
    .navbar{
            padding: 3%;
            padding-bottom: 2%;
            

        }
        .containert{
            width: 100%;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .table{
            width: 80%;
            border: solid 1px rgba(0, 0, 0, 0.591);
            text-align: center;
            /* text-transform: capitalize; */
            font-size: 18px;
        }

        
        .header{
            margin-top: 20px;
        }
        thead{
            text-transform: capitalize;
        }
</style>
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
          <a class="nav-link" href="results.php">Results</a>

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

  <h1 class="header" align="center">Exams Participated</h1>
<div class="containert">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Exam Name</th>
      <th scope="col">Score</th>
      <th scope="col">Percentage</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sino =1;
    while($row=mysqli_fetch_assoc($res_exe))
    {

        $examid = $row['exam_id'];
        $exname_sql = "SELECT * from exams where examid=$examid";
        $exe_sql = mysqli_query($con,$exname_sql);
        $get_data = mysqli_fetch_assoc($exe_sql);
        $exam_name = $get_data['examname'];
        $noque = $get_data['noofques'];
        

        $marks = $row['std_marks'];
        $percentage = ($marks/$noque)*100;
        $rper=round($percentage,2);

        if($percentage>=40)
        {
            $status = 'PASS';
        }
        else{
            $status = 'FAIL';
        }
        echo "<tr>
        <th scope='row'>$sino</th>
        <td>$exam_name</td>
        <td> $marks/$noque</td>
        <td>$rper%</td>
        <td>$status</td>

      </tr>";

    $sino++;
    }
    
    
    ?>
    
    
  </tbody>
  </div>
</table>
</body>
</html>