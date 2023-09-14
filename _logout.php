<?php
session_start();

echo "logging out please wait...";
session_unset();
session_destroy();
header("location: /forum/index.php");
?>