<?php
include ("DatabaseConnection.php")

/**
 * Created by PhpStorm.
 * User: caidiphillips
 * Date: 4/19/17
 * Time: 7:20 PM
 */
?>

<html
<body>

<?php
$login = $_GET["login"];
$password = $_GET["password"];

$login = strtolower($login);

$sql = "SELECT login FROM Person WHERE login = '$login'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if ($login == $row["login"])
{
    echo 'Yay, your login matched.';
    $sql = "SELECT password FROM Person WHERE password = '$password'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    echo $row["password"];

}

else
    echo "Please enter a valid login."

?>

<br><INPUT TYPE = "button" VALUE = "Back" onClick = "history.go(-1);"/>
</body>
</html>
