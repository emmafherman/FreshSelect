<?php
include ("DatabaseConnection.php")
?>

<html>
<body>

<?php
// define variables and set to empty values
$id = $houseName = $houseGender = $spotsAvailable = $spotsFilled  = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div id="HouseUpdate">
    <h2>House Update</h2>
    <p><span class = "error">* required field.</span></p>
    <form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

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
    $h_name = test_input($_GET["houseName"]);
    $h_gender = test_input($_GET["houseGender"]);
    $h_sAvailable = test_input($_GET["spotsAvailable"]);
    $h_sFilled = test_input($_GET["spotsFilled"]);

    if (empty($h_name)) 
        echo "Please enter the house name.";
    else if (empty($h_gender)) 
        echo  "Please enter the house gender.";
    else if (!isset($h_sAvailable)) 
        echo  "Please enter the number of spaces available.";
    else if (!isset($h_sFilled)) 
        echo  "Please enter the number of spots filled.";
    else {
        
     try{
        
        $sql = "INSERT INTO House(id,houseName,houseGender,spotsAvailable,spotsFilled)
        VALUES (DEFAULT,'$h_name','$h_gender','$h_sAvailable','$h_sFilled') 
        ON DUPLICATE KEY UPDATE spotsAvailable = $h_sAvailable, spotsFilled = $h_sFilled ";
            
        if(mysqli_query($db, $sql)){
                echo "Record added successfully.";
                
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }
}
?>

</body>
</html>