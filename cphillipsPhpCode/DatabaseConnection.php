<?php
/**
 * Created by PhpStorm.
 * User: caidiphillips
 * Date: 4/14/17
 * Time: 2:18 PM
 */

define('DB_USERNAME', 'id1197947_emmaherman');
define('DB_PASSWORD', '1234567890');
define('DB_DATABASE', 'id1197947_freshselect');
$db = mysqli_connect('localhost',DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>