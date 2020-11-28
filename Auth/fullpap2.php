<?php
session_start();
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'iwp');

// Uploads files
if (isset($_POST['save'])) 
{ // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['fullpaper']['name'];
    $confid = $_SESSION['curr_confid'];
    // destination of the file on the server
    $destination = '../files/uploads/uploaded_papers/' . $filename;
    $authid = $_SESSION['auth_id'];
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['fullpaper']['tmp_name'];
    $size = $_FILES['fullpaper']['size'];
    if (!in_array($extension, ['pdf', 'docx','zip'])) 
    {
        echo "<script>alert('Your file extension must be .zip, .pdf or .docx);</script>";
    } 
    elseif ($_FILES['fullpaper']['size'] > 10000000) 
    { // file shouldn't be larger than 1Megabyte
        echo "<script>alert('File too large!');</script>";
    } else 
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $sql = "UPDATE files SET fullpaper = '$filename' WHERE conf_id = $confid AND auth_id = $authid";
            $sql1 = "UPDATE files SET filesize = $size WHERE conf_id = $confid AND auth_id = $authid";
            mysqli_query($conn,$sql1);
            if (mysqli_query($conn, $sql)) 
            {
                echo "<script type='text/javascript'>alert('File Uploaded Successfully!'); window.location.replace('./index.php')</script>";
            }
            else 
            {
                echo "<script type='text/javascript'>alert('Failed to update table!'); window.location.replace('./sub.php')</script>";
            }
        } 
        else 
        {
            //echo "<script type='text/javascript'>alert('Failed to upload file'); window.location.replace('./sub.php');</script>";
        }
    }
    $_SESSION['curr_confid'] = false;
}