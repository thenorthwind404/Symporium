<?php
session_start();
$confid = $_SESSION['curr_confid'];
$_SESSION['curr_confid'] = false;
$title = $_POST['title'];
$auth = $_POST['author_name'];
$country = $_POST['country'];
$email = $_POST['email'];
$mob = $_POST['mobile'];
$auth_id = $_SESSION['auth_id'];
echo "<script>alert('$confid $title $auth $country $email $mob')</script>";
$db = mysqli_connect('localhost','root','','iwp') or die("Could not connect to the db");
$query = "INSERT INTO files (conf_id, title, auth_id,author, email, country, mobile) VALUES ($confid, '$title',$auth_id,'$auth','$email','$country',$mob) ";
$res = mysqli_query($db,$query);
header('Location: ./index.php');
?>