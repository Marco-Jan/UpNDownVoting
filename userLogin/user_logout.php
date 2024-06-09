<?php
require_once __DIR__ . "/../inc/all.php";

// Die Methode logout() wird ausgeführt und die Session wird zerstört.
if (isset($user_login)) {
  $user_login->logout();
}

// Die Methode renderLogin() wird aufgerufen und die login.view.php wird gerendert.
renderUserLogin(__DIR__ . "/views/user_login.view.php");