<?php

session_start();

if ($_SERVER['QUERY_STRING'] == 'noname'){
  unset($_SESSION['name']);
}

$name = $_SESSION['name'] ?? 'Guest';

// get cookie
$gender = $_COOKIE['gender'] ?? 'Unknown'; 

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ninja Pizza</title>
  <!-- MATERIALIZE ->> Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
        <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
        <li><a href="add.php" class="btn brand"> Add a Pizza </a></li>
      </ul>
    </div>
  </nav>