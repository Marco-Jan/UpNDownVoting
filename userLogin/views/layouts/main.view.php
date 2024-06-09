<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/pico.css">
    <link rel="stylesheet" href="../css/pico.classless.min.css">
    <title>Up-Down-Voting</title>
</head>
<body>
<header>
    <h1>Up-Down-Voting</h1>
    <h3>User Login</h3>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../user_login/user_login.php">Login</a></li>
            <li><a href="../user_login/user_logout.php">Logout</a></li>
            <li><a href="../login/login.php">Admin</a></li>
        </ul>
    </nav>
</header>
<main class="grid">
  <?= $content ?? "" ?>
</main>
<footer>
    <p>|edvgraz|</p>
</footer>
</body>
</html>