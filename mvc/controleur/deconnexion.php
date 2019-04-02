<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../index.php');
exit();

/*
 *
 * // Now to log off, just set the cookie to blank and as already expired
setcookie("loginCredentials", "", time() - 3600); // "Expires" 1 hour ago
 */
?>