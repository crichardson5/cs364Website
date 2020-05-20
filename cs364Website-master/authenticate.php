<?php
session_start(); // start (or resume) session

if (! isset($_SESSION["emailAddress"])) {
  header("Location: loginPage364.php?redirect=".$_SERVER["PHP_SELF"]);
}