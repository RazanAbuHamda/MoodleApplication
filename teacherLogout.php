<?php

session_start();
require_once('DbConect.php');

header('Refresh: 0;');

if (!isset($_COOKIE['id'])) {
    header('Location: teacherlogin.php');
} else {
    setcookie('id', '', time() - 60 * 60 * 24 * 90, '/', '', 0, 0);
    unset($_COOKIE['id']);
    header('Location: index.php');
}
?>