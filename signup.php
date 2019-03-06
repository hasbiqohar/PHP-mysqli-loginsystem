<?php include "header.php"; ?>
    <section class="container-fluid">
      <div class="container mt-5">
        <h1 class="text-center text-warning">Join with lazzzy code community!</h1>
        <form class="mt-5 mx-auto signup-form" action="signup.inc.php" method="post">
          <div class="form-group d-flex flex-column justify-content-center">
            <input class="form-control my-2" type="text" name="firstname" placeholder="First Name">
            <input class="form-control my-2" type="text" name="lastname" placeholder="Last Name">
            <input class="form-control my-2" type="text" name="email" placeholder="E-mail">
            <input class="form-control my-2" type="text" name="username" placeholder="Username">
            <input class="form-control my-2" type="password" name="password" placeholder="Password">
            <button class="btn btn-warning text-white my-2" type="submit" name="submit">Sign up</button>
          </div>
        </form>
      </div>
    </section>
<?php include "footer.php"; ?>
