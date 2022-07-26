<?php
session_start();
unset($_SESSION["admin"]);
// session_unset();
session_destroy();

header("location:login.php");
exit();