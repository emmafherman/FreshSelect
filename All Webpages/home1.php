<!DOCTYPE html>
<!-- HTML created by Emma Herman -->
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
        #content #sidebar { padding:0; float:left; width:200px;}
        #content #sidebar .widget { margin:0 0 12px; padding:8px 8px 8px 13px;line-height:1.4em;}
        #content #sidebar .widget h3 a { text-decoration:none;}
        #content #sidebar .widget ul { margin:0; padding:0; list-style:none; color:#959595;}
        #content #sidebar .widget ul li { margin:0;}
        #content #sidebar .widget ul li { padding:4px 0; width:185px;}
        #content #sidebar .widget ul li a { color:blue; text-decoration:none; margin-left:-16px; padding:4px 8px 4px 16px;}
        #content #sidebar .widget ul li a:hover { color:#d3d3f9; font-weight:bold; text-decoration:none;}

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
                    <h2><span>Dear Freshmen...</span></h2>
                    <p><span>This site is used by Principia College to best sort you into your upperclassmen housing.</span></p>
                    <p><span>Please navigate to the House Selection Form in order to fill out your housing choices. If you are late, your form will automatically be sorted into the "any" category and you'll go into the house that needs you the most.</span></p>
                    <p><span>Regardless of how things turn out, you'll bless and be blessed by the house you end up in next year. I pinky promise!</span></p>
                    <h2><span>Love,</span></h2>
                    <h2><span>  the Principia Panther.</span></h2>
                </div>
            </main>

            <nav id="sidebar">
                <div class="widget">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">House info</a></li>
                        <li><a href="https://prinweb.principia.edu/internal/student-life">Student Life website</a></li>
                        <li><a href="Contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
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