<?php
// connect to db: use MySQLi or PDO
$conn = mysqli_connect('localhost', 'steve', 'test1234', 'ninja_pizza');

// check connection
if(!$conn){
  echo 'aya bass! connection error: '. mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>

</html>