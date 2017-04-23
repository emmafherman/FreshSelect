<?php
/**
 * Created by PhpStorm.
 * User: emma
 * Date: 4/17/17
 * Time: 7:42 AM
 */
?>

<html>
<head>
    <title>Fresh Select</title>
</head>
<body>
<h2>Registration Page</h2>
<a href="home.php">Click here to go back<br/><br/>
    <form action="checklogin.php" method="POST">
        Enter Username: <input type="text" name="username" required="required"/> <br/>
        Enter password: <input type="password" name="password" required="required"/> <br/>
        <input type="submit" value="Register"/>
    </form>
</body>
</html>

//alert("Username has been taken!");</script>'; // Prompts the user
//Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
}
}

if($bool)
{
mysql_query("INSERT INTO users (username, password) VALUES ('$username', 'password')"); // inserts value into table users
Print '
<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '
<script>window.location.assign("home.php");</script>'; // redirects to register.php
}
}
?>