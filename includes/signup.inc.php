<?php

if (isset($_POST['submit'])) {

  include_once "dbh.inc.php";

  $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $user = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($firstName) || empty($lastName) || empty($email) || empty($user) || empty($pass)) {
    header("Location: ../signup.php?signup=empty");
    exit();
  } else {
    if (!preg_match("/^([A-Z])([a-z])+$/", $firstName) || !preg_match("/^([A-Z])([a-z])+$/", $lastName)) {
      header("Location: ../signup.php?signup=invalid-char");
      exit();
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=invalid-email&firstname=$firstName&lastname=$lastName");
        // header("Location: ../signup.php?signup=invalid-email");
        exit();
      } else {

        $sql = "SELECT * FROM users WHERE user_email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?signup=sql-error");
          exit();
        } else {

          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            header("Location: ../signup.php?signup=email-taken&firstname=$firstName&lastname=$lastName");
            // header("Location: ../signup.php?signup=email-taken");
            exit();
          } else {

            $sql = "SELECT * FROM users WHERE user_name=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../signup.php?signup=sql-error");
              exit();
            } else {

              mysqli_stmt_bind_param($stmt, "s", $user);
              mysqli_stmt_execute($stmt);

              $result = mysqli_stmt_get_result($stmt);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                header("Location: ../signup.php?signup=username-taken&firstname=$firstName&lastname=$lastName&email=$email");
                // header("Location: ../signup.php?signup=username-taken");
                exit();
              } else {

                if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])([0-9a-zA-Z!@#$%]){8,}$/", $pass)) {

                  $passCnt = strlen($pass);

                  if ($passCnt<8) {
                    header("Location: ../signup.php?signup=pass8&firstname=$firstName&lastname=$lastName&email=$email&user=$user");
                    // header("Location: ../signup.php?password=weak$passCnt");
                    exit();
                  } else {
                    header("Location: ../signup.php?signup=passchar&firstname=$firstName&lastname=$lastName&email=$email&user=$user");
                    // header("Location: ../signup.php?signup=passchar$passCnt");
                    exit();
                  }

                } else {

                  $passHash = password_hash($pass, PASSWORD_DEFAULT);

                  $sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_name, user_pass) VALUE (?,?,?,?,?)";
                  $stmt = mysqli_stmt_init($conn);

                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?signup=sql-error");
                    exit();
                  } else {

                    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $user, $passHash);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    exit();

                  }

                }

              }

            }

          }


        }

      }
    }
  }

} else {
  header("Location: ../signup.php");
  exit();
}
