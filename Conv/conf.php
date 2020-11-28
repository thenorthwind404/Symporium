<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'iwp');
session_start();

// Uploads files
if (isset($_POST['save'])) { 
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $cdate=$_POST['cdate'];
    $name = $_POST['confname'];
    $loc= $_POST['confloc'];
    $topics = $_POST['topics'];
    $un=$_SESSION["username"];
    $result0=mysqli_query($conn,"SELECT conv_id FROM users where UserName='$un'");
    $re0=mysqli_fetch_assoc($result0);
    $held = $re0['conv_id'];
   
    $sql = "INSERT INTO conf (sdate, edate, conf, heldby, topic, confloc,confdate) VALUES ('$sdate','$edate','$name',$held,'$topics','$loc','$cdate')";
    if (mysqli_query($conn, $sql)) 
    {
        echo("<script>alert('Conference created successfully')</script>");
	    echo("<script>alert('Conference created successfully');document.location='./createconf.php'</script>");
    }
        
}