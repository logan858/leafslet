<?php
    if (isset($_POST['submit'])) {
        $username = $_POST['uid'];
        $pwd = $_POST['upw'];

        require_once 'dbconnect.php';
        require_once 'functions.php';

        if(emptyIdLogin($username, $pwd) !== false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        } 
        loginUid($connection, $username, $pwd);
    } else {
        header("location: ../login.php");
        exit();
    }
    ?>