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
$login = $_POST["login"];
$password = $_POST["password"];
$userInputPass = MD5($password);

$login = strtolower($login);

$sql = "SELECT login, password FROM Person WHERE login = '$login'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if (empty($login))
    echo "Please enter your login.";
else
{
   if ($login == $row["login"])
   {
       $resultPassword = $row["password"];

       if (empty($password))
           echo "Please enter your password.";
       else if ($userInputPass == $resultPassword)
       {
           echo 'You are now logged in!';
           $_SESSION['valid'] = true;
           $_SESSION['timeout'] = time();
           header('Refresh: 1; URL = home.php');
           exit();
       }
       else
           echo 'Incorrect password.';
   }
   else
       echo "Incorrect login.";
}
?>

<br><INPUT TYPE = "button" VALUE = "Back" onClick = "history.go(-1);"/>
</body>
</html>
