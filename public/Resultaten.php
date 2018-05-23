<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once ("../app/DatabaseConnector.php");

if(!isset($_SESSION['username'])) {
    header("Location: Login.php");
}



for ($i = 0; $i <= 20; $i++) {

    $sql = "SELECT `score_team_a` FROM `tbl_matches` WHERE `team_id_a` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $scores_a = $query->fetchAll();
    foreach ($scores_a as ${'scorea' . $i} ) {

    }
}

for ($i = 0; $i <= 20; $i++) {


    $sql = "SELECT `score_team_b` FROM `tbl_matches` WHERE `team_id_b` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $scores_b = $query->fetchAll();
    foreach ($scores_b as ${'scoreb' . $i} ) {

    }
}

$sql = "SELECT COUNT(*) FROM `tbl_teams`";
$count = $database->prepare($sql);
$count->execute();
$count = $count->fetch(PDO::FETCH_ASSOC);

for ($i = 0; $i <= $count['COUNT(*)']; $i++) {

    $sql = "SELECT `team_name` FROM `tbl_teams` WHERE `position` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $poules = $query->fetchAll();
    foreach ($poules as ${'poss' . $i} ) {

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Resultaten</title>
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
				<?php  if($_SESSION['type'] === 'admin') : ?>
				<li><a href="InvoerResultaten.php">Invoer resultaten</a></li>
				<li><a href="InvoerTeamsEnSpelers.php">Invoer teams en spelers</a></li>
				<?php endif ?>
				<li><a href="Poule.php">Poule</a></li>
				<li><a href="Resultaten.php">Resultaten</a></li>
			</ul>
		</div>
	</nav>
	<div class="content-resultaten">
		<div class="container">
            <div class="fteam">
                <p><?php echo $poss1['team_name']?></p>
                <p><?php echo $poss3['team_name']?></p>
                <p><?php echo $poss5['team_name']?></p>
                <p><?php echo $poss7['team_name']?></p>
                <p>empty</p>
                <p>empty</p>
                <p>empty</p>
                <p>empty</p>
            </div>
            <div class="score">
                <p><?php echo $scorea11['score_team_a']; ?></p>
                <p><?php echo $scorea13['score_team_a']; ?></p>
                <p><?php echo $scorea15['score_team_a']; ?></p>
                <p><?php echo $scorea17['score_team_a']; ?></p>
                <p>x</p>
                <p>x</p>
                <p>x</p>
                <p>x</p>
            </div>
            <div class="DOT">
                <p>-</p>
                <p>-</p>
                <p>-</p>
                <p>-</p>
                <p>-</p>
                <p>-</p>
                <p>-</p>
                <p>-</p>
            </div>
            <div class="score2">
                <p><?php echo $scoreb12['score_team_b']; ?></p>
                <p><?php echo $scoreb14['score_team_b']; ?></p>
                <p><?php echo $scoreb16['score_team_b']; ?></p>
                <p><?php echo $scoreb18['score_team_b']; ?></p>
                <p>x</p>
                <p>x</p>
                <p>x</p>
                <p>x</p>
            </div>
            <div class="lteam">
                <p><?php echo $poss2['team_name']?></p>
                <p><?php echo $poss4['team_name']?></p>
                <p><?php echo $poss6['team_name']?></p>
                <p><?php echo $poss8['team_name']?></p>
                <p>empty</p>
                <p>empty</p>
                <p>empty</p>
                <p>empty</p>
            </div>
		</div>
	</div>
</body>
</html>