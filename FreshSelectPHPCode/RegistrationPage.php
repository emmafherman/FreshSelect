<html

<head>
    <title>Registration Page</title>
</head>
<style>
    body {
        padding-top: 150px;
        padding-bottom: 90px;
    }
</style>

<body>

<?php echo '<center><h1>Registration</h1></center>';?>

<form action = "RegistrationInfoData.php" method = "get">
    <center>Prin ID: <input type = "text" name = "prinId"><br><br></center>
    <center>First Name: <input type = "text" name = "firstName"><br><br></center>
    <center>Last Name: <input type = "text" name = "lastName"><br><br></center>
    <center>Username:   <input type = "text" name = "newUser"><br><br></center>
    <center>Password:   <input type = "text" name = "newPwd"><br><br></center>
    <center>Confirm Password:   <input type = "text" name = "ConfirmPwd"><br><br></center>
    <center><input type = "Submit" </center>
</form>
</body>
</html>

