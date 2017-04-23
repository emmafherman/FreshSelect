<!-- Created by Caidi Phillips -->
<?php
session_start();
?>

<?php
// Checks to see if the person is logged in and their permission is Y
// If not they are redirected to Permission Error page.
if(isset($_SESSION['logged_in']) && $_SESSION['permission'] == 'Y')
{
    echo '';
}
else
    header('Location: PermissionErrorPage.php');
?>
<!-- Created by Emma Herman -->
<HTML>
<Body>
<?php
include ("DatabaseConnection.php")
?>
<?php

//Ordering houses by open spots
$sql1 = 'SELECT id, spotsAvailable, houseName FROM House ORDER BY spotsAvailable DESC';
$retval = mysqli_query($db, $sql1);

if(! $retval ) {
    die('Could not get data: ' . mysqli_error());
}
echo "HouseID - Spots Available <br> ";
echo "---------------------------------------------------------------<br>";

while($row = mysqli_fetch_array($retval, MYSQLI_BOTH)) {
    $house = $row[0];
    $spots = $row[1];
    $name = $row[2];
    $added = 0;
    printf("<br><br>House %10s - %10s spots<br>",$name,$spots);

//place first choice
    $sql2 = "SELECT hs.prinId, s.upperHouse FROM HouseSelection hs NATURAL JOIN Student s WHERE s.upperHouse IS NULL AND hs.choice1 = '$house'";
    $retval2 = mysqli_query($db, $sql2);

    while($row = mysqli_fetch_array($retval2, MYSQLI_BOTH)){
        if (($row[1] === NULL) && ($spots > $added)){
            $sql6 = "UPDATE Student SET upperHouse = '1' WHERE prinId = '$row[0]'"; //update upperHouse
            if (mysqli_query($db, $sql6)) {
                $added++;
                printf("%10s<br>",$row[0]); //print prinId
            }
        }
    }

//place second choices
    $sql3 = "SELECT hs.prinId, s.upperHouse FROM HouseSelection hs NATURAL JOIN Student s WHERE s.upperHouse IS NULL AND hs.choice2 = '$house'";
    $retval3 = mysqli_query($db, $sql3);
//place two choices
    while(($row = mysqli_fetch_array($retval3, MYSQLI_BOTH)) && ($spots > $added)){
        $sql7 = "UPDATE Student SET upperHouse = '$house' WHERE prinId = '$row[0]'"; //update upperHouse
        if (mysqli_query($db, $sql7)) {
            $added++;
            printf("%10s<br>",$row[0]); //print prinId
        }
    }

//place third choices
    $sql4 = "SELECT hs.prinId, s.upperHouse FROM HouseSelection hs NATURAL JOIN Student s WHERE s.upperHouse IS NULL AND hs.choice3 = '$house'";
    $retval4 = mysqli_query($db, $sql4);
//place three choices
    while(($row = mysqli_fetch_array($retval4, MYSQLI_BOTH)) && ($spots > $added)){
        $sql8 = "UPDATE Student SET upperHouse = '$house' WHERE prinId = '$row[0]'"; //update upperHouse
        if (mysqli_query($db, $sql8)) {
            $added++;
            printf("%10s<br>",$row[0]); //print prinId
        }
    }

//place fourth choices
    $sql5 = "SELECT hs.prinId, s.upperHouse FROM HouseSelection hs NATURAL JOIN Student s WHERE s.upperHouse IS NULL AND hs.choice4 = '$house'";
    $retval5 = mysqli_query($db, $sql5);
//place fourth choices
    while(($row = mysqli_fetch_array($retval5, MYSQLI_BOTH)) && ($spots > $added)){
        $sql9 = "UPDATE Student SET upperHouse = '$house' WHERE prinId = '$row[0]'"; //update upperHouse
        if (mysqli_query($db, $sql9)) {
            $added++;
            printf("%10s<br>",$row[0]); //print prinId
        }
    }

//update spaces available for admin to see
    $newAvail = $spots - $added;
    $sql10 = "UPDATE House SET spotsAvailable = '$newAvail' WHERE id = '$house'";
    if (mysqli_query($db, $sql10)) {
        printf("New number of spots available: %10s <br>",$newAvail); //print prinId
    }
}
echo "----------------------------------------------------------------<br>";

?>
</HTML>
</Body>