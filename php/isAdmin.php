<?php


// Start a session
session_start();

// If the session variable 'admin' is not set or is false
if((!isset($_SESSION['admin'])) || !$_SESSION['admin']){

    // Redirect to the index page
    header("location:../index.php");

    // Terminate the script
    exit;
}