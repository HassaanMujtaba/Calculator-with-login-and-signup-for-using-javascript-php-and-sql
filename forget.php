<?php

    $connection = mysqli_connect('localhost','root','','database1') or die("connection failed");

    if(isset($_POST['send']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm-pass'];

        if($password==$confirm)
        {
            $command ="UPDATE users SET password='$password' WHERE username='$username'";

            $result = mysqli_query($connection, $command);

            header('location:login.php');
        }

        else
        {
            echo "<script> alert('Password not match') </script>";
        }
                         
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>Forget password</title>  

</head>
<body>


    <section id="login">

        <div class="container">

            <h3> Forget password </h3>

            <form action="forget.php" method="post">

                <label> Enter username </label>
                <input type="text" placeholder="Enter username" name="username" required>

                <label> Enter password </label>
                <input type="password" placeholder="Enter new password" name="password" required>

                <label> Confirm Password </label>
                <input type="password" placeholder="Confirm new password" name="confirm-pass" required>

                
                <input type="submit" value="Confirm" name="send">

            </form>
        </div>

    </section>


    
</body>
</html>