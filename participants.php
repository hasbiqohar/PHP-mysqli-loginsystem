<?php

include "header.php";
include "includes/dbh.inc.php";

?>

    <section class="container-fluid">
      <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="text-warning">List of lazzzy persons!</h1>
        <div class="w-80 mt-5">
          <p class="w-5 float-left">No</p>
          <p class="w-25 float-left">Full name</p>
          <p class="w-30 float-left">Username</p>
          <p class="w-30 float-left">E-mail</p>
        </div>

        <?php
          $sql = "SELECT * FROM users ORDER BY user_firstname ASC";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          $iteration = 0;

          if ($resultCheck <= 1) {
            ?>
            <div class="w-80 mt-2">
              <p class="w-5 float-left text-danger">1</p>
              <p class="w-25 float-left text-danger">No Data</p>
              <p class="w-30 float-left text-danger">No Data</p>
              <p class="w-30 float-left text-danger">No Data</p>
            </div>
            <?php
          } else {
            while ($row = mysqli_fetch_assoc($result)) {
              if (!($row['user_name'] == "admin")) {
                $iteration++;
                ?>
                  <div class="w-80 mt-2">
                    <p class="w-5 float-left"><?php echo $iteration; ?></p>
                    <p class="w-25 float-left"><?php echo $row['user_firstname']; ?> <?php echo $row['user_lastname']; ?></p>
                    <p class="w-30 float-left"><?php echo $row['user_name']; ?></p>
                    <p class="w-30 float-left"><?php echo $row['user_email']; ?></p>
                    <form class="w-10 float-left" action="includes/del.inc.php" method="post">
                      <input type="hidden" name="user" value="<?php echo $row['user_name']?>">
                      <button class="btn btn-light btn-delete" type="submit" name="submit"><i class="fas fa-window-close text-danger"></i></button>
                    </form>
                  </div>
                <?php
              }
            }
          }
        ?>
      </div>
    </section>

<?php include "footer.php"; ?>
