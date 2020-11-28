
<?php
session_start();
if(!isset($_SESSION["username"]))
{
    $_SESSION["sucess"] = "Not logged in";
    //header('location: login.php');
}
$con = mysqli_connect('localhost', 'root', '', 'iwp');
$revid=$_SESSION['rev_id'];
if(isset($_GET["logout"]))
{
    $_SESSION["logged"] = false;
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
  <style>
	a
	{
		color:white;
		text-decoration:none;
	}
	a:hover
	{
		color:#031355;
		text-decoration:none;
	}
            *
            {
              font-family: Century Gothic;
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
              font-family: Ubuntu;
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
              top: 110px;
              background-color: #2196F3;
            }

            #pol {
              top: 170px;
              background-color: #2196F3;
            }

            #con {
              top: 260px;
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
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 80%;
              margin-left:10%;
              margin-right:10%;
            }

            td, th {
         
              text-align: center;
              padding: 8px;
			  
			  
            }

            tr:nth-child(even) {
              background-color: #dddddd;
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
            .form_design
            {
                margin-left: 5%;
                margin-right: 5%;
                margin-top: 2%;
                margin-bottom: 2%;
                border-radius: 50px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                padding: 2%;
            }
            .form_inner_design
            {

                border-radius: 48px;
                padding: 2%;
            }
            input, textarea
            {
                display: block;
                width: 95%;
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
                width: 30%;
                text-align: center;
                margin-left: 35%;
                margin-right: 0.5%;
                padding-bottom: 3%;
                border-radius: 10px;
				align:center;
				padding-left:40px; 
            }
            input[type = "submit"]:hover
            {
                background-color: rgba(17, 17, 163, 0.842);
            }
            input::placeholder, textarea::placeholder
            {
                color:black;
            }
            #small
            {
              padding:0px !important;
              font-size:5px;
            }
            #smalldata
            {
              padding-top:2px;
              padding-bottom: 1px;
            }
			
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
                <a href="http://localhost/iwp/contactuspage.php" id="cont">Contact Us</a>
                <a href="http://localhost/iwp/datausagepage.php" id="pol">Data Usage</a>
                <a href="http://localhost/iwp/testimonials.php" id="priv">Testimonials</a>
                <a href="#" id="con">Terms and Conditions</a>
             </div>
            <br><br>
			 <form action="http://localhost/iwp/Rev/reviewval.php" method="POST"><table>
        <tr>
        <td>Paper ID:</td>
        <td><select name="cid">
		<?php $sql0="SELECT p1,p2,p3 FROM reviewers WHERE revid='$revid'";
		     $result0=mysqli_query($con,$sql0);
			 while($r0=mysqli_fetch_assoc($result0)){
             $p1=$r0['p1'];
             $p2=$r0['p2'];
             $p3=$r0['p3'];}
			 echo "<option value='".$p1."'>".$p1."</option>";
			 echo "<option value='".$p2."'>".$p2."</option>";
			 echo "<option value='".$p3."'>".$p3."</option>";?>
        </select></td></tr>
       <tr>
        <td>Comments:</td>
        <td><input type="text" style="height:100px" rows="30" cols="150" name='comm'>
		
        </input></td></tr>
       <tr>
        <td>Review for the paper:</td>
        <td><select name='review'>
            <option value="[Not Specified]">...</option>
            <option value="3">Strongly Agree</option>
            <option value="2">Agree</option>
            <option value="1">Neutral</option>
			<option value="-2">Disagree</option>
			<option value="-3">Strongly Disagree</option>
         </select></td></tr>
        </table>

        <input type="submit" >
    </form>
</div></body>
</html>