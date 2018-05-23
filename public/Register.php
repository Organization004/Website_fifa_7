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
    <title>Register</title>
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
					<h1>CREATE A ACCOUNT</h1>
					<div class="register-input">
						<div class="email-error">
							<?php  if (isset($emailErrorMessage2)) : ?> <p><?php echo $emailErrorMessage2; ?></p> <?php endif ?>
							<?php  if (isset($emailErrorMessage1)) : ?> <p><?php echo $emailErrorMessage1; ?></p> <?php endif ?>
							<?php  if (isset($emailErrorMessage0)) : ?> <p><?php echo $emailErrorMessage0; ?></p> <?php endif ?>
						</div>
						<input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
						<label for="email" class="control-label">E-MAIL ADDRESS</label>
					</div>
					<div class="register-input">
						<div class="username-error">
							<?php  if (isset($usernameErrorMessage3)) : ?> <p><?php echo $usernameErrorMessage3; ?></p> <?php endif ?>
							<?php  if (isset($usernameErrorMessage2)) : ?> <p><?php echo $usernameErrorMessage2; ?></p> <?php endif ?>
							<?php  if (isset($usernameErrorMessage1)) : ?> <p><?php echo $usernameErrorMessage1; ?></p> <?php endif ?>
							<?php  if (isset($usernameErrorMessage0)) : ?> <p><?php echo $usernameErrorMessage0; ?></p> <?php endif ?>
						</div>
						<input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
						<label for="username" class="control-label">USERNAME</label>
					</div>
					<div class="register-input">
						<?php  if (isset($passwordErrorMessage1)) : ?> <p><?php echo $passwordErrorMessage1; ?></p> <?php endif ?>
						<?php  if (isset($passwordErrorMessage0)) : ?> <p><?php echo $passwordErrorMessage0; ?></p> <?php endif ?>
						<div id="password-requirements">
							<p>Your password must:</p>
							<p><?php echo $passwordRequirementArray[0]; ?></p>
							<p><?php echo $passwordRequirementArray[1]; ?></p>
							<p><?php echo $passwordRequirementArray[2]; ?></p>
							<p><?php echo $passwordRequirementArray[3]; ?></p>
						</div>
						<input type="password" name="password" id="password"
						onfocus="document.getElementById('password-requirements').style.display='block';"
						onblur="document.getElementById('password-requirements').style.display='none';">
						<label for="password" class="control-label">PASSWORD</label>
					</div>
					<div class="register-input">
						<p><?php echo $confirmPasswordErrorMessage; ?></p>
						<input type="password" name="confirm-password" id="confirm-password">
						<label for="confirm-password" class="control-label">CONFIRM PASSWORD</label>
					</div>
					<div class="register-button">
						<input type="submit" value="CREATE ACCOUNT" name="btn-register">
					</div>
					<ul>
						<li><?php echo $successMessage; ?></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>