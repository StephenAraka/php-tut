<?php

// Superglobals
// special array variables that are pre-populated with values before your code runs
// e.g $_GET[] && $_POST[]

echo $_SERVER['SERVER_NAME'] . '<br />'; // server name
echo $_SERVER['REQUEST_METHOD'] . '<br />'; // request method for this page
echo $_SERVER['SCRIPT_FILENAME'] . '<br />'; // path of file from PC
echo $_SERVER['PHP_SELF'] . '<br />'; // path relative to localhost = useful on form actions

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP TUT</title>
</head>
<body>
  
</body>
</html>