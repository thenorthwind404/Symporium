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
            .flex-container 
            {
              display: flex;
              flex-direction: column;
            }

            .flex-container > div 
            {
              width: 90%;
              margin-left:3%;
              font-size: 30px;
              border: 4px solid #031355;
              padding-left:2%;
              padding-right:4%;
              color: white;;
              border-radius: 10px;
              margin-top: 2%;
              padding: 30px;
              background: #031355;
              -webkit-box-shadow: 3px 4px 9px 2px #000000; 
              box-shadow: 3px 4px 9px 2px #000000;
              padding-bottom: 2%;
            }
            #id
            {
              float: right;
              font-size: 30px;
              padding-right: 2%;
            }
            #buttonid
            {
              padding:0.7%;
              background:white;
              text-decoration: none;
              color: #0A2D7C;
              border-radius: 10px;
              float:right;
              margin-right: 1.5%;
              -webkit-box-shadow: 8px 8px 19px -3px #000000; 
              box-shadow: 8px 8px 19px -3px #000000;
            }
            #buttonid:hover 
            {
            
              -webkit-box-shadow: 5px 7px 15px 7px #000000; 
              box-shadow: 5px 7px 15px 7px #000000;
            }
            #details 
            {
                font-size: 23px !important;
                font-weight: bold;
            }
            #right 
            {
              float:right;
              margin-right: 20px;
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
                  $db = mysqli_connect('localhost','root','','iwp') or die("Could not connect to the database");
                  $x = $_SESSION['auth_id'];
                  $query = "SELECT * from files WHERE abstract IS NULL AND auth_id = $x";
                  $result = mysqli_query($db,$query);
                  echo "<div class='flex-container'>";
                  if ($result->num_rows > 0)
                  {
                    //echo "<div class='flex-container'>";
                    while($row = $result->fetch_assoc()) 
                    {
                      echo "<div>";
                      $y =  $row['conf_id'];
                      //echo $y;
                      $d =  strtotime("today");
                      $d1 =  date("Y-m-d",$d);
                      $query1 = "SELECT * from conf WHERE conferenceid = $y";
                      $res = mysqli_query($db,$query1);
                      $res1 = mysqli_fetch_assoc($res);
                      //echo "<p id = 'right'>".$res1['topic']."</p><br/>";
                      echo "<h1 id = 'details'>Abstract Submission</h1>";
                      echo "<br/>".$res1['conf']."<br/><br/>";
                      echo "".$res1['topic']."<br/><br/>";
                      $d2 = $res1['sdate'];
                      echo "Due Date  : ".$d2."<br/>";
                      echo "<a id = 'buttonid' href = './abs.php?confid=$y'>Submit Abstract</a>";
                      $diff = abs(strtotime($d1)- strtotime($d2));
                      //echo $diff;
                      $years = floor($diff / (365*60*60*24));
                      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) - 1;
                      //$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
                      echo "<br/>Time Remaining  : ";
                      if($years > 0)
                      {
                        echo $years." year(s)";
                      }
                      if($months > 0)
                      {
                        echo $months." months(s)";
                      }
                      if($months != 0 || $years != 0)
                      {
                        echo " and ";
                      }
                      if($days > 0)
                      {
                        echo $days." day(s)";
                      }
                      if($days == 0 && $months == 0 && $years == 0)
                      {
                        echo "Less than a day left";
                      }
                      echo " left";
                      echo "<br/>";
                      echo "</div>";
                    }
                    //echo "<div";
                  }
                  else
                  {
                  echo "<div> No Abstracts to Submit</div>";
                  }
                  echo "</div>";
                ?>
                <?php 
                  $db = mysqli_connect('localhost','root','','iwp') or die("Could not connect to the database");
                  $x = $_SESSION['auth_id'];
                  $query = "SELECT * from files WHERE abstract IS NOT NULL AND fullpaper IS NULL AND auth_id = $x";
                  $result = mysqli_query($db,$query);
                  echo "<div class='flex-container'>";
                  if ($result->num_rows > 0)
                  {
                    //echo "<div class='flex-container'>";
                    while($row = $result->fetch_assoc()) 
                    {
                      echo "<div>";
                      $y =  $row['conf_id'];
                      //echo $y;
                      $d =  strtotime("today");
                      $d1 =  date("Y-m-d",$d);
                      $query1 = "SELECT * from conf WHERE conferenceid = $y";
                      $res = mysqli_query($db,$query1);
                      $res1 = mysqli_fetch_assoc($res);
                      //echo "<p id = 'right'>".$res1['topic']."</p><br/>";
                      echo "<h1 id = 'details'>Full Paper Submission</h1>";
                      echo "<br/>".$res1['conf']."<br/><br/>";
                      echo "".$res1['topic']."<br/><br/>";
                      $d2 = $res1['edate'];
                      echo "Due Date  : ".$d2."<br/>";
                      echo "<a id = 'buttonid' href = './fullpap.php?confid=".$y."'>Submit Full Paper</a>";
                      $diff = abs(strtotime($d1)- strtotime($d2));
                      //echo $diff;
                      $years = floor($diff / (365*60*60*24));
                      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) - 1;
                      //$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
                      echo "<br/>Time Remaining  : ";
                      if($years > 0)
                      {
                        echo $years." year(s)";
                      }
                      if($months > 0)
                      {
                        echo $months." months(s)";
                      }
                      if($months != 0 || $years != 0)
                      {
                        echo " and ";
                      }
                      if($days > 0)
                      {
                        echo $days." day(s)";
                      }
                      if($days == 0 && $months == 0 && $years == 0)
                      {
                        echo "Less than a day";
                      }
                      echo " left";
                      echo "<br/>";
                      echo "</div>";
                    }
                    //echo "<div";
                  }
                else
                {
                  echo "<div> No Full Papers to Submit</div>";
                }
                  echo "</div>";
                ?>
            </div>
        </div>
    </body>
</html>