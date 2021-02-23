<?php
require "../classes/DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Form PHP</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <main class="form-signin">
      <form method="POST" action="">
        <img class="mb-4" src="../img/user.png" alt="" width="72" height="auto">
        <h1 class="h3 mb-3 fw-normal">Signup Form</h1>
        <label for="inputFullname" class="visually-hidden">Full name</label>
        <input type="text" name="fullname" id="inputFullname" class="form-control" placeholder="Fullname" required autofocus>
        <label for="inputEmailSignup" class="visually-hidden">Email address</label>
        <input type="email" name="email" id="inputEmailSignup" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <a href="../login" class="btn m-2">Already have an account?<br>Login here</a>
        <?php
        if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
          if ($db->signUp("users", $_POST['fullname'], $_POST['email'], $_POST['password'])) {
            echo "Signup Success";
          } else echo "Failed to complete signup";
        }
        ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
  </body>

  </html>
<?php
}
?>