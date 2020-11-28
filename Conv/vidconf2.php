<?php
if(isset($_POST['rev']))
{
    $con = mysqli_connect('localhost', 'root', '', 'iwp');
    $cid=$_GET['cid'];
    //$_SESSION['curr_conf']=false;
	$rid=$_POST['revid'];
	$rname=$_POST['revname'];
    $sql1 = "UPDATE conf SET conflink = '$rid' where conferenceid = $cid";
    $sql2 = "UPDATE conf SET confpass = '$rname' where conferenceid = $cid";
    $res = mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    echo "<script>alert('Inserted successfully!'); window.location.replace('./index.php')</script>";
}
?>