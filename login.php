<?php

    $connection = mysqli_connect('localhost','root','','database1') or die("connection failed");

    if(isset($_POST['send']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $command ="SELECT * FROM users WHERE username='$username'";

        $result = mysqli_query($connection, $command);

        $user="";
        $pass="";

        while($row=mysqli_fetch_assoc($result))
        {
            $user=$row['username'];
            $pass=$row['password'];
        }

        if($user==$username && $pass==$password)
        {   
            header('location:calculator\index.php');
        }

        else
        {
            echo "<script> alert('incorrect username or password') </script>";
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
    <title>Login your account</title>  

</head>
<body>



    <section id="login">

        <div class="container">

            <h3> Login here </h3>

            <form action="" method="post">

                <label> Username </label>
                <input type="text" placeholder="Enter username here" name="username" required>

                <label> Password </label>
                <input type="password" placeholder="Enter password here" name="password" required>
                
                <a href="forget.php" class="forget">Forget password?</a>

                <input type="submit" value="Login" name="send">

                <h4>Create account <a href="signup.php"> &nbsp;Sign-Up here! </a></h4>

            </form>

        </div>

    </section>


       
</body>
</html>