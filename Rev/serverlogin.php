<?php
error_reporting(0);
session_start();
$_SESSION["logged"] = false;

//Initializing variables
$username = "";
$email = "";
$errors = array();

//connect to the database
$db = mysqli_connect('localhost','root','','iwp') or die("Could not connect to the db");


//Login User
if(isset($_POST["login"]))
{
    $username = mysqli_real_escape_string($db,$_POST["username"]);
    $pass = mysqli_real_escape_string($db,$_POST["password"]);
    $cat = mysqli_real_escape_string($db,$_POST['category']);
    echo"<script>alert('$username');</script>";
    echo"<script>alert('$pass');</script>";
    echo"<script>alert('$cat');</script>";
    //$username = mysqli_real_escape_string($db,$_POST["username"]);
    //$pass = mysqli_real_escape_string($db,$_POST["password"]);
    $password = md5($pass);
	//echo"<script>alert('$password');</script>";
    $query = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
    $result = mysqli_query($db,$query);
    $result1 = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    $t = mysqli_fetch_assoc($result1);
    $q1 = "SELECT * FROM current_ids";
    $result2 = mysqli_query($db,$q1);
    $row1 = mysqli_fetch_assoc($result2);
    if(isset($row))
    {
        if($cat == 'Convenor'):
        {
            $_SESSION['cat'] = 'Convenor';
            if($t['conv_id'] == NULL):
            {
                $x = $row1['conv_id'];
                echo "<script>alert('$x');</script>";
                $y = $t['UserID'];
                $q3 = "UPDATE users SET conv_id = $x WHERE UserID = $y";
                mysqli_query($db,$q3);
		$_SESSION['conv_id'] = $t['conv_id'];
                $x = $x + 1;
                $y = $row1['rev_id'];
                $q4 = "UPDATE current_ids SET conv_id = $x WHERE rev_id = $y";
                mysqli_query($db,$q4);
            }
            else: 
            {
            $_SESSION['conv_id'] = $t['conv_id'];
            }
        endif;
        }
        endif;
        if($cat == 'Reviewer'):
            {
                $_SESSION['cat'] = 'Reviewer';
                if($t['rev_id'] == NULL):
                {
                    $x = $row1['rev_id'];
                    echo "<script>alert('$x');</script>";
                    $y = $t['UserID'];
                    $q3 = "UPDATE users SET rev_id = $x WHERE UserID = $y";
                    mysqli_query($db,$q3);
		    $_SESSION['rev_id'] = $t['rev_id'];
                    $x = $x + 1;
                    $y = $row1['conv_id'];
                    $q4 = "UPDATE current_ids SET rev_id = $x WHERE conv_id = $y";
                    mysqli_query($db,$q4);
                    header('Location:http://localhost/iwp/Rev/viewsub.php');
                }
                else: 
                {
                $_SESSION['rev_id'] = $t['rev_id'];
                header('Location:http://localhost/iwp/Rev/viewsub.php');
                }
            endif;
            }
             endif;
            if($cat == 'Author'):
            {
                $_SESSION['cat'] = 'Author';
                if($t['auth_id'] == NULL):
                {
                    $x = $row1['auth_id'];
                    echo "<script>alert('$x');</script>";
                    $y = $t['UserID'];
                    $q3 = "UPDATE users SET auth_id = $x WHERE UserID = $y";
                    mysqli_query($db,$q3);
		    $_SESSION['auth_id'] = $t['auth_id'];
                    $x = $x + 1;
                    $y = $row1['conv_id'];
                    $q4 = "UPDATE current_ids SET auth_id = $x WHERE conv_id = $y";
                    mysqli_query($db,$q4);
                }
                
                 else:
                {
                    $_SESSION['auth_id'] = $t['auth_id'];
                }
                endif;
                //$_SESSION['auth_id'] = $x -1;
            }
             endif;
        $_SESSION["username"] = $username;
        $_SESSION["success"] = "Logged in";
        $_SESSION["logged"] = true;
    }
    else
    {
        echo("<script>alert(Wrong username / password. Try again);document.location('./logintest.php')</script>");
    }
    
    
    
}

?>