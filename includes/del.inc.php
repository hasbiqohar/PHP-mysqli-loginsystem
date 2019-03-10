<?php

if (isset($_POST['submit'])) {

  include "dbh.inc.php";

  $user = mysqli_real_escape_string($conn, $_POST['user']);

  $sql = "DELETE FROM users WHERE user_name=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../participants.php?sql=$user");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    header("Location: ../participants.php?user=$user&status=deleted");
    exit();
  }

}
