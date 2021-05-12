<?php
	session_start();
	include 'includes/dbconnect.php';
	include 'includes/functions.php';
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
	<div class=menusection>
		<button class=menubutton>
			<div class=divone></div>
			<div class=divtwo></div>
			<div class=divthree></div>
		</button>
			<div class=menucontent>
				<a href="#">one</a>
				<a href="#">two</a>
				<a href="#">three</a>
				<a href="#">four</a>
				<a href="#">five</a>
				<a href="#">six</a>
			</div>
	</div>

<div id=boxescontainer>
<!-- Game Winner (#1)-->
	<div class=boxes id=box1>winner/loser</div>
<!-- Goal scorers (#2)-->
	<div class=boxes id=box2>predictive goal scorers
	</div>
<!-- Login Box (#3)-->
	<div class=boxes id=box3>
		<form action="includes/loginscripts.php" method="POST">
				<input type="text" name="uid" placeholder="Login name/Email">
				<input type="password" name="upw" placeholder="Password">
			<button type="submit" name="submit">Login</button>
		</form>
		<?php
			if(isset($_GET['error'])) {
				if($_GET['error'] == 'emptyinput') {
					echo "<p>Missing fields</p>";
				} elseif ($_GET['error'] == 'incorrectusername') {
					echo "<p>Incorrect username</p>";
				}  elseif ($_GET['error'] == 'incorrectpw') {
					echo "<p>Incorrect password</p>";
				} 
			}
		?>
	</div>
<!--Goal Spreads (#4)-->
	<div class=boxes id=box4>
	</div>
<!--Skaters, HS (#5)-->
	<div class=boxes id=box5>hot streaks, skaters</div>
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