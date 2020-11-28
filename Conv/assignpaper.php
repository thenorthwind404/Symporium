<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'iwp');
if(isset($_GET['cname'])):
{
$cid=$_GET['cid'];
$cname=$_GET['cname'];
}
endif;
if( !(isset($_SESSION['logged'])) || $_SESSION['logged']==false)
{
//$_SESSION['success']='No';
header('Location: ./index.php');            
}
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

<!DOCTYPE html>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Create Conference</title>
        <style>
	a
	{
		color:white;
		text-decoration:none;
	}
            *
            {
              font-family: Ubuntu !important;
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
              top: 80px;
              background-color: #2196F3;
            }

            #pol {
              top: 140px;
              background-color: #2196F3;
            }

            #con {
              top: 200px;
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
                height: 15px;
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
                width: 70%;
                text-align: center;
                margin-left: 15%;
                margin-right: 0.5%;
                padding-bottom: 3%;
                border-radius: 10px;
            }
            input[type = "submit"]:hover
            {
                background-color: rgba(17, 17, 163, 0.842);
            }
            #butid 
            {
                color: rgb(255, 255, 255);
                background-color: rgba(17, 17, 163, 0.685);
                display: block;
                width: 95%;
                height: 55px;
                text-align: center;
                border-radius: 10px;
            }
            #butid:hover 
            {
              background-color: rgba(17, 17, 163, 0.842);
            }
            input::placeholder, textarea::placeholder
            {
                color:black;
            }
            table 
            {
              text-align:center;
            }
        </style>
    </head>
    <body style="background: #031355;">
        <div class="box1">
            <div class="header">
                <div class="leftheader"><img src="img1.png">
                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='Author'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Student.</small></p>
                    <?php endif; ?>


                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='Convenor'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Convenor.</small></p>
                    <?php endif; ?>
			
	   	</div>
                <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="logintest.php">Log in</a></button><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><button class="button"><a href="registertest.php">SignUp</a></button><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><button class="button"><a href="../index.php?logout='1'">Logout</a></button><br><?php endif; ?>
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
<script>
function check(pid,conid,i)
{
var i2=i;
var i1=i-1;
var r1 = document.getElementById(i1).value;
//alert(r1);
var r2 = document.getElementById(i2).value;
//alert(r2);
var h='http://localhost/iwp/Conv/assign.php?rev1='+r1+'&rev2='+r2+'&pid='+pid+'&cid='+conid;
var x='http://localhost/iwp/Conv/viewconf_conv.php';
//alert(h);
//window.Location='http://localhost/iwp/Conv/assign.php?rev1='+r1+'&rev2='+r2+'&pid='+pid+'&cid='+conid;
if(r1 == r2)
{
alert('Cannot assign same reviewer twice');
location.replace(x)
}
else
location.replace(h);
}
</script>         
    <div class = "space">
    <div class = "form_design">
    <div class = "form_inner_design">	
	<table>	
    <col width = '20px'>
    <col width = '500px'>
    <col width = '260px'>
    <col width = '260px'>
    <col width = '260px'>
		<tr><th>File Id</th><th>Title</th><th>Reviewer-1</th><th>Reviewer-2</th><th></th></tr>
		<?php
			$result=mysqli_query($con,"SELECT id,title FROM files WHERE conf_id='$cid' AND r1_comments IS NULL");
			$i=0;
			while($r=mysqli_fetch_assoc($result))
			{
				$pid=$r['id'];
				echo "<tr><td>".$r['id']."</td><td>".$r['title']."</td>";
				$result1=mysqli_query($con,"SELECT revid,revname FROM reviewers WHERE confid=$cid AND total<>3");
				echo "<td><select name='rev1' id='".$i."'>";
				while($r1=mysqli_fetch_assoc($result1))
				{
					echo "<option value='".$r1['revid']."'> ID: ".$r1['revid']." Name: ".$r1['revname']."</option>";
				}
				echo "</select></td>";
				$i=$i+1;
				$result1=mysqli_query($con,"SELECT revid,revname FROM reviewers WHERE confid=$cid AND total<>3");
				echo "<td><select name='rev2' id='".$i."'>";
				while($r1=mysqli_fetch_assoc($result1))
				{
					echo "<option value='".$r1['revid']."'> ID: ".$r1['revid']." Name: ".$r1['revname']."</option>";
				}
				echo "</select></td>";
				echo "<td><button id = 'butid' onclick='check(".$pid.",".$cid.",".$i.")'>Confirm</button></td></tr>";
				$i=$i+1;
			}			
			echo "</table>";
		?>
	</table>
    </div></div></div></div>
</body>
</html>