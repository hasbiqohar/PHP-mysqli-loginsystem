<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body>

    <header class="container-fluid bg-warning">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">Lazzzy Code</a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-label="Toggle navigation" name="button">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div id="navbarToggle" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="participants.php">Participants</a>
              </li>
            </ul>

            <?php
              if (isset($_SESSION['user_id'])) {
                ?>
                <form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="post">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Log out</button>
                </form>
                <?php
              } else {
                ?>
                <form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="post">
                  <input class="form-control mr-sm-2" type="text" name="user" placeholder="Username/e-mail" aria-label="Username">
                  <input class="form-control mr-sm-2" type="password" name="pass" placeholder="Password" aria-label="Password">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Log in</button>
                </form>
                <a class="btn btn-outline-light my-2 my-sm-0 ml-2" href="signup.php">Sign up</a>
                <?php
              }
            ?>
          </div>
        </nav>
      </div>
    </header>
