<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select site's purpose</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>

	<div class="selec norm install-wrapper hideme">
		<h1>Who are you working for?</h1>
		<p>This website, ofcourse!</p>
		<div class="select-purpose">
		<a href="step_fifth.php">
			<div class="single">
				<img src="../img/man-user.png">
				<p>Yourself or a group of people</p>
			</div>
			<div class="single">
				<img src="../img/group.png">
				<p>Company or organizaion</p>
			</div>
			<div class="single">
				<img src="../img/presentation.png">
				<p>Product or project</p>
			</div>
			<div class="single">
				<img src="../img/blog.png">
				<p>Blog</p>
			</div>
		</a>
		</div>
		<input class="full-in not-ab" type="text" placeholder="Something else">
		<a href="step_fifth.php"><button class="more-themes">Done</button></a>
		<a href="step_third.php"><button class="no-float delete-theme">Step back</button></a>
	</div>

	<div class="steps-list">
		<ul>
			<li class="done">Step 1: set up database</li>
			<li class="done">Step 2: add user</li>
			<li class="done">Step 3: choose site's purpose</li>
			<li>Step 4: describe site</li>
			<li>Step 5: select theme</li>
			<li>Step 6: finish</li>
		</ul>
	</div>

	<!-- JS -->
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script src="../js/jquery.js"></script>
</body>
</html>