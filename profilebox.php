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

<header id=banner-id> 
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
				echo "<div id=box31><img src='profilepics/".$profilePicture[0]."'/></div>";
				echo "<div id=box32>".$_SESSION['memberName']."</div>";
				echo '<div id=box33>';
					echo '<form action="profilepics.php" method="POST" enctype="multipart/form-data">';
						echo '<label for="proftext" id="proftext2">';
							echo 'Select File';
							echo '<input type="file" name="file" id="proftext">';
						echo '</label>';
							echo '<button type="submit" name="submit" id="inptext">Upload image</button>';
						echo '</input>';
					echo '</form>';
					echo '<form action="functions/delfunc.php" method="PODT" enctype="multipart/form-data">';
							echo '<button type="submit" name="submit" id="delbutton">Delete avatar</button>';
					echo '</form>';
					echo '</div>';
			} else {
				echo "<div id=box31>";
				echo "<a href='signup.php'>Sign-up</a><br>";
				echo "<a href='login.php'>Login</a>";
				echo "</div>";
			}
		?>
	</div>
<!--Goal Spreads (#4)-->
	<div class=boxes id=box4>
	</div>
<!--Skaters, HS (#5)-->
	<div class=boxes id=box5>hot streaks, skaters
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