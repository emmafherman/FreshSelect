<HTML>
<Body>
<?php
include ("DatabaseConnection.php")
?>
 <?php
   //Fetching records from the database
   $sql1 = 'SELECT id, houseName, houseGender, spotsAvailable, spotsFilled FROM House';
   $retval = mysqli_query( $db, $sql1);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
    echo "HouseID : House Name : Gender : Spots Available : Spots Filled <br> ";
    echo "---------------------------------------------------------------<br>";
   while($row = mysqli_fetch_array($retval, MYSQLI_BOTH)) {
        //echo "   ".$row[0].  "  :  " .$row[1]."  : " . $row[2].  "  :  " .$row[3] .  "  :  " . $row[4];
        
         printf( "%10s:%10s:%10s:%10s:%10s<br>",$row[0],$row[1],$row[2],$row[3],$row[4]);
         
         
   }
    echo "----------------------------------------------------------------<br>";

?>

</HTML>
</Body>