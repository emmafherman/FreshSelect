<?php
include ("DatabaseConnection.php")
?>
<html>
<!--- Coded by Caidi --->
<body>

<?php

$prinId = $_POST["prinId"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$newUser = $_POST["newUser"];
$newPwd = $_POST["newPwd"];
$confirmPwd = $_POST["confirmPwd"];
$gender = $_POST["gender"];
$freshHouse = $_POST['freshHouse'];

$tempPrinId = substr($prinId, -9, 3);
$newUser = strtolower($newUser);

if (empty($prinId))
    echo "Please enter your Prin ID.";
else if ($tempPrinId != "P01")
    echo "Please enter a valid P01 id";
else if (empty($firstName))
    echo "Please enter your First Name.";
else if (empty($lastName))
    echo "Please enter your Last Name.";
else if (empty($newUser))
    echo "Please enter your Username.";
else if (empty($newPwd))
    echo "Please enter your password.";
else if (empty($confirmPwd))
    echo "Please confirm your password.";
else if (empty($gender))
    echo "Please enter your gender.";
else if (empty($freshHouse))
    echo "Please enter your freshman house.";
else {
    if ($newPwd == $confirmPwd) {
        $sql = "INSERT INTO Person (prinId, firstName, lastName, login, password, permission) 
           VALUES ('$prinId', '$firstName', '$lastName', '$newUser', MD5('$confirmPwd'), DEFAULT )";

        if (mysqli_query($db, $sql)) {
            $sql = "INSERT INTO Student (prinId, gender, freshHouse, upperHouse, preference) 
           VALUES ('$prinId', '$gender', '$freshHouse', DEFAULT , DEFAULT )";

            if (mysqli_query($db, $sql)) {
                echo "New User added successfully.";
                header('Refresh: 2; URL = login.php');
                exit();
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }

        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
    } else {
        echo "Passwords did not match.";
    }
}
?>

<br><INPUT TYPE = "button" VALUE = "Back" onClick = "history.go(-1);"/>
</body>
</html>