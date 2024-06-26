<?php

class UserLoginSession
{
  public bool $logged_in;
  // hardcoded login Daten - wird in der Praxis durch eine Datenbank ersetzt.
  public array $login_data = [
    "username" => "user",
    "password" => "password"
  ];

  public function __construct()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    $this->logged_in = $_SESSION["user_logged_in"] ?? false;
  }

  public function login(): void
  {
    session_regenerate_id(true);
    $_SESSION["user_logged_in"] = true;
  }

  public function logout(): void
  {
    $_SESSION = [];
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      "",
      time() - 42000,
      $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
    session_destroy();
  }

  public function require_login(): void
  {
    if (!$this->logged_in) {
      header("Location: /views/user_login.view.php");
      exit();
    }
  }
}