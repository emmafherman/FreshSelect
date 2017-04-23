<!-- Created by Caidi Phillips -->
<?php
session_start();
?>

<?php
// Checks to see if the person is logged in and their permission is Y
// If not they are redirected to the Permission Error page.
if(isset($_SESSION['logged_in']) && $_SESSION['permission'] == 'Y')
{
    echo '';
}
else
    header('Location: PermissionErrorPage.php');
?>

<?php
include ("DatabaseConnection.php")
?>

<!-- Created by Peter Nabiswa -->
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

                    <!--- Coded by Peter --->
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
                            </select><span class="error"> *</span>
                            <br><br>
                            House Gender: <select name="houseGender">
                                <option value="">Select...</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select><span class="error"> *</span>
                            <br><br>
                            Spots Available: <input type="number" name="spotsAvailable" required="required" placeholder="Num_0f_spots" min="0"><span class="error"> *</span>
                            <br><br>
                            Spots Filled: <input type="number" name="spotsFilled" required="required" placeholder="Num_0f_spots" min="0"><span class="error"> *</span>
                            <br><br>
                            <input type="submit" name="submit" value="Submit" />
                        </form>
                    </body>
</html>

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
                echo "House updated successfully.";

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
</div>
</main>
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