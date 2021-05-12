<?php
    include_once "dbconnect.php";
    include_once "functions.php";

    if(isset($_POST['submit'])) {
        $uidParam = $_POST['uid'];
        $pwParam = $_POST['upw'];
        $emailParam = $_POST['uemail'];
        $pwParamR = $_POST['upwr'];

        if(emptyIdCheck($uidParam, $pwParam, $pwParamR, $emailParam) !== false) {
            header("Location: ../signup.php?error=emptyinput");
            exit();
        } 
        if(invalidId($uidParam) !== false) {
            header("Location: ../signup.php?error=invalidchars");
            exit();
        } 
        if(invalidEmail($emailParam) !== false) {
            header("Location: ../signup.php?error=invalidemail");
            exit();
        } 
        if(pwSync($pwParam, $pwParamR) !== false) {
            header("Location: ../signup.php?error=passworddoesnotmatch");
            exit();
        } 
        if(userExists($connection, $uidParam, $emailParam) !== false) {
            header("Location: ../signup.php?error=nametaken");
            exit();
        } 
        createTheUserId($connection, $uidParam, $pwParam, $emailParam);
    } else {
            header("location: ../signup.php");
        }
?>