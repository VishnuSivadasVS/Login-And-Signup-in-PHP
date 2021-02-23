<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION);
session_destroy();
header("location: ../login");
