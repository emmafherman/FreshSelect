<!-- created by Emma -->

<?php
session_start();
session_destroy(); //added by Caidi Phillips

echo 'You are logged out!';
header('Refresh: 2; URL =index.php');
?>