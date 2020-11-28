<?php
session_start();
if(!isset($_SESSION["username"]))
{
    $_SESSION["sucess"] = "Not logged in";
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
        <title>Overview-Conference Management System</title>
        <style>
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
              padding-left: 6%;
              padding-right: 5%;
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
            #mySidenav a {
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

            #mySidenav a:hover {
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
			a
            {
            	color: white;
            }
            a:hover
            {
            	color:#E5BB59;
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
			#end{
			color:#B4B4B4;}
        </style>
    </head>
    <body style="background: #031355;">
        <div class="box1">
            <div class="header">
                <div class="leftheader"><img src="img1.png">
                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Reviewer.</small></p>
                    <?php endif; ?>
			
		</div>
                <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="http://localhost/iwp/Rev/logintest.php">Log in</a></button><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="http://localhost/iwp/Rev/registertest.php">SignUp</a></button><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><button class="button"><a href="http://localhost/iwp/Rev/viewsub.php?logout='1'">Logout</a></button><br><?php endif; ?>
                </div>
            </div>
              <div id="menu-nav">
  <div id="navigation-bar">
    <ul>
      <li>
      <a href="http://localhost/iwp/Rev/overviewpage.php"><i class="fa fa-handshake"></i><span>Home</span></a></li>
      <?php if(isset($_SESSION['logged'])) {echo"<li><a href='http://localhost/iwp/Rev/viewsub.php'><i class='fa fa-user'></i><span>View Submissions</span></a></li>"; }?>
      <?php if(isset($_SESSION['logged'])) {echo"<li><a href='http://localhost/iwp/Rev/review.php'><i class='fa fa-user'></i><span>Review a Paper</span></a></li>";}?>
      <li><a href="http://localhost/iwp/Rev/news.php"><i class="fa fa-book"></i><span>News</span></a></li>
	  <li><a href="http://localhost/iwp/Rev/FAQ.php"><i class="fa fa-rss"></i> <span>FAQ</span></a></li>
    </ul>
  </div>
  </div>
<div id="mySidenav" class="sidenav">
  <a href="contactuspage.html" id="cont">Contact Us</a>
  <a href="datausagepage.html" id="pol">Data Usage</a>
  <a href="testimonials.html" id="priv">Testimonials</a>
  <a href="#" id="con">Terms and Conditions</a>
</div>
            <br><br>
            <div class="mainbox">
                <table class="tab2" style="margin:0 auto 0 auto;">
                <div class="div1">Overview</div>
					 <br>
<div class="div2">
Symporium is a Conference Management System created by the students of VIT Chennai, exclusively for the use of colleges and schools. The project was initially nothing but a mere J-Component work for the course of Internet and Web Programming, and the idea soon bore fruit with support from professors and students alike. Today, Symporium has become an upcoming platform for students and teachers all around 
the world to attend conferences and upload papers.And it's breaking barriers too!
</div>
                  </table>
            </div>
        </div>
		<footer>
<hr>
<p id="end">
&copy;2020 Nathamayil Natesh, Bettina Shirley R and Naga Harshith Bezawada <br>VIT University, Chennai Campus<br></p></footer>
    </body>
</html>