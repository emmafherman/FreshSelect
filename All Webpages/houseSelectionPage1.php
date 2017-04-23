<!-- Created by Caidi Phillips -->
<?php
session_start();
?>

<?php
// Checks to see if the person is logged in
// If not they are redirected to the Login Error page.
if (isset($_SESSION['logged_in'])) {
    echo '';
} else
    header('Location: LoginErrorPage.php');
?>

<!DOCTYPE html>
<!-- Created by Emma Herman -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Fresh Select</title>
    <style type="text/css">
        html, #page {
            padding: 0;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #959595;
            font: normal 12px/2.0em Sans-Serif;
        }

        h1, h2, h3, h4, h5, h6 {
            color: darkblue;
        }

        #page {
            background: #eee;
        }

        #header, #footer, #top-nav, #content, #content #contentbar, #content #sidebar {
            margin: 0;
            padding: 0;
        }

        /* Logo */
        #logo {
            padding: 10px;
            width: auto;
            float: left;
        }

        #logo h1 a, h1 a:hover {
            color: darkblue;
            text-decoration: none;
        }

        #logo h1 span {
            color: #d3d3f9;
        }

        /* Header */
        #header {
            background: #eee;
        }

        #header-inner {
            margin: 0 auto;
            padding: 10px;
            width: 970px;
            background: #fff;
        }

        /* Feature */
        .feature {
            background: #eee;
            padding: 0;
        }

        .feature-inner {
            margin: auto;
            padding: 10px;
            width: 970px;
            background: blue;
        }

        .feature-inner h1 {
            color: #d3d3f9;
            font-size: 32px;
        }

        /* Menu */
        #top-nav {
            margin: 0 auto;
            padding: 0px 0 0;
            height: 37px;
            float: right;
        }

        #top-nav ul {
            list-style: none;
            padding: 0;
            height: 37px;
            float: left;
        }

        #top-nav ul li {
            margin: 0;
            padding: 0 0 0 8px;
            float: left;
        }

        #top-nav ul li a {
            display: block;
            margin: 0;
            padding: 8px 20px;
            color: blue;
            text-decoration: none;
        }

        #top-nav ul li.active a, #top-nav ul li a:hover {
            color: #d3d3f9;
        }

        /* Content */
        #content-inner {
            margin: 0 auto;
            padding: 10px;
            width: 970px;
            background: #fff;
        }

        #content #contentbar {
            margin: 0;
            padding: 0;
            float: right;
            width: 760px;
        }

        #content #contentbar .article {
            margin: 0 0 24px;
            padding: 0 20px 0 15px;
        }

        #content #contentbar .error {
            color: red;
        }

        /* Footerblurb */
        #footerblurb {
            background: #eee;
            color: blue;
        }

        #footerblurb-inner {
            margin: 0 auto;
            width: 970px;
            padding: 10px;
            background: #d3d3f9;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        #footerblurb .column {
            margin: 0;
            text-align: justify;
            float: left;
            width: 250px;
            padding: 0 24px;
        }

        /* Footer */
        #footer {
            background: #eee;
        }

        #footer-inner {
            margin: auto;
            text-align: center;
            padding: 12px;
            width: 970px;
        }

        #footer a {
            color: blue;
            text-decoration: none;
        }

        /* Clear both sides to assist with div alignment  */
        .clr {
            clear: both;
            padding: 0;
            margin: 0;
            width: 100%;
            font-size: 0px;
            line-height: 0px;
        }
    </style>
</head>
<body>
<?php
include("DatabaseConnection.php")
?>
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

                    <html>
                    <body>
                    <!-- Created by Peter -->
                    <?php
                    // define variables and set to empty values
                    $id = $prinId = $choice1 = $choice2 = $choice3 = $choice4 = $choiceAny = $timeStamp = "";
                    $hseName = "";
                    $numSpots = "";

                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    function get_spotsAvailable($db, $hseName)
                    {
                        //Fetching records from the database
                        $user = 'SELECT houseName, spotsAvailable FROM House';
                        $retval = mysqli_query($db, $user);

                        if (!$retval) {
                            die('Could not get data: ' . mysqli_error());
                        }
                        while ($row = mysqli_fetch_array($retval, MYSQLI_BOTH)) {
                            if ($row["houseName"] == $hseName) {
                                $numSpots = $row["spotsAvailable"];
                            }
                        }

                        return $numSpots;
                    }

                    ?>
                    <div id="HouseSelection">
                        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                            Prin Id : <input type="text" name="prinId" required="required"
                                             placeholder=" Enter your Prin ID i.e P01..">
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
                            Do you care where you end up? <select name="choiceAny" required="required">
                                <option value="">Select...</option>
                                <option value="Y">Yes, Absolutely!</option>
                                <option value="N">No, I don't care!</option>
                            </select>
                            <br><br>
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </div>


                    <?php
                    if (isset($_GET["submit"])) {
                        $hs_prinId = test_input($_GET["prinId"]);
                        $hs_choice1 = test_input($_GET["choice1"]);
                        $hs_choice2 = test_input($_GET["choice2"]);
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
                        else if (empty($hs_choice3))
                            echo "choice3 is a required field.";
                        else if (empty($hs_choice4))
                            echo "choice4 is a required field.";
                        else if (empty($hs_choiceAny))
                            echo "choiceAny is a required field.";
                        else {

                            try {
                                $sql = "INSERT INTO HouseSelection(id, prinId,choice1,choice2,choice3,choice4,choiceAny,timeStamp)
            VALUES (DEFAULT,'$hs_prinId','$hs_choice1','$hs_choice2',' $hs_choice3 ','$hs_choice4', '$hs_choiceAny', DEFAULT)";


                                if (mysqli_query($db, $sql)) {
                                    echo "New House Request added successfully.";

                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                                }

                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                        }
                    }
                    ?>

                    <!--Created by Emma -->


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
            <p><span>Brooks <?php $hseName = "Brooks";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Howard <?php $hseName = "Howard";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Joe <?php $hseName = "Joe";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Syl-Women <?php $hseName = "Syl-Women";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
            </p></span>

            <h3> Male Houses</h3>

            <p><span>Buck <?php $hseName = "Buck";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Ferg <?php $hseName = "Ferg";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Lowrey <?php $hseName = "Lowrey";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
                    <br>
            <p><span>Syl-Men <?php $hseName = "Syl-Men";
                    echo " - " . get_spotsAvailable($db, $hseName) . " spaces" ?>
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