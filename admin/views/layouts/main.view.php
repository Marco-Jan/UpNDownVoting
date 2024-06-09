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
    <h2>Admin-Bereich</h2>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../login/logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<main>
  <?= $content ?? "" ?>
</main>
<footer>
    <p>|edvgraz|</p>
</footer>
</body>
</html>