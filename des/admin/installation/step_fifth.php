<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your identity</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<div class="norm install-wrapper hideme">
		<h1>Describe us your website</h1>
		<p>Basic info will be alright</p>
		<div class="install-form">
			<input class="full-in" type="text" placeholder="How shall website be named">
			<span class="hint" id="half-hint">eg. Nightsparrow — CMS</span>
			<textarea class="full-in txt-a" type="text" placeholder="Describe your site"></textarea>
			<div class="action">
			<a href="step_fourth.php"><button class="delete-theme">Step back</button></a>
			<a href="step_sixth.php"><button class="more-themes">Done</button></a>
			<p id="hint-help">Need help?</p>
			</div>
		</div>
	</div>

	<!-- hint -->
		<div class="hint-text">
			<p>Just name your site whatever you please. This name will appear on website's tab, etc. Facebook (1), Google, Instagram... <br><br>
			<span>Describe your site</span> as it is, just type in what you know about what this website should stand for and be userd for.
			</p>
		</div>
	<!-- hint -->

	<div class="steps-list">
		<ul>
			<li class="done">Step 1: set up database</li>
			<li class="done">Step 2: add user</li>
			<li class="done">Step 3: choose site's purpose</li>
			<li class="done">Step 4: describe site</li>
			<li>Step 5: select theme</li>
			<li>Step 6: finish</li>
		</ul>
	</div>

	<!-- JS -->
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script src="../js/jquery.js"></script>
</body>
</html>