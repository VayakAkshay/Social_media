<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: /social/login.php');
?>