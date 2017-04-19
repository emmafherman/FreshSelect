<?php
include ("DatabaseConnection.php")
?>
<html>
<!--- Coded by Caidi --->
<body>

<?php
$tempPrinId;
$tempGender;
$tempFreshHouse;

$prinId = $_GET["prinId"];
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$newUser = $_GET["newUser"];
$newPwd = $_GET["newPwd"];
$confirmPwd = $_GET["confirmPwd"];
$gender = $_GET["gender"];
$freshHouse = $_GET['freshHouse'];

$tempPrinId = substr($prinId, -9, 3);

if (strtoupper($gender) == 'MALE')
    $tempGender = strtoupper(substr($gender, -3, 1));
else if (strtoupper($gender) == 'FEMALE')
    $tempGender = strtoupper(substr($gender, -6, 1));

if (strtoupper($freshHouse) == 'ANDERSON')
    $tempFreshHouse = strtoupper($freshHouse);
else if (strtoupper($freshHouse) == 'RACKHAM')
    $tempFreshHouse = strtoupper($freshHouse);

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
else if (empty($tempGender))
    echo "Please enter either female or male.";
else if (empty($freshHouse))
    echo "Please enter your freshman house.";
else if (empty($tempFreshHouse))
    echo "Please enter either Anderson or Rackham.";
else {
    if ($newPwd == $confirmPwd) {
        $sql = "INSERT INTO Person (prinId, firstName, lastName, login, password, permission) 
           VALUES ('$prinId', '$firstName', '$lastName', '$newUser', PASSWORD('$confirmPwd'), DEFAULT )";

        if (mysqli_query($db, $sql)) {
            $sql = "INSERT INTO Student (prinId, gender, freshHouse, upperHouse, preference) 
           VALUES ('$prinId', '$tempGender', '$tempFreshHouse', DEFAULT , DEFAULT )";


            if (mysqli_query($db, $sql)) {
                echo "New User added successfully.";
                header('Refresh: 2; URL = LoginPage.php');
                exit();
            }
            else {
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