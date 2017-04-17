/**
 * Created by PhpStorm.
 * User: emma
 * Date: 4/17/17
 * Time: 10:35 AM
 */
<html>
<head>
    <title>Fresh Select</title>
</head>
<?php
session_start(); //starts the session
if($_SESSION['user']){ // checks if the user is logged in
}
else{
    header('Refresh: 2; URL = login.php'); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>
<body>
<h2 align="center">My list</h2>

    <a href="logout.php">Click here to logout.</a><br/><br/>
    <form action="HouseSelectionForm.php" method="POST">
        <h1 align="center">Enter ID: <input type="text" name="ID" /></h1> <br/>
        <h1 align="center">Enter Gender: <input type="text" name="Gender" /></h1> <br/>
        <input align="center" type="submit" value="House select"/>
    </form>
    <h2 align="center">My list</h2>
    ';
    Print '";
    Print '";
    Print '";
    Print '";
    Print '';
    Print '';
    Print '';
    Print '';
    }