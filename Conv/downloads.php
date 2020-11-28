<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'iwp');
$cid=$_GET['cid'];
$sql = "SELECT * FROM files WHERE conf_id=$cid AND fullpaper IS NOT NULL";
$sql2 = "SELECT * FROM files WHERE conf_id=$cid AND fullpaper IS NOT NULL AND campap IS NOT NULL";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
$files2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../files/uploads/uploaded_papers/' . $file['fullpaper'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../files/uploads/uploaded_papers/' . $file['fullpaper']));
        readfile('../files/uploads/uploaded_papers/' . $file['fullpaper']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>
<?php
session_start();
if( !(isset($_SESSION['logged'])) || $_SESSION['logged']==false)
{
//$_SESSION['success']='No';
header('location: http://localhost/iwp/index.php');            
}
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Paper Submissions</title>
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
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 80%;
              margin-left:10%;
              margin-right:10%;
            }

            td, th {
              border: 2px solid black;
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
                width: 100%;
                text-align: center;
                margin-left: 0.5%;
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
                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='student'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Student.</small></p>
                    <?php endif; ?>


                    <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true && $_SESSION['cat']=='teacher'): ?>
                        <p style="font-size:20px;color:#ed861f"><b>Welcome <?php echo $_SESSION["username"]?></b><br/><small>Logged in as Teacher.</small></p>
                    <?php endif; ?>
			
		</div>
                <div class="rightheader"><?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="http://localhost/iwp/logintest.php"><button class="button">Login</button></a><br><?php endif; ?>
                                         <?php if(!(isset($_SESSION['logged'])) || $_SESSION["logged"] == false): ?><a href="http://localhost/iwp/registertest.php"><button class="button">Sign Up</button></a><br><?php endif; ?>
                                         <?php if(isset($_SESSION['logged']) && $_SESSION["logged"] == true): ?><a href="http://localhost/iwp/index.php?logout='1'"><button class="button">Logout</button></a><br><?php endif; ?>
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
                <a href="http://localhost/iwp/contactuspage.php" id="cont">Contact Us</a>
                <a href="http://localhost/iwp/datausagepage.php" id="pol">Data Usage</a>
                <a href="http://localhost/iwp/testimonials.php" id="priv">Testimonials</a>
                <a href="#" id="con">Terms and Conditions</a>
             </div>
            <br><br>	
		<center><h2> Final Papers </h2></center>
            <table>
            <thead>
                <th>File ID</th>
                <th>Conference ID</th>
		<th>Author</th>
		<th>Title</th>
		<th>Abstract</th>
                <th>No of Downloads</th>
                <th>Final Paper</th>
            </thead>
            <tbody>
            <?php foreach ($files as $file): ?>
                <tr>
                <td><?php echo $file['id']; ?></td>
                <td><?php echo $file['conf_id']; ?></td>
		<td><?php echo $file['author']; ?></td>
		<td><?php echo $file['title']; ?></td>
		<td><?php echo $file['abstract']; ?></td>
                <td><?php echo $file['downloads']; ?></td>
                <td id = 'smalldata'><?php echo "<p id = 'small'>".$file['fullpaper']."</p>" ?><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                </tr>
            <?php endforeach;?>

            </tbody>
            </table>


		<br><br><br>
	    				
		<center><h2> Camera Ready Papers </h2></center>
            <table>
            <thead>
                <th>File ID</th>
                <th>Conference ID</th>
		<th>Author</th>
		<th>Title</th>
		<th>Abstract</th>
                <th>No of Downloads</th>
                <th>Camera Ready Paper</th>
            </thead>
            <tbody>
            	<?php foreach ($files2 as $file2): ?>
                	<tr>
                	<td><?php echo $file2['id']; ?></td>
                	<td><?php echo $file2['conf_id']; ?></td>
			<td><?php echo $file2['author']; ?></td>
			<td><?php echo $file2['title']; ?></td>
			<td><?php echo $file2['abstract'] ?></td>
                	<td><?php echo $file2['downloads']; ?></td>
                	<td id = 'smalldata'><?php echo "<p id = 'small'>".$file['campap']."</p>" ?><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                	</tr>
            	<?php endforeach;?>
	    </tbody>
	    </table>
</body>
</html>