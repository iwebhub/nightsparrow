<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your identity</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<div class="norm install-wrapper hideme">
		<h1>Who are you?</h1>
		<p></p>
		<div class="install-form">
			<input class="full-in" type="text" placeholder="Your full name">
			<span class="hint" id="half-hint">eg. John Oliver</span>
			<input class="full-in" type="text" placeholder="Your email">
			<span class="hint">eg. example@domain.com</span>
			<input class="full-in" type="password" placeholder="You password">
			<span class="hint">eg. oi27ajJSo43</span>
			<div class="action">
			<a href="step_second.php"><button class="delete-theme">Step back</button></a>
			<a href="step_fourth.php"><button class="more-themes">Add user</button></a>
			<p id="hint-help">Need help?</p>
			</div>
		</div>
	</div>

	<div class="steps-list">
		<ul>
			<li class="done">Step 1: setting up the database</li>
			<li>Step 2: adding a user</li>
			<li>Step 3: choosing a website type</li>
			<li>Step 4: describing the website</li>
			<li>Step 5: selecting a template</li>
			<li>Step 6: done! :D</li>
		</ul>
	</div>


	<!-- hint -->
		<div class="hint-text">
			<p>If you need help with this step you should probably not be using this peace of software.
			</p>
		</div>
	<!-- hint -->

	<!-- JS -->
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script src="../js/jquery.js"></script>
</body>
</html>