<?php include "header.php"; ?>
    <section class="container-fluid">
      <div class="container mt-5">
        <h1 class="text-center text-warning">Join with lazzzy code community!</h1>
        <form class="mt-5 mx-auto signup-form" action="includes/signup.inc.php" method="post">
          <div class="form-group d-flex flex-column justify-content-center">
            <?php
              if (isset($_GET['firstname'])) {
                ?>
                  <input class="form-control my-2" type="text" name="firstname" placeholder="First Name" value="<?php echo $_GET['firstname']; ?>">
                <?php
              } else {
                ?>
                  <input class="form-control my-2" type="text" name="firstname" placeholder="First Name" autofocus>
                <?php
              }

              if (isset($_GET['lastname'])) {
                ?>
                  <input class="form-control my-2" type="text" name="lastname" placeholder="Last Name" value="<?php echo $_GET['lastname']; ?>">
                <?php
              } else {
                ?>
                  <input class="form-control my-2" type="text" name="lastname" placeholder="Last Name" autofocus>
                <?php
              }

              if (isset($_GET['email'])) {
                ?>
                  <input class="form-control my-2" type="text" name="email" placeholder="First Name" value="<?php echo $_GET['email']; ?>">
                <?php
              } else {
                ?>
                  <input class="form-control my-2" type="text" name="email" placeholder="E-mail" autofocus>
                <?php
              }

              if (isset($_GET['user'])) {
                ?>
                  <input class="form-control my-2" type="text" name="username" placeholder="First Name" value="<?php echo $_GET['user']; ?>">
                <?php
              } else {
                ?>
                  <input class="form-control my-2" type="text" name="username" placeholder="Username" autofocus>
                <?php
              }


            ?>
            <!-- <input class="form-control my-2" type="text" name="lastname" placeholder="Last Name"> -->
            <!-- <input class="form-control my-2" type="text" name="email" placeholder="E-mail"> -->
            <!-- <input class="form-control my-2" type="text" name="username" placeholder="Username"> -->
            <input class="form-control my-2" type="password" name="password" placeholder="Password" autofocus>
            <button class="btn btn-warning text-white my-2" type="submit" name="submit">Sign up</button>
          </div>
        </form>

        <?php

        $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullURL, "signup=empty")) {
          ?>
            <p class="text-danger text-center">You not fill in all fields!</p>
          <?php
        } elseif (strpos($fullURL, "signup=invalid-char")) {
          ?>
            <p class="text-danger text-center">Make sure use Capitalize characters!</p>
          <?php
        } elseif (strpos($fullURL, "signup=invalid-email")) {
          ?>
            <p class="text-danger text-center">Your e-mail is invalid!</p>
          <?php
        } elseif (strpos($fullURL, "signup=email-taken")) {
          ?>
            <p class="text-danger text-center">Your e-mail was taken!</p>
          <?php
        } elseif (strpos($fullURL, "signup=username-taken")) {
          ?>
            <p class="text-danger text-center">Username was taken!</p>
          <?php
        } elseif (strpos($fullURL, "sql=error")) {
          ?>
            <p class="text-danger text-center">Server error, try again later!</p>
          <?php
        } elseif (strpos($fullURL, "signup=pass8")) {
          ?>
            <p class="text-danger text-center">Minimum 8 characters: Letters, numbers, and/or symbols!</p>
          <?php
        } elseif (strpos($fullURL, "signup=passchar")) {
          ?>
            <p class="text-danger text-center">Minimum 8 characters: Letters, numbers, and/or symbols!</p>
          <?php
        }elseif (strpos($fullURL, "signup=success")) {
          ?>
            <p class="text-success text-center">You have registered!</p>
          <?php
        }

        ?>
      </div>
    </section>
<?php include "footer.php"; ?>
