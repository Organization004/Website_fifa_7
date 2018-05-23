<?php

if (!isset($_SESSION)) {
  session_start();
  error_reporting(E_ALL & ~E_NOTICE);
}
require ("../app/DatabaseConnector.php");
require ("server.php");

if(!isset($_SESSION['username']))
{
	header("Location: Login.php");
}

if($_SESSION['type'] != 'admin')
{
	header("Location: Index.php");
}

for ($i = 0; $i <= 14; $i++) {

    $sql = "SELECT * FROM `tbl_teams` WHERE `position` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $poules = $query->fetchAll();
    foreach ($poules as ${'poss' . $i}) {

    }
}
$teamname = $_POST['results'];
$teamname2 = $_POST['results2'];
$score = $_POST['score'];
$score2 = $_POST['score2'];

if ($_POST['done']) {
    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_a` = '$score' WHERE `team_id_a`  = '$teamname' ");
    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_b` = '$score' WHERE `team_id_b`  = '$teamname' ");
    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_a` = '$score2' WHERE `team_id_a`  = '$teamname2' ");
    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_b` = '$score2' WHERE `team_id_b`  = '$teamname2' ");
}
// UPDATE `tbl_matches` SET `score_team_a`= 0 ,`score_team_b`= 0
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Invoer Resultaten</title>
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
	<div class="invoer-resultaten">
		<div class="container">
            <div class="first">
            <form action="InvoerResultaten.php" method="post" name="scorein">
                <div class="first-left">
            <p>
                <select name="results" size="1">
                    <?php
                    for ($i = 1; $i <= 8; $i++): ?>

                        <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                    <?php endfor;
                    ?>
                </select>
            </p>
                    <p>
                <select name="results2" size="1">
                    <?php
                    for ($i = 1; $i <= 8; $i++): ?>

                        <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                    <?php endfor;
                    ?>
                </select>
            </p>
                </div>
                <div class="text">
                    <p>Score</p>
                    <p>-</p>
                    <p>Score</p>
                </div>
            <div class="send">
                <input type="number" min="0" max="100" name="score" class="score">
                <input type="number" min="0" max="100" name="score2">
            </div>
                <div class="sendd">
                <input type="submit" name="done" value="Send">
                </div>
            </form>
            </div>
            <div class="semi">
            <form action="InvoerResultaten.php" method="post">
                <p>
                    <select name="results2" size="1">
                        <?php
                        for ($i = 8; $i <= 11; $i++): ?>

                            <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                        <?php endfor;
                        ?>
                    </select>
                </p>
                <p>
                    <select name="results2" size="1">
                        <?php
                        for ($i = 8; $i <= 11; $i++): ?>

                            <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                        <?php endfor;
                        ?>
                    </select>
                </p>

                <input type="number" min="0" max="100" name="score">
                <input type="number" min="0" max="100" name="score2">

                <input type="submit" name="done">

            </form>
            </div>
            <div class="finals">
            <form action="InvoerResultaten.php" method="post">
                <p>
                    <select name="results2" size="1">
                        <?php
                        for ($i = 13; $i <= 14; $i++): ?>

                            <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                        <?php endfor;
                        ?>
                    </select>
                </p>
                <p>
                    <select name="results2" size="1">
                        <?php
                        for ($i = 13; $i <= 14; $i++): ?>

                            <option value="<?php echo ${'poss' . $i}['id'] ?>"><?php echo  ${'poss' . $i}['team_name'] ?></option>

                        <?php endfor;
                        ?>
                    </select>
                </p>

                <input type="number" min="0" max="100" name="score">
                <input type="number" min="0" max="100" name="score2">

                <input type="submit" name="done">

            </form>
            </div>
        </div>
	</div>
</body>
</html>