<?php

session_start();

if (isset($_POST['submit'])) {

  include "dbh.inc.php";

  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);

  if (empty($user) || empty($pass)) {
    header("Location: ../index.php?login=empty");
    exit();
  } else {

    $sql = "SELECT * FROM users WHERE user_name=? or user_email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?login=error2");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck < 1) {
        header("Location: ../index.php?login=error1");
        exit();
      } else {



        if ($row = mysqli_fetch_assoc($result)) {

          $passHash = password_verify($pass, $row['user_pass']);

          if ($passHash == false) {
            header("Location: ../index.php?login=error3");
            exit();
          } elseif ($passHash == true) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_firstname'] = $row['user_firstname'];
            $_SESSION['user_lastname'] = $row['user_lastname'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_name'] = $row['user_name'];
            header("Location: ../index.php?login=success");
            exit();
          }

        }

      }

    }

  }

} else {
  header("Location: ../index.php");
  exit();
}
