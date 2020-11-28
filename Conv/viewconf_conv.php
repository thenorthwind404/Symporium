<?php
session_start();
$con=mysqli_connect('localhost', 'root', '', 'iwp');
    $un=$_SESSION["username"];
    $result0=mysqli_query($con,"SELECT conv_id FROM users where UserName='$un'");
    $re0=mysqli_fetch_assoc($result0);
    $convid = $re0['conv_id'];
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
             {color:white;
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
            { font-size:5px; !Important } 
        h3 
        {
            font-size: 70%;
		color:black;
        }
        .flex-container 
            {
              display: flex;
              flex-direction: column;
            }

            .flex-container > div 
            {
              width: 85%;
              margin-left:5%;
              font-size: 30px;
              border: 4px solid #031355;
              padding-left:4%;
              padding-right:4%;
              color: white;
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
              padding:1%;
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
        .anch 
        {
            text-decoration:none;
            color: white;
            padding-left: 4%;
            padding-right: 4%;
            padding-top: 1%;
            padding-bottom: 1%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            transition-duration: 0.4s ease;
            cursor: pointer;
            border-radius: 15px;
            font-weight: bold;
            margin-top: 2%;
            float: right;
            background-color: rgba(1,1,1,0.5);
            margin-bottom:2%;
            background-color: white;
            color: black;
            border: 2px solid black;
        }
        .anch:hover
        {
            background-image: linear-gradient(to right,rgba(33, 84, 118, 0.9),rgba(85, 163, 214, 0.9));
            color: black;
            background-color: white;
        }
        h3 
        {
          color:white;
        }
        h2 
        {
          color:white;
          font-size:25px !important;
        }
        </style>

    </head>
    <body style="background: #031355;">
       <div class="box1">
            <div class="header">
                <div class="leftheader"><img src="img1.png">

                <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='Convenor'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Convenor.</small></p>
                    <?php endif; ?>

                </div>
                <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="logintest.php">Log in</a></button><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="registertest.php">SignUp</a></button><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><button class="button"><a href="index.php?logout='1'">Logout</a></button><br><?php endif; ?>
                </div>
            </div>
            <div id="menu-nav">
  <div id="navigation-bar">
  <ul>
    <li><a href="./index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): { ?> <a href = '../logintest.php'> <?php } endif;?><?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): { ?> <a href = './viewconf_conv.php'> <?php } endif;?><i class = "fa fa-home"></i><span>Conferences</span></a><li>
    <li><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): { ?> <a href = '../logintest.php'> <?php } endif;?><?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): { ?> <a href = './createconf.php'> <?php } endif;?><i class = "fa fa-home"></i><span>Start Conferences</span></a><li>
    <li><a href="./news.php"><i class="fa fa-rss"></i> <span>News</span></a></li>
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
<?php
$result1=mysqli_query($con,"SELECT * FROM conf WHERE heldby=$convid OR heldby2=$convid");
echo " <div class='flex-container'>";
while($re1=mysqli_fetch_assoc($result1))
{
	$cid=$re1['conferenceid'];
	$cname=$re1['conf'];
	echo "<div>";
	echo " <h2> ".$re1['conf']."</h2><br/>";
	echo " <h3>Abstract Deadline : ".$re1['sdate']."</h3>";
	echo " <h3>Full Paper Deadline : ".$re1['edate']."</h3>";
	echo " <h3>Topic : ".$re1['topic']."</h3>";
	echo " <h3>Location : ".$re1['confloc']."</h3>";
	echo " <h3>Date Of Conference : ".$re1['confdate']."</h3><br>";	
	if($re1['heldby2'] == NULL ): {echo "<a id='buttonid' href='./addconv.php?cid=$cid'>Add Another Convenor</a>";} 
	endif; 
	echo "<a id='buttonid' href='./downloads.php?cid=$cid'>View Submissions</a>";
	echo "<a id='buttonid' href='./assignpaper.php?cid=$cid&cname=$cname'>Assign Paper</a>";
  echo "<a id='buttonid' href='./addrev.php?cid=$cid&cname=$cname'>Add Reviewers</a>";
  if($re1['conflink'] == NULL)
  {
  echo "<a id='buttonid' href='./vidconf.php?cid=$cid&cname=$cname'>Add Conference Link</a>";
  }
  else if($re1['conflink'] != NULL)
  {
    echo "<a id='buttonid' href='./vidconf.php?cid=$cid&cname=$cname'>Change Conference Link</a>";
  }
  //echo "<a id='buttonid href = './vidconf.php?cid=$cid'>Video Conference</a>";
	echo "</div>";
}
echo "</div>";
?>