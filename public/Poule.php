<?php

if (!isset($_SESSION)) {
  session_start();
  error_reporting(E_ALL & ~E_NOTICE);
}

require ("../app/DatabaseConnector.php");
require ("server.php");

$edit = 0;

if(!isset($_SESSION['username']))
{
	header("Location: Login.php");
}

if (isset($_POST['edit']))
{
    $edit = 1;
}

if (isset($_POST['edit2']))
{
    $edit = 0;
}

for ($i = 0; $i <= 100; $i++) {

    $sql = "SELECT `naam` FROM `tbl_poules` WHERE `id` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $poules = $query->fetchAll();
    foreach ($poules as ${'file' . $i} ) {

    }
}
for ($i = 0; $i <= 13; $i++) {

    $sql = "SELECT `team_name` FROM `tbl_teams` WHERE `position` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $poules = $query->fetchAll();
    foreach ($poules as ${'poss' . $i} ) {

    }
}

for ($i = 10; $i <=12; $i++) {

    $sql = "SELECT `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `team_id_a` = '1' && `team_id_b` = '2'";
    $query = $database->prepare($sql);
    $query->execute();
    $poules = $query->fetchAll();
    foreach ($poules as ${'poss' . $i} ) {
    }
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

if (isset($_POST['send']))
{
    $pos1 = $_POST['poule1'];
    $pos2 = $_POST['poule2'];
    $pos3 = $_POST['poule3'];
    $pos4 = $_POST['poule4'];
    $pos5 = $_POST['poule5'];
    $pos6 = $_POST['poule6'];
    $pos7 = $_POST['poule7'];
    $pos8 = $_POST['poule8'];
    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_a`= 0 ,`score_team_b`= 0");
}
if($pos1 != NULL && $pos2 != NULL && $pos3 != NULL && $pos4 != NULL && $pos5 != NULL && $pos6 != NULL && $pos7 != NULL && $pos8 != NULL) {
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos1' WHERE `position` = '1'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos2' WHERE `position` = '2'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos3' WHERE `position` = '3'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos4' WHERE `position` = '4'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos5' WHERE `position` = '5'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos6' WHERE `position` = '6'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos7' WHERE `position` = '7'");
    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$pos8' WHERE `position` = '8'");

//    $sql = $database->query("UPDATE `tbl_matches` SET `score_team_a`=10 WHERE `team_id_a` = 11");
}

$sql = "SELECT COUNT(*) FROM `tbl_poules` ";
$count = $database->prepare($sql);
$count->execute();
$count = $count->fetch(PDO::FETCH_ASSOC);


for ($i = 10; $i <= 24; $i++) {

    $sql = "SELECT `score_team_a` FROM `tbl_matches` WHERE `team_id_a` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $score = $query->fetchAll();
    foreach ($score as ${'scorez' . $i} ) {

    }
}
for ($i = 10; $i <= 24; $i++) {

    $sql = "SELECT `score_team_b` FROM `tbl_matches` WHERE `team_id_b` = '$i'";
    $query = $database->prepare($sql);
    $query->execute();
    $score = $query->fetchAll();
    foreach ($score as ${'scorez' . $i} ) {

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
    <title>Poule</title>
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
    <?php  if($_SESSION['type'] === 'admin' && $edit == '0') : ?>
    <div class="poule">
        <form action="Poule.php" method="post" class="dani" name="dani">
        <div class="container">
            <div class="left">
                <div class="left-top">
                    <p>
                        <select name="poule1" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                    <p>
                        <select name="poule2" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                </div>
                <div class="left-bottom">
                    <p>
                        <select name="poule3" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                    <p>
                        <select name="poule4" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                </div>
            </div>
            <div class="mid-left">
                <div class="mid-top-left">
                    <p>
                        <?php
                        if ($scorez11['score_team_a'] != 0 || $scorez12['score_team_b'] != 0) {
                            if ($scorez11['score_team_a'] > $scorez12['score_team_b']) {
                                echo $poss1['team_name'];
                                $team1 = $poss1['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team1' WHERE `position` = '9'");
                            } else {
                                echo $poss2['team_name'];
                                $team2 = $poss2['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team2' WHERE `position` = '9'");
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="mid-bottom-left">
                    <p>
                        <?php
                        if ($scorez13['score_team_a'] != 0 || $scorez14['score_team_b'] != 0) {
                            if ($scorez13['score_team_a'] > $scorez14['score_team_b']) {
                                echo $poss3['team_name'];
                                $team3 = $poss3['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team3' WHERE `position` = '10'");
                            } else {
                                echo $poss4['team_name'];
                                $team4 = $poss4['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team4' WHERE `position` = '10'");
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="main-mid">
                <div class="main-mid-top">
                    <p>
                        <?php
                        if ($scorez19['score_team_a'] != 0 || $scorez20['score_team_b'] != 0) {
                            if ($scorez19['score_team_a'] > $scorez20['score_team_b']) {
                                echo $poss9['team_name'];
                                $team9 = $poss9['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team9' WHERE `position` = '13'");
                            } else {
                                echo $poss10['team_name'];
                                $team10 = $poss10['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team10' WHERE `position` = '13'");
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="champion">
                    <img src="../img/cup3.png" alt="">
                    <p>
                        <?php
                        if ($scorez23['score_team_a'] != 0 || $scorez24['score_team_b'] != 0) {
                            echo $poss13['team_name'];
                        }
                        ?>
                    </p>
                </div>
                <div class="main-mid-bottom">
                    <p>
                        <?php
                        if ($scorez21['score_team_a'] != 0 || $scorez22['score_team_b'] != 0) {
                            if ($scorez21['score_team_a'] > $scorez22['score_team_b']) {
                                echo $poss11['team_name'];
                                $team11 = $poss11['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team11' WHERE `position` = '14'");
                            } else {
                                echo $poss12['team_name'];
                                $team12 = $poss12['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team12' WHERE `position` = '14'");
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div>
                <div class="mid-right">
                    <div class="mid-top-right">
                        <p>
                            <?php

                            if ($scorez15['score_team_a'] != 0 || $scorez16['score_team_b'] != 0) {
                                if ($scorez15['score_team_a'] > $scorez16['score_team_b']) {
                                    echo $poss5['team_name'];
                                    $team5 = $poss5['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team5' WHERE `position` = '11'");
                                } else {
                                    echo $poss6['team_name'];
                                    $team6 = $poss6['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team6' WHERE `position` = '11'");
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="mid-bottom-right">
                        <p>
                            <?php
                            if ($scorez17['score_team_a'] != 0 || $scorez18['score_team_b'] != 0) {
                                if ($scorez17['score_team_a'] > $scorez18['score_team_b']) {
                                    echo $poss7['team_name'];
                                    $team7 = $poss7['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team7' WHERE `position` = '12'");
                                } else {
                                    echo $poss8['team_name'];
                                    $team8 = $poss8['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team8' WHERE `position` = '12'");
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="right-top">
                    <p>
                        <select name="poule5" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                    <p>
                        <select name="poule6" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                </div>
                <div class="right-bottom">
                    <p>
                        <select name="poule7" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                    <p>
                        <select name="poule8" size="1">
                            <?php
                            for ($i = 1; $i <= $count['COUNT(*)']; $i++): ?>

                                <option><?php echo  ${'file' . $i}['naam'] ?></option>

                            <?php endfor;
                            ?>
                        </select>
                    </p>
                </div>
            </div>

        </div>
            <input value="View as user" type="submit" name="edit" class="btn1">
            <?php if ($scorez11['score_team_a'] != 0 || $scorez12['score_team_b'] != 0 || $scorez13['score_team_a'] != 0 || $scorez14['score_team_b'] != 0 || $scorez15['score_team_a'] != 0 || $scorez16['score_team_b'] != 0 || $scorez17['score_team_a'] != 0 || $scorez18['score_team_b'] != 0) ?>
            <input value="Save teams" type="submit" name="send" class="btn1">
        </form>
    </div>
    <?php endif ?>

    <?php  if($_SESSION['type'] === 'user' || $edit == '1') : ?>
        <div class="poule">
		<div class="container">
            <div class="left">
                <div class="left-top">
                    <p><?php echo $poss1['team_name']?></p>
                    <p><?php echo $poss2['team_name'] ?></p>
                </div>
                <div class="left-bottom">
                    <p><?php echo $poss3['team_name'] ?></p>
                    <p><?php echo $poss4['team_name'] ?></p>
                </div>
            </div>
            <div class="mid-left">
                <div class="mid-top-left">
                    <p>
                        <?php
                        if ($scorez11['score_team_a'] != 0 || $scorez12['score_team_b'] != 0) {
                            if ($scorez11['score_team_a'] > $scorez12['score_team_b']) {
                                echo $poss1['team_name'];
                                $team1 = $poss1['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team1' WHERE `position` = '9'");
                            } else {
                                echo $poss2['team_name'];
                                $team2 = $poss2['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team2' WHERE `position` = '9'");
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="mid-bottom-left">
                    <p>
                        <?php
                        if ($scorez13['score_team_a'] != 0 || $scorez14['score_team_b'] != 0) {
                            if ($scorez13['score_team_a'] > $scorez14['score_team_b']) {
                                echo $poss3['team_name'];
                                $team3 = $poss3['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team3' WHERE `position` = '10'");
                            } else {
                                echo $poss4['team_name'];
                                $team4 = $poss4['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team4' WHERE `position` = '10'");
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="main-mid">
                <div class="main-mid-top">
                    <p>
                        <?php
                        if ($scorez19['score_team_a'] != 0 || $scorez20['score_team_b'] != 0) {
                            if ($scorez19['score_team_a'] > $scorez20['score_team_b']) {
                                echo $poss9['team_name'];
                                    $team9 = $poss9['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team9' WHERE `position` = '13'");
                            } else {
                                echo $poss10['team_name'];
                                    $team10 = $poss10['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team10' WHERE `position` = '13'");
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="champion">
                    <img src="../img/cup3.png" alt="cup" id="cup">
                    <p>
                        <?php
                        if ($scorez23['score_team_a'] != 0 || $scorez24['score_team_b'] != 0) {
                            echo $poss13['team_name'];
                        }
                        ?>
                    </p>
                </div>
                <div class="main-mid-bottom">
                    <p>
                        <?php
                        if ($scorez21['score_team_a'] != 0 || $scorez22['score_team_b'] != 0) {
                            if ($scorez21['score_team_a'] > $scorez22['score_team_b']) {
                                echo $poss11['team_name'];
                                    $team11 = $poss11['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team11' WHERE `position` = '14'");
                            } else {
                                echo $poss12['team_name'];
                                    $team12 = $poss12['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team12' WHERE `position` = '14'");
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div>
                <div class="mid-right">
                    <div class="mid-top-right">
                        <p>
                        <?php

                        if ($scorez15['score_team_a'] != 0 || $scorez16['score_team_b'] != 0) {
                            if ($scorez15['score_team_a'] > $scorez16['score_team_b']) {
                                echo $poss5['team_name'];
                                $team5 = $poss5['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team5' WHERE `position` = '11'");
                            } else {
                                echo $poss6['team_name'];
                                $team6 = $poss6['team_name'];
                                $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team6' WHERE `position` = '11'");
                            }
                        }
                        ?>
                        </p>
                    </div>
                    <div class="mid-bottom-right">
                        <p>
                            <?php
                            if ($scorez17['score_team_a'] != 0 || $scorez18['score_team_b'] != 0) {
                                if ($scorez17['score_team_a'] > $scorez18['score_team_b']) {
                                    echo $poss7['team_name'];
                                    $team7 = $poss7['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team7' WHERE `position` = '12'");
                                } else {
                                    echo $poss8['team_name'];
                                    $team8 = $poss8['team_name'];
                                    $sql = $database->query("UPDATE `tbl_teams` SET `team_name`='$team8' WHERE `position` = '12'");
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="right-top">
                    <p><?php echo $poss5['team_name'] ?></p>
                    <p><?php echo $poss6['team_name'] ?></p>
                </div>
                <div class="right-bottom">
                    <p><?php echo $poss7['team_name'] ?></p>
                    <p><?php echo $poss8['team_name'] ?></p>
                </div>
            </div>
		</div>
            <?php  if($_SESSION['type'] === 'admin') : ?>
                <form>
                    <input value="View as admin" type="submit" name="edit2" class="btn1">
                </form>
            <?php endif ?>
	</div>
    <?php endif ?>

    <div class="results">
    <div class="Pouleresults">
        <div class="teams">
            <h2>Poule A</h2>
            <ul>
                <li>
                    <p class="tag">Teams</p>
                </li>
                <li>
                    <p><?php echo $poss1['team_name'] ?></p>
                </li>
                <li>
                    <p><?php echo $poss2['team_name'] ?></p>
                </li>
                <li>
                    <p><?php echo $poss3['team_name'] ?></p>
                </li>
                <li>
                    <p><?php echo $poss4['team_name'] ?></p>
                </li>
            </ul>
        </div>
        <div class="score">
            <ul>
                <li>
                    <p class="tag">Score</p>
                </li>
                <li>
                    <p><?php echo $scorea11['score_team_a']; ?></p>
                </li>
                <li>
                    <p><?php echo $scoreb12['score_team_b']; ?></p>
                </li>
                <li>
                    <p><?php echo $scorea13['score_team_a']; ?></p>
                </li>
                <li>
                    <p><?php echo $scoreb14['score_team_b']; ?></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="result">

    <div class="Pouleresults">
        <div class="teams">
            <h2>Poule B</h2>
            <ul>
                <div class="team">
                <li>
                    <p class="tag">Team</p><p class="tag">Score</p><p class="tag">Team</p>
                </li>
                </div>
                <li>
                    <p><?php echo $poss5['team_name'] . '' . ' ' .  $scorea15['score_team_a'].'-'.$scoreb16['score_team_b'] . ' ' . ' ' . $poss6['team_name'] ?></p>
                </li>

            </ul>
        </div>
        <div class="score">

        </div>
    </div>
</div>
</div>
</body>
</html>