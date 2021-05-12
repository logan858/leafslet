<?php
	if(isset($_SESSION["memberId"])) {
		$sqlProfile = "SELECT profileimages FROM usernames WHERE loginname='".$_SESSION['memberName']."';";
		$sqlRTest = mysqli_query($connection, $sqlProfile);
		$profilePicture = mysqli_fetch_array($sqlRTest);
		if ($profilePicture[0] == null) {
			$avatar = "profilepics/generic.png";
		} else {
			$avatar = "profilepics/".$profilePicture[0];
		}
	}
	if(isset($_SESSION["memberId"])) {
		$sqlDate = "SELECT joindate FROM usernames WHERE loginname='".$_SESSION['memberName']."';"; 
		$sqlNDate = mysqli_query($connection, $sqlDate);
		$sqlMDate = mysqli_fetch_array($sqlNDate);
		$sqlODate = date_create($sqlMDate[0]);
		$sqlJDate = date_format($sqlODate, 'Y/m/d');
	}
?>