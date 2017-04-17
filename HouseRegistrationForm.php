<?php
include ("DatabaseConnection.php")
?>
<html>
<body>

<?php
// define variables and set to empty values
$id = $houseName = $houseGender = $spotsAvailable = $spotsFilled  = "";

$idErr = $houseNameErr = $houseGenderErr = $spotsAvailableErr = $spotsFilledErr  = "";



if ($_SERVER["REQUEST_METHOD"] == "HOUSE") {

    if (empty($_HOUSE["id"])) {
        $idErr = "id is required";
    } else {
        $id = test_input($_HOUSE["username"]);
    }

    if (empty($_HOUSE["houseName"])) {
        $houseNameErr = "Name is required";
    } else {
        $houseName = test_input($_HOUSE["houseName"]);
    }

    if (empty($_HOUSE["houseGender"])) {
        $houseGenderErr = "Gender is required";
    } else {
        $houseGender = test_input($_HOUSE["houseGender"]);
    }

    if (empty($_HOUSE["spotsAvailable"])) {
        $spotsAvailableErr = "spotsAvailable is a required field";
    } else {
        $spotsAvailable = test_input($_HOUSE["spotsAvailable"]);
    }

    if (empty($_HOUSE["spotsFilled"])) {
        $spotsFilledErr = "spotsFilled is required";
    } else {
        $spotsFilled = test_input($_HOUSE["spotsFilled"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div id="HouseRegistration">
    <h2>House Registration</h2>
    <p><span class = "error">* required field.</span></p>
    <form method = "HOUSE" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        ID : <input type="number" name="id" required="required" placeholder="Please Enter the House ID">
        <span class="error">* <?php echo $idErr;?></span>
        <br><br>
        House Name: <input type="text" name="houseName" required="required" placeholder="Please Enter the House Name">
        <span class="error">* <?php echo $houseNameErr;?></span>
        <br><br>
        House Gender: <input type="text" name="houseGender" required="required" placeholder="Please enter M OR F">
        <span class="error">* <?php echo $houseGenderErr;?></span>
        <br><br>
        Spots Available: <input type="number" name="spotsAvailable" required="required" placeholder="Num_0f_spots">
        <span class="error">* <?php echo $spotsAvailableErr;?></span>
        <br><br>
        Spots Filled: <input type="number" name="spotsFilled" required="required" placeholder="Num_0f_spots">
        <span class="error">* <?php echo $spotsFilledErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>


<?php
if(isset($_HOUSE["submit"])){
    try{
        $sql = "INSERT INTO House(id,houseName,houseGender,spotsAvailable,spotsFilled)
	    VALUES ('".$_HOUSE["id"]."','".$_HOUSE["houseName"]."','".$_HOUSE["houseGender"]."',
        '".$_HOUSE["spotsAvailable"]."','".$_HOUSE["spotsFilled"]."')";

    if(mysqli_query($db, $sql))
       {
            echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        }
        else{
            echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
        }

        $upload = null;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

}
?>

</body>
</html>