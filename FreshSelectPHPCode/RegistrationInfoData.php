<?php
include ("DatabaseConnection.php")
?>
<html>
<body>

Welcome <?php echo $_GET["firstName"]; ?><br>

<?php
$prinId = $_GET["prinId"];
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$newUser = $_GET["newUser"];
$newPwd = $_GET["newPwd"];
$confirmPwd = $_GET["ConfirmPwd"];

if ($newPwd == $confirmPwd) {
    $sql = "INSERT INTO Person (prinId, firstName, lastName, login, password, permission) 
    VALUES ('$prinId', '$firstName', '$lastName', '$newUser', '$password', DEFAULT )";

    if(mysqli_query($db, $sql)){
        echo "New User added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}
else {
   echo "Passwords did not match.";
}

?>
<INPUT TYPE = "button" VALUE = "Back" onClick = "history.go(-1);"
</body>
</html>