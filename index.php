<?php
// connect to db: use MySQLi or PDO
$conn = mysqli_connect('localhost', 'steve', 'test1234', 'ninja_pizza');

// check connection
if(!$conn){
  echo 'aya bass! connection error: '. mysqli_connect_error();
}

// write query to get all pizzas
$sql = 'SELECT title, ingredients, id from pizzas';

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); // MYSQLI_ASSOC returns associative array

// TIP: after getting stuff from db, it's good practice to free the result from memory,
// and close the connection
mysqli_free_result($result);
mysqli_close($conn);

print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>

</html>