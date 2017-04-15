<?php
/**
 * Created by PhpStorm.
 * User: caidiphillips
 * Date: 4/14/17
 * Time: 2:18 PM
 */

define('DB_SERVER', 'localhost: 3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Tog!w#LDj+');
define('DB_DATABASE', 'FreshSelect');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>