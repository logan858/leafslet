<?php 
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "Stmm10dxkt";
    $dbName = "leafsletdb";

    $connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

    
if(!$connection) {
    die("Connection failed: ".mysqli_connect_error());
}
?>