<!DOCTYPE html>
<!-- Created by Emma Herman -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Fresh Select</title>
    <style type="text/css">
        html, #page { padding:0; margin:0;}
        body { margin:0; padding:0; width:100%; color:#959595; font:normal 12px/2.0em Sans-Serif;}
        h1, h2, h3, h4, h5, h6 {color:darkblue;}
        #page { background:#eee;}
        #header, #footer, #top-nav, #content, #content #contentbar, #content #sidebar { margin:0; padding:0;}

        /* Logo */
        #logo { padding:10px; width:auto; float:left;}
        #logo h1 a, h1 a:hover { color:darkblue; text-decoration:none;}
        #logo h1 span { color:#d3d3f9;}

        /* Header */
        #header { background:#eee; }
        #header-inner { margin:0 auto; padding:10px; width:970px;background:#fff;}

        /* Feature */
        .feature { background:#eee;padding:0;}
        .feature-inner { margin:auto;padding:10px;width:970px;background:blue; }
        .feature-inner h1 {color:#d3d3f9;font-size:32px;}

        /* Menu */
        #top-nav { margin:0 auto; padding:0px 0 0; height:37px; float:right;}
        #top-nav ul { list-style:none; padding:0; height:37px; float:left;}
        #top-nav ul li { margin:0; padding:0 0 0 8px; float:left;}
        #top-nav ul li a { display:block; margin:0; padding:8px 20px; color:blue; text-decoration:none;}
        #top-nav ul li.active a, #top-nav ul li a:hover { color:#d3d3f9;}

        /* Content */
        #content-inner { margin:0 auto; padding:10px; width:970px;background:#fff;}
        #content #contentbar { margin:0; padding:0; float:right; width:760px;}
        #content #contentbar .article { margin:0 0 24px; padding:0 20px 0 15px; }
        #content #contentbar .error {color: red;}

        /* Footerblurb */
        #footerblurb { background:#eee;color:blue;}
        #footerblurb-inner { margin:0 auto; width:970px; padding:10px;background:#d3d3f9;border-bottom-right-radius:15px;border-bottom-left-radius:15px;}
        #footerblurb .column { margin:0; text-align:justify; float:left;width:250px;padding:0 24px;}

        /* Footer */
        #footer { background:#eee;}
        #footer-inner { margin:auto; text-align:center; padding:12px; width:970px;}
        #footer a {color:blue;text-decoration:none;}

        /* Clear both sides to assist with div alignment  */
        .clr { clear:both; padding:0; margin:0; width:100%; font-size:0px; line-height:0px;}
    </style>
</head>
<body>
<div id="page">
    <header id="header">
        <div id="header-inner">
            <div id="logo">
                <h1><a href="#">Fresh<span>Select</span></a></h1>
            </div>
            <div id="top-nav">
                <ul>
                    <li><a href="index.php">User</a></li>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="houseRegistrationPage.php">Update House Info</a></li>
                    <li><a href="houseSelectionPage.php">House Selection Form</a></li>
                    <li><a href="finalHouseSortedPage.php">Final Sorted List</a></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </header>
    <div class="feature">
        <div class="feature-inner">
            <h1>Freshmen sorting</h1>
        </div>
    </div>
    <div id="content">
        <div id="content-inner">
            <main id="contentbar">
                <div class="article">
                    <body>
<?php echo '<h1>House Selection Form</h1>'; ?>

//Coded by Peter Nabiswa
<?php
include ("DatabaseConnection.php")
?>

<html>
<body>

<?php
// define variables and set to empty values
$id = $prinId = $choice1 = $choice2 = $choice3  = $choice4 = $choiceAny = $timeStamp = "";

$idErr = $prinIdErr = $choice1Err = $choice2Err = $choice3Err  = $choice4Err = $choiceAnyErr = $timeStampErr = "";


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (empty($_GET["id"])) {
        $idErr = "id is required";
    } else {
        $id = test_input($_GET["id"]);
    }

    if (empty($_GET["prinId"])) {
        $prinIdErr = "prinId is required";
    } else {
        $prinId = test_input($_GET["prinId"]);
    }

    if (empty($_GET["choice1"])) {
        $choice1Err = "choice1 is required";
    } else {
        $choice1 = test_input($_GET["choice1"]);
    }

    if (empty($_GET["choice2"])) {
        $choice2Err = "choice2 is a required field";
    } else {
        $choice2 = test_input($_GET["choice2"]);
    }

    if (empty($_GET["choice3"])) {
        $choice3Err = "choice3 is required";
    } else {
        $choice3 = test_input($_GET["choice3"]);
    }
    
     if (empty($_GET["choice4"])) {
        $choice4Err = "choice4 is required";
    } else {
        $choice4 = test_input($_GET["choice4"]);
    }
    
     if (empty($_GET["choiceAny"])) {
        $choiceAnyErr = "choiceAny is required";
    } else {
        $choiceAny = test_input($_GET["choiceAny"]);
    }
    
     if (empty($_GET["timeStamp"])) {
        $timeStampErr = "timeStamp is required";
    } else {
        $timeStamp = test_input($_GET["timeStamp"]);
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
    <p><span class = "error">* required field.</span></p>
    <form method = "get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        ID : <input type="number" name="id" required="required" placeholder="Enter the ID">
        <span class="error">* <?php echo $idErr;?></span>
        <br><br>
        Prin Id : <input type="number" name="prinId" required="required" placeholder=" Enter the Prin ID">
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
                    <option value="8">Ferguson</option>
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
        Do you care where you end up? : <select name="choiceAny">
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
    $hs_id = $_GET["id"];
    $hs_prinId = $_GET["prinId"];
    $hs_choice1 = $_GET["choice1"];
    $hs_choice2 = $_GET["choice2"];
    $hs_choice3 = $_GET["choice3"];
    $hs_choice4 = $_GET["choice4"];
    $hs_choiceAny = $_GET["choiceAny"];
    

    try{
        $sql = "INSERT INTO HouseSelection(id, prinId,choice1,choice2,choice3,choice4,choiceAny,timeStamp)
	    VALUES ($hs_id,'$hs_prinId','$hs_choice1','$hs_choice2',' $hs_choice3 ','$hs_choice4', '$hs_choiceAny', DEFAULT)";
        
        
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
?>

//coded by Emma Herman
</body>
</html>
</body>
</html>
                </div>
            </main>


            <nav id="sidebar">
                <div class="widget">
<ul>
                    <h3> Female Houses</h3>
                        <p><span>Brooks
                        <br>
                        <p><span>Howard
                        <br>
                        <p><span>Joe
                        <br>
                        <p><span>Syl - Women
                        </p></span>

                    <h3> Male Houses</h3>

                        <p><span>Buck
                        <br>
                        <p><span>Ferg
                        <br>
                        <p><span>Lowrey
                        <br>
                        <p><span>Syl - Men
                        <br><br></p></span>
                    </ul>
                </div>
            </nav>
            <div class="clr"></div>
        </div>
    </div>
    <div id="footerblurb">
        <div id="footerblurb-inner">

            <div class="column">
                <h2><span></span></h2>
            </div>
            <div class="column">
                <p><span></span></p>
            </div>
            <div class="column">
                <p><span>by E. Herman, C. Phillips, and P. Nabiswa</span></p>
            </div>
            <div class="clr"></div>
        </div>
    </div>
</div>
</body>
</html>