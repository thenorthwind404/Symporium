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
        <title>FAQ-Conference Management System</title>
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
  <a href="./contactuspage.php" id="cont">Contact Us</a>
  <a href="./datausagepage.php" id="pol">Data Usage</a>
  <a href="./testimonials.php" id="priv">Testimonials</a>
  <a href="#" id="con">Terms and Conditions</a>
</div>
            <br><br>
            <div class="mainbox">
                <table class="tab2" style="margin:0 auto 0 auto;">
                <div class="div1">News</div>
					 <br>
<div class="div2">
<h1>Account Creation and Submission</h1>
<h1>How to create an Symporium account?</h1> We have a <a href=" " >detailed help article explaining account creation.</a><br>
<h1>How to submit a paper?</h1> We have a <a href=" " >detailed help article explaining how to submit.</a>
<h2>Is Symporium free?,</h2> We use a freemium business model. This means that we have a basic version under a free license and several advanced features, which require a non-free license. About 90% of our users use the free version. You can <a href=" " >read about our licenses<a> for more information.<br>
<h3>Installation</h3>
<p><b>Can I install Symporium on my server?</b></p> No. Symporium is a Web service. We host it on a high-performance commercial server.
<p><b>We want to have data on our server, should we use another system?</b></p> You can try to find another system, however we do not recommend such a solution for several reasons. If you do this, then backup, recovery, security, performance, availability and many other issues handled smoothly by Symporium will become your problem. This means you can be in a situation to lose your data, have a system unavailable at the most critical time, or simply malfunctioning. You may lose your data, time and reputation as a result. Note also that our non-free licenses include a service making it possible for you to make copies of all your conference data in the Excel and XML format at any time.
<h4>Support</h4>
<p><b>I heard that other conference management systems provide user support, while Symporium comes with no support. Is this true?</b></p> No. We provide no free support. No conference system provides free support. Some of our non-free licenses include additional support.
<p><b>What level of support is included in the standard free installation?</b></p> We help you if you have troubles to install your conference. We maintain, update and upgrade Symporium on a regular basis. We make backup of your data. We provide high-speed networking with over 99.9% uptime. We provide bug fixes. We try to maintain online Help pages. For anything else you should use a non-free license.
<p><b>Can my conference have additional support?</b></p> Yes, if you purchase a license including helpdesk access (technical support). <a href=" ">Read more about our non-free licenses.</a>
<h5>Efficiency</h5>
<p><b>Is Symporium fast enough to handle large conferences and program committee meetings? </b></p>Yes. We use an original implementation technique which is dozens of times faster than implementations of Web services using the standard PHP/MySQL technology. We never had complaints about performance and are confident we can handle a conference of any size.
<p><b>Can Symporium work with large submissions?</b></p> Yes. We are using a 1Gbs network. This means that we are able to accept over 300 standard size submissions per second. This also means we are able to deal with conferences dealing with very large submissions, such as videos.
<h6>Non-English version</h6>
<p><b>Can we use Symporium in languages different from English? </b></p>Yes and no. The information Symporium stores is stored in Unicode, so it can be in any language, for example, Chinese or French. However, all instructions in Symporium pages are in English. We plan to introduce a new service, where one can customize the submission page, so that it makes it easier for your authors to follow your submission procedure.
<h7>Customization</h7>
<p><b>Can Symporium be customized?</b></p> Symporium is highly customizable. It has a number of options allowing conference organizers to choose a model suitable for their conference. These options include submission, reviewing and proceedings creation. When a new conference is created, it is immediately ready to accept submissions using a standard configuration. This configuration can be changed by the conference administrators (chairs) at any time.
<p><b>Symporium does not have some features our conference needs, what should we do?</b></p> Contact us. We might be able to implement what you need. We have a wish list of Symporium enhancements and improvements, and often rearrange our priorities, especially when this is required by our premium customers.
<h8>Reliability and security</h8>
<p><b>Is Symporium available 24/7? </b></p>Yes. Symporium is running 24/7/365. Since 2005 we had only two interrupts. In one case we had a total hard disk failure. Symporium was up running three hours later with no data lost. The second interrupt was 6 hours long, when our server provided had to do some work on its servers. Sometimes we have updates of Symporium. Normally, they are running a few seconds or a few minutes. If we have an update likely to run more than 5 minutes, we normally perform it on Saturdays, when the number of users is low.
<h9>Backup and recovery</h9>
<p><b>We are afraid to lose our conference data. What are your backup and recovery procedures?</b></p> We use the technique known as database replication to keep your data safe. We have live replicas of all data on two backup servers different from the Symporium main server. This means that, in the case we have a total server crash, we should be able to recover data using one of the backup servers. For peace of mind you can also use our non-free licenses allowing you to download copies of all your conference data.
<h9>Registration and payment</h9>
<p><b>Can Symporium handle attendee registration and online payment? </b></p>We have registration and payment facilities implemented. They are now being used with several conferences and will be released for other conferences soon.
<p><b>How often are new versions of Symporium released?</b></p> We use the agile programming technology, with no major releases. We made 1455 updates in 2015. It means it is not unusual for us to have several updates a day. Our updates are normally made without stopping Symporium.
</pre>
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