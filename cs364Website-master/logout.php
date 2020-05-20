<?php
session_start(); // start (or resume) session
session_destroy();
header("Location: loginPage364.php");
?>