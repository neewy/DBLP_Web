<?php session_start();
if (isset($_SESSION['login_user'])) {
    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    echo "true";
} else {
    echo "false";
}
?>