<?php
    include('..\includes\db.php'); 
    if(isset($_GET['exam_id'])){
        $exam_id=$_GET['exam_id'];
    }
    if(isset($_POST['submit'])){  
        $quedesc = $_POST['quedesc'];  
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $answer = $_POST['answer'];
        $sql= "INSERT INTO questions(`exam_id`, `que_des`,`opt1`,`opt2`,`opt3`,`opt4`,`answer`) VALUES ($exam_id, '$quedesc','$opt1','$opt2','$opt3','$opt4','$answer')";
        $query = mysqli_query($con,$sql);
        if($query){
            echo "<script>window.alert('Inserted successfully')</script>";    
        }
        else{
            echo "<script>window.alert('Error Occured')</script>";
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
                margin-top: 80px;
                border: 2px solid midnightblue;
                border-radius: 10px;
                width: 400px;
                height: 500px;
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
                <label style="margin-top: 50px; text-align: left;">Enter question:</label>
                <textarea rows="5" cols="40" name="quedesc" id="question" placeholder="Enter Question" style="margin-top: 30px;" ></textarea><br><br>
                Enter Option1:<input style="height: 20px;" name="opt1"  type="text" id="opt1"/><br>
                Enter Option2:<input style="height: 20px;" name="opt2" type="text" id="opt2"/><br>
                Enter Option3:<input style="height: 20px;" name="opt3" type="text" id="opt3"/><br>
                Enter Option4:<input style="height: 20px;" name="opt4" type="text" id="opt4"/><br>
                Enter Answer:<input style="height: 20px;" name="answer" type="text" id="answer"/><br><br>
        
                <input  type="submit" name="submit" id="submitbutton"/><br>
                <!-- <a style="text-decoration: none;" href="addque.html">Add Another Question</a> -->
            
        </form>
    </div>
    </center>
    
</body>
</html>