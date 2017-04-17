<?php
/**
 * Created by PhpStorm.
 * User: emma
 * Date: 4/17/17
 * Time: 7:33 AM
 */
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   echo 'You are logged out';
   header('Refresh: 2; URL = home.php');
?>