<?php
session_start();
if (isset($_SESSION['email'])) {
  header("Location: ../index.php", true, 301);
}
require "../classes/DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form PHP</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <main class="form-signin">
      <form method="POST" action="">
        <img class="mb-4" src="../img/user.png" alt="" width="72" height="auto">
        <h1 class="h3 mb-3 fw-normal">Login Form</h1>
        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a href="../signup" class="btn m-2">Create a new account here</a>
        <?php

        if (isset($_POST['email']) && isset($_POST['password'])) {
          if ($db->logIn("users", $_POST['email'], $_POST['password'])) {
            $_SESSION['email'] = $db->prepareData($_POST['email']);
            header("Location: ../", true, 301);
          } else echo "Email or Password is Invalid";
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