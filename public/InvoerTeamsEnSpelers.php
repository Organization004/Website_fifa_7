<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once ("../app/DatabaseConnector.php");

if(!isset($_SESSION['username']))
{
    header("Location: Login.php");
}

if($_SESSION['type'] != 'admin')
{
    header("Location: Index.php");
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
    <title>Invoer teams en spelers</title>
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
<div class="invoer-teams-en-spelers">
    <div class="container">
        <h4>Invoer Teams + Spelers</h4>
        <div class="invoer-border">
            <div class="step1">
                <h1>1</h1>
                <p>Naam Team</p>
                <form>
                    <input type="text">
                </form>
            </div>
            <div class="step2">
                <h1>2</h1>
                <ul>
                    <li>
                        <p>Selecteer speler 1</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                    <li>
                        <p>Selecteer speler 2</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                    <li>
                        <p>Selecteer speler 3</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                    <li>
                        <p>Selecteer speler 4</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                    <li>
                        <p>Selecteer speler 5</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                    <li>
                        <p>Selecteer reserve</p>
                        <select>
                            <option>Speler 1</option>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="step3">
                <h1>3</h1>
                <form>
                    <input type="submit" value="Team invoeren" name="">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>