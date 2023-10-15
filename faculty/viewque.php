<?php
    include('..\includes\db.php');
    if (isset($_GET['exam_id'])) {
        $exam_id = $_GET['exam_id'];
    }


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <style>
        #qnos {
            margin-top: 10px;
            border: 1px solid black;
            background-color: rgb(180, 164, 164);
            box-shadow: deepskyblue;
            height: 50px;
            width: 50px;
            display: inline;
            border-radius: 2px;
            border-radius: 3px;
        }

        #qno {
            border-radius: 5px;
            text-align: center;
            margin-top: 30px;
            margin-left: 200px;
            width: 290px;
            height: 240px;
            border: 2px solid rgb(243, 219, 219);
        }
        .exams {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 40px;
        }

        .exam {
            padding-left: 20px;
            width: 500px;
            height: 200px;
            border: 1px solid black;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>

<body>
    
    <div style="display: flex;">
        <div>
            
            <div id="questions" style="margin-left: 15px;">
            <div class="exams">
            <?php
    $que_query = "SELECT * from questions where exam_id= $exam_id";
    $que_sql = mysqli_query($con,$que_query);
   while( $row = mysqli_fetch_assoc($que_sql)){
    echo " <div class='exam'>
                
    <label>{$row['que_des']}</label><br>
    {$row['opt1']}<br>
    {$row['opt2']}<br>
    {$row['opt3']}<br>
    {$row['opt4']}<br> 
    <a href='editque.php?que_id={$row['que_id']}'>Edit</a>
    </div>
    ";

   } 

?>

        
    </div>
           
            
    </div>
    

</body>

</html>