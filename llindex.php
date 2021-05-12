<?php
	session_start();
	include 'includes/dbconnect.php';
	include 'functions/phpfunc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/llindexcss.css">
	<script type="text/javascript" src="jquery/jquery-3.5.1.js"></script>
</head>

<body id=mainbg>

<header id=banner-id title=leafslet.com> 
	<a href="llindex.php">
	<div class=shine-this></div>
	</a>
</header>


<main  id=containermain>
	<?php
		include 'nav.php';
	?>
	

<div id=boxescontainer>
<!-- Game Winner (#1)-->
	<div class=boxes id=box1>winner/loser</div>
<!-- Goal scorers (#2)-->
	<div class=boxes id=box2>predictive goal scorers
	</div>
<!-- Login Box (#3)-->
	<div class=boxes id=box3>
		<?php
			if(isset($_SESSION["memberId"])) {
				echo "<div id=box31><img src='".$avatar."'/></div>";
				echo "<div id=box32>" .$_SESSION['memberName']."";
					echo "<li><a href='profilebox.php'>Profile</a></li>";
					echo "<li><a href='includes/logout.php'>Logout</a></li>";
				echo "</div>";
				echo "<div id=box33>";
					echo "<div>T-winnings: </div>";
					echo "<div>Posts: </div>";
					echo "<div>Joined: </div>";
				echo "</div>";
				echo "<div id=box34>";
					echo "<div>placeholder </div>";
					echo "<div>placeholder </div>";
					echo "<div>".$sqlJDate."</div>";
				echo "</div>";
				
			} else {
				echo "<div id=box31>";
				echo "<a href='signup.php'>Sign-up</a><br/>";
				echo "<a href='login.php'>Login</a>";
				echo "</div>";
			}
		?>
	</div>
<!--Goal Spreads (#4)-->
	<div class=boxes id=box4>
		
		<?php
			$sqlSelect = "SELECT * FROM usernames";
			$sqlResult = mysqli_query($connection, $sqlSelect);
			

			if(mysqli_num_rows($sqlResult) > 0) {
				while($row = mysqli_fetch_assoc($sqlResult)) {
					$displayData = $row['id']; 
					$sqlImage = "SELECT* FROM profileimages WHERE id='$displayData'";
					$sqlResultImg = mysqli_query($connection, $sqlImage);
					while($rowImg = mysqli_fetch_assoc($sqlResultImg)) {
						echo "<div>";
							if($rowImg['status'] == 0) {
								echo "<img src='profilepics/profile".$displayData.".jpg'>";
							} else {
								echo "<img src='leafsletIMGs/progen.jpg'>";
							}
							echo $row['loginname'];
						echo "</div>";
					}
				}
			} else {
				echo "There are no users yet.";
			}
			print_r($displayData);
		?>
	
	</div>
<!--Skaters, HS (#5)-->
	<div class=boxes id=box5>hot streaks, skaters
		<?php
			//foreach($displayData as $dataOne) {
			//	echo $dataOne['loginname']." ";
			//}
		?>
	</div>
<!--Goaltenders, HS (#6)-->
	<div class=boxes id=box6>hot streaks, goaltenders</div>
<!--Strength by periods (#7)-->
	<div class=boxes id=box7>strongest periods</div>
<!--Winnings (#8)-->
	<div class=boxes id=box8>winnings/losings</div>

<!--Forum links (#9)-->
	<div class=boxes>
		<div id=box9image>
			<?php 
				include 'leafsletIMGs/hflcforums3.svg';
			?>
		</div>
	</div>
<!--Donations (#10)-->
	<div class=boxes id=box10>donate</div>
<!--Stream (#11)-->
	<div class=boxes id=box11>stream</div>
</div>
<br/>


</main>
<footer></footer>


</body>
</html>