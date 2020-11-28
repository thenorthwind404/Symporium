<?php
session_start();
$revid=$_SESSION['rev_id'];
$con = mysqli_connect('localhost', 'root', '', 'iwp');
$p=$_POST['cid'];
$comm=$_POST['comm'];
$rev=$_POST['review'];
$r1c="SELECT r1_comments FROM files WHERE id=$p";
$res1c=mysqli_query($con, $r1c);
$r=mysqli_fetch_assoc($res1c);
$comment=$r['r1_comments'];
$comment=$comment." ".$comm;
$sql1=" UPDATE files SET r1_comments='$comment' ,r_rate=r_rate + $rev WHERE id='$p'";
$result1=mysqli_query($con,$sql1);
$sql0="SELECT p1,p2,p3 FROM reviewers WHERE revid='$revid'";
		     $result0=mysqli_query($con,$sql0);
			 while($r0=mysqli_fetch_assoc($result0)){
             $p1=$r0['p1'];
             $p2=$r0['p2'];
             $p3=$r0['p3'];
			 }
if($p==$p1){
	$sql2="UPDATE reviewers SET p1=NULL, total=total-1 WHERE revid=$revid;";
}else if($p==$p2){
	$sql2="UPDATE reviewers SET p2=NULL, total=total-1 WHERE revid=$revid;";
}
else{
	$sql2="UPDATE reviewers SET p3=NULL, total=total-1 WHERE revid=$revid;";
}					 
mysqli_query($con,$sql2);	
echo "<script>alert('Review has been updated successfully!');window.location.href='http://localhost/iwp/Rev/viewsub.php';</script>";
?>