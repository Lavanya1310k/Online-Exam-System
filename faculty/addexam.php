<?php
    include('..\includes\db.php'); 
    if(isset($_GET['fac_id'])){
        $fac_id=$_GET['fac_id'];
    }
    if(isset($_POST['submit'])){
        $ename = $_POST['ename'];  
        $noq = $_POST['noq'];
        $edur = $_POST['edur'];
        $sql= "INSERT INTO exams (`faculty_id`, `examname`,`noofques`,`exam_dur`) VALUES ($fac_id, '$ename',$noq,'$edur')";
        $query = mysqli_query($con,$sql);
        if($query){
            echo "<script>window.alert('Inserted successfully')</script>";    
        }
        else{
            echo "<script>window.alert('Inserted successfully')</script>";
        }

    }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <style>
        *{
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
        }
        form{
            background-color: rgb(221, 238, 245) ;
            margin-top: 100px;
            border: 2px solid midnightblue;
            border-radius: 10px;
            width: 400px;
            height: 550px;
            box-shadow: 5px 5px 5px 5px #f3e7e7;
        }
        button{
            border:2px solid midnightblue;
            border-radius: 10px;
            background-color: aqua;
        }
    </style>
</head>
<body>
    
    <div class="form">
    <center>
    <form method="post" id="form_login">
            <label style="margin-top: 50px;">Exam  name:</label><br>
            <input type="text" id="examname" name="ename" placeholder="exam name" style="margin-top: 30px;" required /><br><br>
            <label style="margin-top: 50px;">Number of questions:</label><br>
            <input type="text" id="examname" name="noq" placeholder="No. of ques" style="margin-top: 30px;" required /><br>
            <label style="margin-top: 50px;">Exam  duration:</label><br>
            <input type="text" id="examname" name="edur" placeholder="Time in minutes" style="margin-top: 30px;" required /><br>
           
        
    
            <input name="submit" id="submitbutton" type="submit">
        
    </form>
</div>
</center>
</body>


</html>