<?php
session_start();
include('includes\db.php');
$user_id = $_SESSION['user_id'];
if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
}
$sql="SELECT * from exams where examid=$exam_id";
$query=mysqli_query($con,$sql);
$query_data=mysqli_fetch_assoc($query);
$time=$query_data['exam_dur'];
$total_time=$time * 60;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
        .navbar{
            padding: 2%;
            padding-bottom: 1%;

        }
        
        .question{
            /* border: 1px solid rgba(22, 37, 43, 0.836); */
            width:85%;
            height: 150px;
            margin: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: rgba(235, 226, 226, 0.363);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;


        }
        body{
            font-family: cursive;
            padding: 20px;
        }

        #labels{
            width: 50%; /* Adjust the width as needed */
    margin: 0 auto; /* This centers the div horizontally */
    text-align: right;
    margin-left: 48%;
    font-size: 30px;

        }
        #duration{
            border: 1px solid black;
            width: 200px;
            padding: 5px;
            background-color:rgba(201, 184, 184, 0.411);
        }
        #submit{
            width: 100px;
            border: 1px solid whitesmoke;
            background-color: rgba(12, 12, 73, 0.301);
        }
        
        
    </style>
</head>

<body>
  
    <div >
        <div>
        <div id="labels">
                 &nbsp;
                Duration:<p style="  display: inline; border-radius: 3px; width: 50px;" id="duration"><span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span></p> 

            </div><br>
            <form method="post">
                <div id="questions" style="margin-left: 15px;">
                    <?php
                    $que_query = "SELECT * from questions where exam_id = $exam_id ";
                    $que_sql = mysqli_query($con, $que_query);
                    while ($row = mysqli_fetch_assoc($que_sql)) {
                        echo " <div class='question'>

    <labe>{$row['que_id']}.</labe>            
    <label>{$row['que_des']} ?</label><br>
    <input type='radio' value='{$row['opt1']}' name='answers[{$row['que_id']}]' >{$row['opt1']}<br>
    <input type='radio' value='{$row['opt2']}' name='answers[{$row['que_id']}]' >{$row['opt2']}<br>
    <input type='radio' value='{$row['opt3']}' name='answers[{$row['que_id']}]' > {$row['opt3']}<br>
    <input type='radio' value='{$row['opt4']}' name='answers[{$row['que_id']}]' > {$row['opt4']}<br> 
    </div>
    ";
                    }

                    ?>
                    
                </div>
                <center><input id="submit" type="submit" name="submit" /></center>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['answers']) && is_array($_POST['answers'])) {

                $answers = $_POST['answers'];
                $score = 0; // Initialize the score to 0

                foreach ($answers as $questionId => $selectedOption) {
                    // Query the database to get the correct answer for the current question
                    $correctOptionQuery = "SELECT answer FROM questions WHERE que_id = $questionId";
                    $correctOptionResult = mysqli_query($con, $correctOptionQuery);
                    $correctOptionRow = mysqli_fetch_assoc($correctOptionResult);
                    $correctOption = $correctOptionRow['answer'];
                    if ($selectedOption == $correctOption) {
                        $score++; // Increase the score if the answer is correct
                    }
                }

                // Display the score
                // echo "Your score is: $score";
                $que_fetch = "SELECT * from exam1 where std_id=$user_id and exam_id=$exam_id";
                $que_sql = mysqli_query($con, $que_fetch);
                if (mysqli_num_rows($que_sql) > 0) {
                    echo "You have already submitted";
                    echo "<script>window.open('Results.php?exam_id=$exam_id')</script>";
                } else {
                    $que_query = "INSERT into exam1 (exam_id,std_id, std_marks) values($exam_id,$user_id, $score)";
                    $que_runsql = mysqli_query($con, $que_query);
                    echo "<script>window.alert('Exam Submitted')</script>";
                    echo "<script>window.open('Results.php?exam_id=$exam_id')</script>";
                }
            }
            else{
                $que_query = "INSERT into exam1 (exam_id,std_id, std_marks) values($exam_id,$user_id, 0)";
                    $que_runsql = mysqli_query($con, $que_query);
                    echo "<script>window.alert('Exam Submitted')</script>";
                    echo "<script>window.open('Results.php?exam_id=$exam_id')</script>";
            }

            }
            ?>
        </div>
        <!-- <div id="qno">
            <div>
                <button id="qnos"> 1</button>
                <button id="qnos"> 2</button>
                <button id="qnos"> 3</button>
                <button id="qnos"> 4</button>
                <button id="qnos"> 5</button>
            </div><br>
            <div>
                <button id="qnos"> 6</button>
                <button id="qnos"> 7</button>
                <button id="qnos"> 8</button>
                <button id="qnos"> 9</button>
                <button id="qnos"> 10</button>
            </div><br>
            <div>
                <button id="qnos"> 11</button>
                <button id="qnos"> 12</button>
                <button id="qnos"> 13</button>
                <button id="qnos"> 14</button>
                <button id="qnos"> 15</button>
            </div><br>
            <div style="display: inline;">
                <button style="margin-right: 150px;" id="prev">Previous</button>
                <button id="next">Next</button>
            </div>
        </div><br> -->


    </div>
    <script>
        const timerDurationInSeconds = <?php echo "$total_time";?>; // 5 minutes in this example
let remainingSeconds = timerDurationInSeconds;

const hoursElement = document.getElementById('hours');
const minutesElement = document.getElementById('minutes');
const secondsElement = document.getElementById('seconds');

function updateCountdown() {
  const hours = Math.floor(remainingSeconds / 3600);
  const minutes = Math.floor((remainingSeconds % 3600) / 60);
  const seconds = remainingSeconds % 60;

  hoursElement.textContent = hours.toString().padStart(2, '0');
  minutesElement.textContent = minutes.toString().padStart(2, '0');
  secondsElement.textContent = seconds.toString().padStart(2, '0');

  if (remainingSeconds > 0) {
    remainingSeconds--;
  } else {
    clearInterval(timerInterval);
    const que=document.getElementById('questions');
    que.style.display="none";
    
    // Redirect to another page after the timer ends
   // window.location.href = 'index.php'; // Replace with the URL you want to redirect to
  }
}

const timerInterval = setInterval(updateCountdown, 1000);

updateCountdown();

    </script>


</body>

</html>