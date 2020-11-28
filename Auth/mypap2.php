<?php
session_start();
if(!isset($_SESSION["username"]))
{
    $_SESSION["success"] = "Not logged in";
    //header('location: login.php');
}

if(isset($_GET["logout"]))
{
    $_SESSION["logged"] = false;
    session_destroy();
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Conference Management System</title>
        <style>
	    button > a
            {
                color:white;
                text-decoration:none;
            }
            *
            {
              font-family: Century Gothic !important;
              font-size: 20px !important;
            }
            .box1
            {
                background: #D2D7EC;
	            border-radius: 25px;
                width:95%;
                height:90%;
                margin:0 auto 0 auto;
                margin-top: 2%;
                margin-bottom: 3%;
                padding-bottom: 5%;
            }
            .header
            {
                margin-top: 15%;
                width:95%;
                height:95%;
                margin:0 auto 0 auto;
            }
            .heading
            {
                font-size:30px;
                font-family: inherit;
                padding:10px;
            }
            .leftheader
            {
                width:70%;
                display:inline-block;
                margin-left: 10%;
            }
            .rightheader
            {
                padding-top: 3%;
                display: inline-block;
                float: right;
                padding-right: 5%;
                
            }
            .button {
              background-color: #0A2D7C;
              border: none;
              color: white;
              font-family: Verdana;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
              width: 100%;
              border-radius: 10px;
            }
            .button:hover
            {
              background-color: #3485d1;
            }
            #menu-nav 
              {
              max-width: 90%;
              margin-left: 5%;
              background-color: #ecf0f1;
              border-radius: 4px;
              box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            }
            
            #navigation-bar ul {
              border-radius: 4px;
              overflow: hidden;
              padding-left: 2.5%;
              padding-right: 2.5%;
            }
            #navigation-bar li {
              float: left;
              width:20%;
            }
            #navigation-bar li:hover a::before {
              right: 0;
              left: 0;
            }
            #navigation-bar a {
              color: #848484;
              font-size: 20px;
              font-family: Century Gothic;
              text-decoration: none;
              text-align: center;
              padding: 20px 0;
              display: block;
              position: relative;
              transition: all 0.3s ease;
            }
            #navigation-bar a:hover {
              color: #0A2D7C;
            }
            #navigation-bar a::before {
              content: "";
              transition: all 0.4s ease-in-out;
              position: absolute;
              right: 50%;
              left: 50%;
              bottom: 0;
              height: 2px;
              background-color: #0A2D7C;
            }
            #navigation-bar a:hover::before {
              right: 0;
              left: 0;
            }
            
            li {
              list-style: none;
            }
            #mySidenav a 
            {
              position: absolute;
              left: -80px;
              transition: 0.3s;
              padding: 15px;
              width: 100px;
              text-decoration: none;
              font-size: 20px;
              color: white;
              border-radius: 0 5px 5px 0;
            }

            #mySidenav a:hover 
            {
              left: 0;
            }

            #cont {
              top: 20px;
              background-color: #2196F3;
            }

            #priv {
              top: 100px;
              background-color: #2196F3;
            }

            #pol {
              top: 160px;
              background-color: #2196F3;
            }

            #con {
              top: 250px;
              background-color:#2196F3;
            }
            .div1 {
              margin: 1%;
              height: 40px;
              border: 0px solid blue;
              box-sizing: border-box;
              background-color :#F34747;
              color:white;
              font-family: Century Gothic;
              text-align: center;
              padding-top:0.5%;
              margin-bottom: 0.2%;
              margin-left: 3%;
              margin-right: 3%;
              border-radius: 50px;
            }
            .div2 {
              margin-top: 3%;
              border: 0px solid blue;
              border-radius:25px;
              box-sizing: border-box;
              background-color :#031355;
              color:white;
              font-family: Century Gothic;
              padding: 4%;
              margin-left: 3%;
              margin-right: 3%;
            }
            table 
            {
                border-spacing: 5px;
            }
            th
            {
                padding:10px;
                font-size:20px;
                //border: 2px solid grey;
                //color:white;
            }
            .extras
            {
                background-color: #f2f2f2;
                width:100%;
                text-align: right;
            }
            .one
            {
                padding:10px;
                font-size:20px;
                border: 2px solid grey;
                color:white;
                background: #737373;
            }
            .two
            {
                padding:10px;
                font-size:16px;
                color:red;
                padding-right:30px;
            }
            a.ex1
            {
                color: #ffffff;
                text-decoration: none;
                font-size:16px;
            }
            th.one:hover
            {
                background-color:#cccccc;
            }
            .mainbox
            {
                background-color: #D2D7EC;
                width:95%;
                height:95%;
                margin:0 auto 0 auto;
            }
            .tabbox
            {
              background-color :#F34747;
				        font-family: Verdana;
                border: 1px solid red;
                border-radius:25px;
				        color: white;
            }
            table.tab2
            {
                width:96%;
                //table-layout: fixed;
                border-spacing: 15px;
            }
            .tab2 td
            {
                height:20px;
            }
            .space
            {
              margin:3%;
            }
	          small
            { font-size:20px !important; 
            }
            input, textarea
            {
                display: block;
                width: 50%;
                padding: 20px;
                -webkit-appearance: none;
                border: 0;
                outline: 0;
                transition: 0.3s;
                height: 20px;
                border-radius: 10px;
                background: #D2D7EC;
                -webkit-box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                -moz-box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                margin-left: 25%;
            }
            .bold
            {
                font-weight: bolder;
                margin-right: 200%;
            }
            select
            {
                display: block;
                width: 100%;
                padding: 20px;
                -webkit-appearance: none;
                border: none;
                border-radius: 10px;
                background: #D2D7EC;
                -webkit-box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                -moz-box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                box-shadow: inset -45px 53px 89px -48px rgba(118,156,163,0.45);
                 
            }
            input[type = "submit"]
            {
                color: rgb(255, 255, 255);
                background-color: rgba(17, 17, 163, 0.685);
                display: block;
                width: 90%;
                text-align: center;
                margin-left: 4%;
                margin-right: 0.5%;
                padding-bottom: 3%;
                border-radius: 10px;
            }
            input[type = "submit"]:hover
            {
                background-color: rgba(17, 17, 163, 0.842);
            }
            input::placeholder, textarea::placeholder
            {
                color:black;
            }
            table 
            {
                border-spacing: 5px;
                margin-left:80px;
            }
            th
            {
                padding:10px;
                font-size:20px;
                //border: 2px solid grey;
                //color:white;
            }
            #spacing 
            {
                
                text-align: center;
            }
            #details 
            {
                font-size: 23px !important;
                font-weight: bold;
            }
        </style>

    </head>
    <body style="background: #031355;">
        <div class="box1">
        <div class="header">
        <div class="leftheader"><img src="img1.png">
        <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='Author'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Author.</small></p>
                    <?php endif; ?>
		</div>
                <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="../logintest.php"><button class="button">Login</button></a><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="../registertest.php"><button class="button">Sign Up</button></a><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><a href="./index.php?logout='1'"><button class="button">Logout</button></a><br><?php endif; ?>
                </div>
            </div>
              <div id="menu-nav">
              <div id="navigation-bar">
              <ul>
    <li><a href="./index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): { ?> <a href = '../logintest.php'> <?php } endif;?><?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): { ?> <a href = './conf.php'> <?php } endif;?><i class = "fa fa-home"></i><span>Conferences</span></a><li>
    <li><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): { ?> <a href = '../logintest.php'> <?php } endif;?><?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): { ?> <a href = './sub.php'> <?php } endif;?><i class = "fa fa-home"></i><span>Submissions</span></a><li>
    <li><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): { ?> <a href = '../logintest.php'> <?php } endif;?><?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): { ?> <a href = './mypap.php'> <?php } endif;?><i class = "fa fa-home"></i><span>My Papers</span></a><li>
	  <li><a href="./FAQ.php"><i class="fa fa-rss"></i> <span>FAQ</span></a></li>
    </ul>
  </div>
  </div>
<div id="mySidenav" class="sidenav">
  <a href="./contactuspage.php" id="cont">Contact Us</a>
  <a href="./datausagepage.php" id="pol">Data Usage</a>
  <a href="./testimonials.php" id="priv">Testimonials</a>
  <a href="#" id="con">Terms and Conditions</a>
</div>
            <br><br>
            <div class="mainbox">
            <?php 
                        $_SESSION['curr_confid'] = $_GET['confid'];
                        $x = $_GET['confid'];
                        $q = "SELECT * from conf WHERE conferenceid = $x";
                        $db = mysqli_connect('localhost','root','','iwp') or die("Could not connect the db");
                        $res = mysqli_query($db,$q);
                        $res1 = mysqli_fetch_assoc($res);
                    ?>
                <div id = 'spacing'>
                    <h1 id = 'details'><?php echo $res1['conf']; ?></h1>
                    
                    <h2>Topic &nbsp : &nbsp <?php echo $res1['topic']?></h2>
                    <h2>Deadline</h2>
                    <?php 
                    $d1 = date_create($res1['sdate']);
                    $d2 = date_create($res1['edate']);
                    ?>
                    <h2>Camera Ready Paper &nbsp  :   &nbsp<?php echo date_format($d2,"d/m/Y")?></h2>
                    <h2>Upload your file here</h2>
                    <h2>Name your file as AuthorNames_CameraReadyPaper</h2>
                    <br/>

               
                <form method = 'POST' action = './mypap3.php'  enctype="multipart/form-data"> 
                
                    <input type = 'file' name = 'fullpaper' id = 'fullpaper' >
                    <h3>Accepted file types : .pdf .docs .zip</h3>
                    <br/>
                    <br/>
                    <input type="submit" value="Submit Abstract" name="save" >
                </form>
                </div>
            </div>
        </div>
    </body>
</html>