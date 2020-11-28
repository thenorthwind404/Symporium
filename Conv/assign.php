<?php	
$rev1 = $_GET['rev1'];
$rev2 = $_GET['rev2'];
$pid = $_GET['pid'];
$cid = $_GET['cid'];
$con = mysqli_connect('localhost', 'root', '', 'iwp');
$result1=mysqli_query($con,"SELECT total FROM reviewers WHERE revid=$rev1");
$result2=mysqli_query($con,"SELECT total FROM reviewers WHERE revid=$rev2");
$r1=mysqli_fetch_assoc($result1);
$r2=mysqli_fetch_assoc($result2);
$t1=$r1['total'];
$t2=$r2['total'];

if($t1==0)
{ $sql1="UPDATE reviewers SET p1=$pid,total=total+1 WHERE revid='$rev1'"; }
else if($t1==1)
{ $sql1="UPDATE reviewers SET p2=$pid,total=total+1 WHERE revid='$rev1'"; }
else
{ $sql1="UPDATE reviewers SET p3=$pid,total=total+1 WHERE revid='$rev1'"; }

if($t2==0)
{ $sql2="UPDATE reviewers SET p1=$pid,total=total+1 WHERE revid='$rev2'"; }
else if($t2==1)
{ $sql2="UPDATE reviewers SET p2=$pid,total=total+1 WHERE revid='$rev2'"; }
else
{ $sql2="UPDATE reviewers SET p3=$pid,total=total+1 WHERE revid='$rev2'"; }

mysqli_query($con,$sql1);
mysqli_query($con,$sql2);
header('Location:http://localhost/iwp/Conv/viewconf_conv.php');
?>