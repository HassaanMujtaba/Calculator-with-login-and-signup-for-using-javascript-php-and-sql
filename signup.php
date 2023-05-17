<?php

    $connection = mysqli_connect('localhost','root','','database1') or die("connection failed");

    if(isset($_POST['send']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $command ="SELECT * FROM users WHERE username='$username'";

        $result = mysqli_query($connection, $command);

        while($row=mysqli_fetch_assoc($result))
        {
            $temp=$row['username'];
        } 


        if($temp=="")
        {
            $request = "insert into users(name, email, username, password) values ('$name', '$email', '$username', '$password')";
            mysqli_query($connection, $request);
            header('location:login.php'); 
        }
        
        else
        {
            echo "<script> alert('username already exist') </script>";
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
    <title>Create account</title>  

</head>
<body>


    <section id="login">

        <div class="container">

            <h3> Sign-Up here </h3>

            <form action="signup.php" method="post">

                <label> Name </label>
                <input type="text" placeholder="Enter name here" name="name" required>

                <label> Email </label>
                <input type="email" placeholder="Enter email here" name="email" required>

                <label> Create Username </label>
                <input type="text" placeholder="Create username here" name="username" required>

                <label> Create Password </label>
                <input type="password" placeholder="Create password here" name="password" required>

                <input type="submit" value="Sign-Up" name="send">

                <h4>Already have account <a href="login.php"> &nbsp;login here! </a></h4>

            </form>
        </div>

    </section>


    
</body>
</html>