<?php

if (!isset($_SESSION)) {
  session_start();
}

require 'server.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Home</title>
</head>
<body>
<header>
		<div class="container">
			<div class="logo">
				<h1><a href="index.php">Project FIFA</a></h1>
			</div>
			<div class="login-register-logout">
				<!-- Is not logged in -->
		        <?php  if (!isset($_SESSION['username'])) : ?>
		          <p><a href="login.php">Login</a> Or <a href="register.php">Register</a></p>
		        <?php endif ?>

		        <!-- Is logged in -->
		        <?php  if (isset($_SESSION['username'])) : ?>
		          <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		          <p class="logout"><a href="logout.php">logout</a></p>
		        <?php endif ?>
			</div>
		</div>
</header>
	<nav>
		<div class="container">
			<ul>
				<?php  if(!isset($_SESSION['type'])) : ?>
					<?php else : ?>
						<?php  if($_SESSION['type'] === 'admin') : ?>
							<li><a href="InvoerResultaten.php">Invoer resultaten</a></li>
							<li><a href="InvoerTeamsEnSpelers.php">Invoer teams en spelers</a></li>
						<?php endif ?>
				<?php endif ?>
				<li><a href="Poule.php">Poule</a></li>
				<li><a href="Resultaten.php">Resultaten</a></li>
			</ul>
		</div>
	</nav>
	<div class="content">
		<div class="container">
			<?php  if(isset($_SESSION['type'])) : ?>
				<p>Account type: <strong><?php echo $_SESSION["type"]; ?></strong></p>
			<?php endif ?>
		</div>
	</div>
</body>
</html>