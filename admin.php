<?php
require 'modules/database.php';
require 'modules/functions.php';
session_start();

// Debugging - remove in production
// var_dump($_SESSION);

if (!isAdmin()) {
    header("Location: index.php");
    exit(); // Always exit after header redirect
}
?>
<h4>Welcome Admin</h4>