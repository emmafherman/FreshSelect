<?php
include("DatabaseConnection.php")
?>
<html>
<!--- Coded by Caidi Phillips --->
<body>
<?php

// Gets the information from the form
$prinId = $_POST["prinId"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$newUser = $_POST["newUser"];
$newPwd = $_POST["newPwd"];
$confirmPwd = $_POST["confirmPwd"];
$gender = $_POST["gender"];
$freshHouse = $_POST['freshHouse'];

//sets tempPrinId to the first 3 characters of PrinId
$tempPrinId = substr($prinId, -9, 3);
$newUser = strtolower($newUser);

//Error checking if any fields are empty.
//If so prompts the user and displays a back button.
if (empty($prinId))
    echo "Please enter your Prin ID.";
else if ($tempPrinId != "P01")
    echo "Prin ID must start with P01.";
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
        // This sql statement adds the new users to the person table.
        $sql = "INSERT INTO Person (prinId, firstName, lastName, login, password, permission) 
           VALUES ('$prinId', '$firstName', '$lastName', '$newUser', MD5('$confirmPwd'), DEFAULT )";

        if (mysqli_query($db, $sql)) { //checks that the query was ran.
            // This sql statement adds the student to the student table.
            $sql = "INSERT INTO Student (prinId, gender, freshHouse, upperHouse, preference) 
              VALUES ('$prinId', '$gender', '$freshHouse', DEFAULT , DEFAULT )";

            if (mysqli_query($db, $sql)) {
                //Prompts the user and then redirects to the login page.
                echo "New User added successfully.";
                header('Refresh: 1; URL = login.php');
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
<br><INPUT TYPE="button" id="back" VALUE="Back" onClick="history.go(-1);"/>
</body>
</html>