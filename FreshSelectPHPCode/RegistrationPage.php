<?php
include ("DatabaseConnection.php")
?>

<html>

<head>
    <title>Registration Page</title>
</head>
<style>
    .error {
        color: red;}
    body {
        padding-top: 150px;
        padding-bottom: 90px;
    }
</style>

<body>

<?php echo '<center><h1>Registration</h1></center>'; ?>

<p><center><span class = "error" > * required field. </span></p></center>
<form  method = "GET" action="RegistrationInfoData.php">
    <center>Prin ID: <input type = "text" name = "prinId">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center>First Name: <input type = "text" name = "firstName">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center>Last Name: <input type = "text" name = "lastName">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center>Gender: <input type = "text" name = "gender">
        <span
            class="error">*
        </span>
        <br><br>
    </center>
    <center>Freshman House:<input type = "text" name = "freshHouse">
        <span
            class="error">*
        </span>
            <br><br>
    </center>
    <center>
        Username:   <input type = "text" name = "newUser">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center>Password:   <input type = "password" name = "newPwd">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center>Confirm Password:   <input type = "password" name = "confirmPwd">
        <span
                class="error">*
        </span>
        <br><br>
    </center>
    <center><input type = "submit" name = "submit" value = "Submit" </center>
</form>
</body>
</html>