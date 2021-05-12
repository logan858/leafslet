<?php 
    session_start();
    include_once "includes/dbconnect.php";
    include 'functions/phpfunc.php';

    if(isset($_POST['submit'])) {
        $fileVar = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileErr = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $memName = $_SESSION['memberName'];

        $fileExt = explode('.', $fileName);
        $fileRExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if(in_array($fileRExt, $allowed)) {
            if ($fileErr === 0) {
                if ($fileSize < 1000000) {
                    $fileNewName = uniqid('', true).".".$fileRExt; 
                    $fileDest = 'profilepics/'.$fileNewName;
                    move_uploaded_file($fileTName, $fileDest);
                    
// MUST NOW ATTACH IT HERE TO SESSION'S USERNAMES TABLE IN SQL DATABASE 
                        if (!$connection) {
                            die("connection failed: ".mysqli_connect_error());
                        } 
                        $updSql = "UPDATE usernames SET profileimages = '$fileNewName' WHERE loginname='".$memName."';";
                        
                        if(mysqli_query($connection, $updSql)) {
                            header("Location: llindex.php?uploadsuccesses");
                        } 
                        else {"error uploading profile image: ".mysqli_error($connection);
                        }


                } else {
                    echo "File size must be less than 1mb.";
                }
            } else {
                echo "Error encountered.";
            }
        } else {
            echo "Format not supported. Choose a jpg, png or gif format.";
        }

    }

?>