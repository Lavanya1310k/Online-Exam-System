<?php

$con = mysqli_connect('localhost','root','','project');

if($con)
{
 echo "";   
}

else{
    die(mysqli_error($con));
}
?>