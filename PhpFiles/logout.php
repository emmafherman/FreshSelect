<?php
/**
 * Created by Emma
 */
   session_start();
   unset($_SESSION["login"]);
   unset($_SESSION["password"]);

   echo 'You are logged out';
   header('Refresh: 2; URL = home.php');
?>