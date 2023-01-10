<?php
// php STAN 9

// Check if session is using cookies
if (ini_get("session.use_cookies")) {
    // Get the cookie parameters
    $params = session_get_cookie_params();
    // Delete the cookie by setting the time in the past
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Destroy the session
session_destroy();
// Redirect to the index page
header("location: ../index.php");
// Stop the script
exit;
