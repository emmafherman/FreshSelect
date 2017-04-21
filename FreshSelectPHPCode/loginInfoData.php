<?php
session_start();
?>
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
// Gets the information from the form
$login = $_POST["login"];
$password = $_POST["password"];
$userInputPass = MD5($password);

$login = strtolower($login);

$sql = "SELECT login, password, permission FROM Person WHERE login = '$login'";
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
            // Prompts the user, and sets the users
            // permission and sets that they are logged in.
            // Then redirects to the home page.
            echo 'You are now logged in!';
            $_SESSION['permission'] = $row["permission"];
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['login'] = $login;
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