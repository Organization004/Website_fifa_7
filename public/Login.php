<?php  

error_reporting(E_ALL & ~E_NOTICE);

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['username'])) {
	header("location:Index.php"); 
}

include 'server.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>Login</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<h1><a href="Index.php">Project Fifa</a></h1>
			</div>
			<div class="login-register-logout">
				<!-- Is not logged in -->
		        <?php  if (!isset($_SESSION['username'])) : ?>
		          <p><a href="Login.php">Login</a> Or <a href="Register.php">Register</a></p>
		        <?php endif ?>

		        <!-- Is logged in -->
		        <?php  if (isset($_SESSION['username'])) : ?>
		          <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		          <p class="logout"><a href="Logout.php">logout</a></p>
		        <?php endif ?>
			</div>
		</div>
	</header>
	<nav>
		<div class="container">
			<ul>

			</ul>
		</div>
	</nav>
	<div class="register">
		<div class="container">
			<div class="register-background">
				<form autocomplete="off" method="post">
					<h1>LOG IN TO YOUR ACCOUNT</h1>
					<div class="register-input">
						<div class="username-error">
							<?php  if (isset($loginErrorMessage2)) : ?> <p><?php echo $loginErrorMessage2; ?></p> <?php endif ?>
						</div>
					</div>
					<div class="register-input">
						<div class="username-error">
							<?php  if (isset($loginErrorMessage0)) : ?> <p><?php echo $loginErrorMessage0; ?></p> <?php endif ?>
						</div>
						<input type="text" name="username" id="username">
						<label for="username" class="control-label">USERNAME</label>
					</div>
					<div class="register-input">
						<div class="password-error">
							<?php  if (isset($loginErrorMessage1)) : ?> <p><?php echo $loginErrorMessage1; ?></p> <?php endif ?>
						</div>
						<input type="password" name="password" id="password">
						<label for="password" class="control-label">PASSWORD</label>
					</div>
					<div class="register-button">
						<input type="submit" value="LOG IN" name="btn-login">
					</div>
					<div class="forgot-password">
						<p><a href="test.php">Forgot password?</a></p>
					</div>
					<?php if(isset($message)){ echo $message; } ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>