<?php
// ***COOKIES***

// While session variables are stored on the server,
// Cookies store data on your computer


if(isset($_POST['submit'])){
  session_start();

  $_SESSION['name'] = $_POST['name'];
  echo $_SESSION['name'];
  
  // cookie for gender
  setcookie('gender', $_POST['gender'], time() + 86400);
  
  header('Location: index.php');
}


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
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="" name="name">
    <select name="gender">
      <option value="male">male</option>
      <option value="female">female</option>
    </select>
    <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>