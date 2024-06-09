<?php
require_once __DIR__ . "/../inc/all.php";

// Die Methode logout() wird ausgeführt und die Session wird zerstört.
if (isset($login)) {
  $login->logout();
}

// Die Methode renderLogin() wird aufgerufen und die login.view.php wird gerendert.
renderLogin(__DIR__ . "/views/login.view.php");