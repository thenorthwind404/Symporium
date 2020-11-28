<?php
session_start();
$abs = $_POST['abstract'];
if($_POST['save'] == "Submit Abstract")
{
    $id = $_SESSION['curr_confid'];
    $x = $_SESSION['auth_id'];
    //echo ("<script>alert('$abs');</script>");
    $db = mysqli_connect('localhost','root','','iwp') or die("Could not connect the db");
    $query = "UPDATE files SET abstract = '$abs' WHERE conf_id = $id AND auth_id = $x";
    mysqli_query($db,$query);
    echo ("<script>alert('Abstract has been submitted successfully'); window.location.replace('./index.php');</script>");
}
else 
{
    echo ("<script>alert('Failed to upload, try again!'); window.location.replace('./abs.php');</script>");
}

?>