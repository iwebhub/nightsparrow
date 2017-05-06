<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Installing Nightsparrow &middot; Step 1: Getting connected</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>

	<div class="norm install-wrapper hideme">
		<h1>Let's get connected.</h1>
		<p>Nightsparrow requires a MySQL database. Enter the connection data below. <br>If you don't know what to enter, get your hosting provider to help you.</p>
		<div class="install-form">
			<input class="full-in" type="text" placeholder="MySQL database">
			<span class="hint" id="half-hint">eg. localhost</span>
				<div class="half-in">
				<input type="text" name="mysqlusername" placeholder="MySQL username"><input type="password" name="mysqlpassword" placeholder="MySQL password">
				</div>
			<span class="hint" id="half-hint">eg. root</span>
			<input class="full-in" type="text" placeholder="MySQL database">
			<span class="hint">eg. nscms</span>
			<div class="action">
			<a href="step_third.php"><button class="more-themes">Connect and populate</button></a>
			<p id="hint-help">Need a hint?</p>
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
			<p><span>MySQL server</span> - refers to path to your MySQL server. This is usually  <i>localhost</i> if your server provider didn't specify otherwise. If you need to specify a port, use the <code>server:port</code> syntax.<br><br>
			<span>MySQL username</span> - refers to your account which you are logging into your <i>database</i>.<br><br>
			<span>MySQL database</span> - refers to database name that you want Nightsparrow to use. The database has to exist.
			</p>
		</div>
	<!-- hint -->

	<!-- JS -->
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script src="../js/jquery.js"></script>
</body>
</html>