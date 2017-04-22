<!-- Created by Peter Nabiswa -->
<?php
// define variables and set to empty values
$id = $prinId = $choice1 = $choice2 = $choice3  = $choice4 = $choiceAny = $timeStamp = "";
$hseName="";
$numSpots = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function get_spotsAvailable($db,$hseName) {
   //Fetching records from the database
   $user = 'SELECT houseName, spotsAvailable FROM House' ;
   $retval = mysqli_query( $db, $user);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   while($row = mysqli_fetch_array($retval, MYSQLI_BOTH)) {
       if($row["houseName"] == $hseName){
           $numSpots = $row["spotsAvailable"];
       }        
   } 
   
    return $numSpots;
}

?>
<div id="HouseSelection">
    <form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
        Prin Id : <input type="text" name="prinId" required="required" placeholder=" Enter your Prin ID i.e P01..">
        <br><br>
        choice 1 : <select name="choice1">
                        <option value="">Enter the House ID...</option>
                        <option value="1">Howard</option>
                        <option value="2">Lowrey</option>
                        <option value="3">Buck</option>
                        <option value="4">Brooks</option>
                        <option value="5">Syl-Men</option>
                        <option value="6">Syl-Women</option>
                        <option value="7">Joe</option>
                        <option value="8">Ferg</option>
                    </select>
                    <br><br>
        choice 2 : <select name="choice2">
                        <option value="">Enter the House ID...</option>
                        <option value="1">Howard</option>
                        <option value="2">Lowrey</option>
                        <option value="3">Buck</option>
                        <option value="4">Brooks</option>
                        <option value="5">Syl-Men</option>
                        <option value="6">Syl-Women</option>
                        <option value="7">Joe</option>
                        <option value="8">Ferg</option>
                    </select>
                    <br><br>
        Choice 3 : <select name="choice3">
                        <option value="">Enter the House ID...</option>
                        <option value="1">Howard</option>
                        <option value="2">Lowrey</option>
                        <option value="3">Buck</option>
                        <option value="4">Brooks</option>
                        <option value="5">Syl-Men</option>
                        <option value="6">Syl-Women</option>
                        <option value="7">Joe</option>
                        <option value="8">Ferg</option>
                    </select>
                    <br><br>
        Choice 4 : <select name="choice4">
                        <option value="">Enter the House ID...</option>
                        <option value="1">Howard</option>
                        <option value="2">Lowrey</option>
                        <option value="3">Buck</option>
                        <option value="4">Brooks</option>
                        <option value="5">Syl-Men</option>
                        <option value="6">Syl-Women</option>
                        <option value="7">Joe</option>
                        <option value="8">Ferg</option>
                    </select>
                    <br><br>
        Do you care where you end up?  <select  name="choiceAny" required = "required">
                      <option value="">Select...</option>
                      <option value="Y">Yes, Absolutely!</option>
                      <option value="N">No, I don't care!</option>
                      </select>
                      <br><br>
        <input type="submit" name="submit" value="Submit" >
    </form>
</div>


<?php
if(isset($_GET["submit"])){
    $hs_prinId = test_input($_GET["prinId"]);
    $hs_choice1 = test_input($_GET["choice1"]);
    $hs_choice2 =  test_input($_GET["choice2"]);
    $hs_choice3 = test_input($_GET["choice3"]);
    $hs_choice4 = test_input($_GET["choice4"]);
    $hs_choiceAny = test_input($_GET["choiceAny"]);
    
    $tempPrinId = substr($hs_prinId, -9, 3);
    
    if (empty($hs_prinId)) 
        echo "prinId is a required field.";
    else if ($tempPrinId != "P01")
        echo "Prin ID must start with P01.";
    else if (empty($hs_choice1)) 
        echo "choice1 is a required field.";
    else if (empty($hs_choice2)) 
       echo "choice2 is a required field.";
    else if (empty($hs_choice3 )) 
        echo "choice3 is a required field.";
    else if (empty($hs_choice4 )) 
       echo "choice4 is a required field.";
    else if (empty($hs_choiceAny)) 
       echo "choiceAny is a required field.";
    else {
    
        try{
            $sql = "INSERT INTO HouseSelection(id, prinId,choice1,choice2,choice3,choice4,choiceAny,timeStamp)
            VALUES (DEFAULT,'$hs_prinId','$hs_choice1','$hs_choice2',' $hs_choice3 ','$hs_choice4', '$hs_choiceAny', DEFAULT)";
            
            
            if(mysqli_query($db, $sql)){
                    echo "New House Request added successfully.";
                    
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

<div class="widget">
<ul>
                    <h3> Female Houses</h3>
                        <p><span>Brooks <?php $hseName = "Brooks"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Howard <?php $hseName = "Howard"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Joe <?php $hseName = "Joe"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Syl-Women <?php $hseName = "Syl-Women"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        </p></span>

                    <h3> Male Houses</h3>

                        <p><span>Buck <?php $hseName = "Buck"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Ferg <?php $hseName = "Ferg"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Lowrey <?php $hseName = "Lowrey"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br>
                        <p><span>Syl-Men <?php $hseName = "Syl-Men"; echo " - ".get_spotsAvailable($db, $hseName)." spaces" ?>
                        <br><br></p></span>
                    </ul>
                </div>