<?php
    function emptyIdCheck($uidParam, $pwParam, $pwParamR, $emailParam) {
        $check;
        if(empty($uidParam) || empty($pwParam) || empty($pwParamR) || empty($emailParam)) {
            $check = true;
        } else {
            $check = false;
        } return $check;
    }

    function invalidId($uidParam) {
        $check;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $uidParam)) {
            $check = true;
        } else {
            $check = false;
        } return $check;
    }

    function invalidEmail($emailParam) {
        $check;
        if(!filter_var($emailParam, FILTER_VALIDATE_EMAIL))  {
            $check = true;
        } else {
            $check = false;
        } return $check;
    }

    function pwSync($pwParam, $pwParamR) {
        $check;
        if($pwParam !== $pwParamR)  {
            $check = true;
        } else {
            $check = false;
        } return $check;
    }

    function userExists($connection, $uidParam, $emailParam) {
        $sqlFunc = "SELECT * FROM usernames WHERE loginname = ? OR addemail = ?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sqlFunc)) {
            header("location: ../signup.php?error=sqlfail");
            exit();
        } 
        mysqli_stmt_bind_param($stmt, "ss", $uidParam, $emailParam);
        mysqli_stmt_execute($stmt);

        $checkData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($checkData)) {
            return $row;
        } else {
            $check = false;
            return $check;
        }
        mysqli_stmt_close($stmt);
    }

    function createTheUserId($connection, $uidParam, $pwParam, $emailParam) {
        $sqlFunc = "INSERT INTO usernames (loginname, pw, addemail) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sqlFunc)) {
            header("location: ../signup.php?error=sqlfail");
            exit();
        } 
        $hashedPw = password_hash($pwParam, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $uidParam, $hashedPw, $emailParam);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit();
    }
    
    function emptyIdLogin($username, $pwd) {
        $check;
        if(empty($username) || empty($pwd)) {
            $check = true;
        } else {
            $check = false;
        } return $check;
    }

    function loginUid($connection, $username, $pwd) {
        $uidExists = userExists($connection, $username, $username);

        if ($uidExists === false) {
            header("location: ../login.php?error=incorrectusername");
            exit();
        }
        $hashedPwd = $uidExists['pw'];
        $chkPw = password_verify($pwd, $hashedPwd);

        if($chkPw === false) {
            header("location: ../login.php?error=incorrectpw");
            exit();
        } elseif ($chkPw === true) {
            session_start();
            $_SESSION['memberId'] =  $uidExists['id'];
            $_SESSION['memberName'] = $uidExists['loginname'];
            header('location: ../llindex.php');
            exit();
        }

    }



?>