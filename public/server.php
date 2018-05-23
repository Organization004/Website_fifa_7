<?php

if (!isset($_SESSION)) {
  session_start();
}

require ("../app/DatabaseConnector.php");

$emailErrorArray = array(
  "Please enter an e-mail address",
  "Invalid e-mail address",
  "E-mail address is already taken"
);

$usernameErrorArray = array(
  "Please enter an username",
  "Username can only contain english letters or the numbers 0-9",
  "Your username must be at least 4 characters long",
  "Username is already taken",
  "The username or password is incorrect"
);

$passwordErrorArray = array(
  "Please enter a password",
  "Invalid password"
);

$passwordRequirementArray = array(
  "Be between 6 and 64 characters long",
  "Contain at least one lowercase letter",
  "Contain at least one uppercase letter",
  "Contain at least one number"
);

$loginErrorArray = array(
  "Please enter your username",
  "Please enter your password",
  "The username or password is incorrect"
);

//----------------------------------------------------------------REGISTER----------------------------------------------------------------\\
if(isset($_POST['btn-register'])) {

  $ValidEmail = true;
  $ValidUsername = true;
  $ValidPassword = true;
  $ValidConfirmPassword = true;

  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  //--------------------------------------------EMAIL--------------------------------------------\\
  if(empty($email)) {
    $emailErrorMessage0 = $emailErrorArray[0];
    $ValidEmail = false;
  }
  else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErrorMessage1 = $emailErrorArray[1];
      $ValidEmail = false;
    }
    else {
      $query = $database->prepare("SELECT email FROM tbl_login WHERE email = '$email'");
      $query->execute();
      if( $query->rowCount() > 0 ) {
        $emailErrorMessage2 = $emailErrorArray[2];
        $ValidEmail = false;
      }
    }
  }

  //--------------------------------------------USERNAME--------------------------------------------\\
  if(empty($username)) {
    $usernameErrorMessage0 = $usernameErrorArray[0];
    $ValidUsername = false;
  }
  else {
    if (!preg_match("/^[a-zA-Z0-9]+$/",$username) || strpos($username, ' ') !== false) {
      $usernameErrorMessage1 = $usernameErrorArray[1];
      $ValidUsername = false;
    }
    else {
      if(strlen($username) < 4) {
        $usernameErrorMessage2 = $usernameErrorArray[2];
        $ValidUsername = false;
      }
      else {
        $query = $database->prepare("SELECT username FROM tbl_login WHERE username = '$username'");
        $query->execute();
        if( $query->rowCount() > 0 ) {
          $usernameErrorMessage3 = $usernameErrorArray[3];
          $ValidUsername = false;
        }
      }
    }
  }

  //--------------------------------------------PASSWORD--------------------------------------------\\
  if(empty($password)) {
    $passwordErrorMessage0 = $passwordErrorArray[0];
    $ValidPassword = false;
  }
  else {
    if(strlen($password) < 6 || strlen($password) > 64) {
      $passwordErrorMessage1 = $passwordErrorArray[1];
      $ValidPassword = false;
    }
    if(!preg_match("#[a-z]+#", $password)) {
      $passwordErrorMessage2 = $passwordErrorArray[1];
      $ValidPassword = false;
    }
    if(!preg_match("#[A-Z]+#", $password)) {
      $passwordErrorMessage3 = $passwordErrorArray[1];
      $ValidPassword = false;
    }
    if(!preg_match("#[0-9]+#", $password)) {
      $passwordErrorMessage4 = $passwordErrorArray[1];
      $ValidPassword = false;
    }
  }

  //--------------------------------------------PASSWORD--------------------------------------------\\
  if($confirmPassword !== $password) {
    $confirmPasswordErrorMessage = "Password is not the same";
    $ValidConfirmPassword = false;
  }

  //--------------------------------------------CHECK--------------------------------------------\\
  if($ValidEmail == true && $ValidUsername == true && $ValidPassword == true && $ValidConfirmPassword == true) {
    $query = $database->query("INSERT INTO tbl_login (email, username, password) VALUES ('$email', '$username', '$hash')");
    $successMessage = "Registered successfully";
  }
}


//----------------------------------------------------------------LOGIN----------------------------------------------------------------\\
if(isset($_POST['btn-login'])) {  

  $username = $_POST['username'];
  $password = $_POST['password'];

  $ValidUsername = true;
  $ValidPassword = true;

  //--------------------------------------------USERNAME--------------------------------------------\\
  if(empty($username)) {
    $loginErrorMessage0 = $loginErrorArray[0];
    $ValidUsername = false;
  }

  //--------------------------------------------PASSWORD--------------------------------------------\\
  if(empty($password)) {
    $loginErrorMessage1 = $loginErrorArray[1];
    $ValidPassword = false;
  }

  //--------------------------------------------CHECK--------------------------------------------\\
  if($ValidUsername == true && $ValidPassword == true) {

    $query = $database->prepare("SELECT username FROM tbl_login WHERE username = :username");
    $query->bindValue(":username", $username);
    $query->execute();
    if ($query->rowCount() > 0) {
      $query = $database->prepare("SELECT password FROM tbl_login WHERE username = :username");
      $query->bindValue(":username", $username);
      $query->execute();
      $hash = $query->fetch();


      if (password_verify($password, $hash['password'])) {
          $_SESSION['username'] = $_POST['username'];


          class TableRows extends RecursiveIteratorIterator {
          }
          $username = $_SESSION['username'];
          $stmt = $database->prepare("SELECT type FROM tbl_login WHERE username = '$username'");
          $stmt->execute();
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$type) {
              $_SESSION['type'] = $type;
          }
        echo "xd";
        $_SESSION['username'] = $_POST['username'];
        header("location:Index.php");
      }
      else {
        $loginErrorMessage2 = $loginErrorArray[2];
      }
    }
    else {
      $loginErrorMessage2 = $loginErrorArray[2];
    }
  }
}

?>