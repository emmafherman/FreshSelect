<?php
include ("DatabaseConnection.php")
?>

<html>
<body>

<?php
// define variables and set to empty values
$id = $houseName = $houseGender = $spotsAvailable = $spotsFilled  = "";

$idErr = $houseNameErr = $houseGenderErr = $spotsAvailableErr = $spotsFilledErr  = "";



if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (empty($_GET["id"])) {
        $idErr = "id is required";
    } else {
        $id = test_input($_GET["id"]);
    }

    if (empty($_GET["houseName"])) {
        $houseNameErr = "Name is required";
    } else {
        $houseName = test_input($_GET["houseName"]);
    }

    if (empty($_GET["houseGender"])) {
        $houseGenderErr = "Gender is required";
    } else {
        $houseGender = test_input($_GET["houseGender"]);
    }

    if (empty($_GET["spotsAvailable"])) {
        $spotsAvailableErr = "spotsAvailable is a required field";
    } else {
        $spotsAvailable = test_input($_GET["spotsAvailable"]);
    }

    if (empty($_GET["spotsFilled"])) {
        $spotsFilledErr = "spotsFilled is required";
    } else {
        $spotsFilled = test_input($_GET["spotsFilled"]);
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
    <form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        ID : <select name="id">
                    <option value="">Enter the House ID...</option>
                    <option value="1">Howard</option>
                    <option value="2">Lowrey</option>
                    <option value="3">Buck</option>
                    <option value="4">Brooks</option>
                    <option value="5">Syl-Men</option>
                    <option value="6">Syl-Women</option>
                    <option value="7">Joe</option>
                    <option value="8">Ferguson</option>
                    <option value="9">Anderson</option>
                    <option value="10">Rackham</option>
                    </select>
                    <br><br>
        House Name: <select name="houseName">
                    <option value="">Enter the House ID...</option>
                    <option value="Howard">Howard</option>
                    <option value="Lowrey">Lowrey</option>
                    <option value="Buck">Buck</option>
                    <option value="Brooks">Brooks</option>
                    <option value="Syl-Men">Syl-Men</option>
                    <option value="Syl-Women">Syl-Women</option>
                    <option value="Joe">Joe</option>
                    <option value="Ferguson">Ferguson</option>
                    <option value="Anderson">Anderson</option>
                    <option value="Rackham">Rackham</option>
                    </select>
                    <br><br>
        House Gender: <select name="houseGender">
                      <option value="">Select...</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      </select>
        <br><br>
        Spots Available: <input type="number" name="spotsAvailable" required="required" placeholder="Num_0f_spots" min="0">
        <br><br>
        Spots Filled: <input type="number" name="spotsFilled" required="required" placeholder="Num_0f_spots" min="0">
        <br><br>
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>


<?php

if(isset($_GET["submit"])){
    $h_id = $_GET["id"];
    $h_name = $_GET["houseName"];
    $h_gender = $_GET["houseGender"];
    $h_sAvailable = $_GET["spotsAvailable"];
    $h_sFilled =$_GET["spotsFilled"];

    try{
        $sql = "INSERT INTO House(id,houseName,houseGender,spotsAvailable,spotsFilled)
	    VALUES ('$h_id','$h_name','$h_gender','$h_sAvailable','$h_sFilled')";
        
        
        if(mysqli_query($db, $sql)){
                echo "New House added successfully.";
                
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }
        
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

}
?>

</body>
</html>