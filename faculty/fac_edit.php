<?php
session_start();
include('../includes/db.php');
$fac_id = $_SESSION['fac_id'];
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Registration Form </title>
    <style>

    </style>
</head>
<body>
    <div class="container register-form">
        <div style="margin-top: 50px;" class="form">
            <center>
                <h1>Register Here..!</h1>
                <?php
                $fac_edit = "SELECT * from faculty where id=$fac_id";
                $fac_query = mysqli_query($con, $fac_edit);
                $edit_data = mysqli_fetch_assoc($fac_query);
                $name = $edit_data['name'];
                $email = $edit_data['email'];
                
                ?>
                <form method="post">
                    <div class="form-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" value="<?php echo "$name"; ?>" required />
                                </div><br>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email ID *" value="<?php echo "$email"; ?>" required />
                                </div><br>
                            </div>
                        </div><br>
            </center>
            <center>
                <div class="row justify-content-start mt-4">
                    <div class="col">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                I hereby agree to the <a href="/"> Terms and Conditions. </a>
                            </label>
                        </div><br>
                        <input type="submit" name="submit" class="btnSubmit" />
                    </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $sql = "UPDATE faculty set `name`='$name', `email`='$email' where id =$fac_id ";
                        $fac_query = mysqli_query($con, $sql);
                        if ($fac_query) {
                            echo "<script>window.alert('Updated successfully')</script>";
                            echo "<script>window.open('fac_edit.php')</script>";
                        } else {
                            echo "<script>window.alert('Error Occured')</script>";
                        }
                    }

                    ?>
                </div>
            </center>
        </div>
</body>

</html>