
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
        <title>News-Conference Management System</title>
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

                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='student'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Student.</small></p>
                    <?php endif; ?>


                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='teacher'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Teacher.</small></p>
                    <?php endif; ?>

		</div>
    <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="../logintest.php"><button class="button">Login</button></a><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="../registertest.php"><button class="button">Sign Up</button></a><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><a href="index.php?logout='1'"><button class="button">Logout</button></a><br><?php endif; ?>
                </div>
            </div>
              <div id="menu-nav">
  <div id="navigation-bar">
  <ul>
    <li><a href="./index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><a href="./conf.php"><i class="fa fa-book"></i><span>Conferences</span></a></li>
    <li><a href="./sub.php"><i class="fa fa-book"></i><span>Installation</span></a></li>
      <li><a href="./news.php"><i class="fa fa-book"></i><span>News</span></a></li>
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
            <table class="tab2" style="margin:0 auto 0 auto;">
                <div class="div1">Installation</div>
					 <br>
<div class="div2">
                              <p>Installing EasyChair for your conference is easy. You do not have to download or configure software or arrange backup procedures yourself. All you have to do is to fill out a simple form. The reason for this is that we host all conferences on our server and use our own backup, recovery, mail sending and other procedure. As far as the users are concerned, EasyChair is simply a Web service.
<br><br>If you want to use EasyChair for managing a conference, you should request an installation first. This page describes the new conference installation process of EasyChair. It consists of the following steps:-
                              </p>
                              <br>
<p><b>1.Read about our policy.</b></br>
Before you apply for an EasyChair installation, please <a href=" ">check our policy about conferences using EasyChair.</a><br><br>
<p><b>2.EasyChair account.</b></br>
To apply for a new conference installation, you must have an EasyChair account. 
If you do not have an EasyChair account,<a href=" "> follow this link to create one.</a>
</p>
<br>
<br>
<b>3.Request.</b></br>
Log in to your EasyChair account and follow menu tabs EasyChair -> Apply for a new conference installation.
You will be asked to fill out a simple form with information about your conference.
<br>
<br>
<b>4.Verification.</b></br>
We check the information you specified. We have to do this for several reasons: security, 
to avoid multiple installations for the same conference and to make sure that you did not fill out the form by mistake. 
The verification process can take anything between a minute and 12 hours. On the average it takes about 2 hours. 
Normally, requests made during the night time in the UK are processed slower.
When we verified your request, you will receive a notification by email. From this moment on all information about
processing your request will also be available under the menu tabs EasyChair -> My installation requests. 
The majority of our requests are granted. However, if we have insufficient information we may ask you some questions about your conference. 
You should check your mailbox for a notification from us or log in to EasyChair and view the status of your request.
<br>
<br>
<b>5.Further processing.</b></br>
If your request was not granted immediately after verification, all information about the status of your request will be available under the 
menu tabs EasyChair->My installation requests in your EasyChair account. You will also receive notifications and reminders by email.

While your installation request is being processed, your EasyChair account menu will also contain the menu tab "Alerts". 
Your alerts page will have links to all uncompleted installation requests.
<br>
<br>
<b>6.Initialization.</b></br>
When your request is granted, the notification email from us will contain instructions on how to initialize your conference. 
This amounts to filling out another simple form.

When you initialized the conference, it is ready to accept submissions. You will be the first chair (administrator) of your conference. 
You will receive instructions from EasyChair about configuring your conference.
</p>
<b>Support</b><br>
If you or your conference authors and reviewers need support, you should apply for a license that includes our 
helpdesk feature by using the menu item "License management" in the EasyChair menu.
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