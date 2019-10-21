<?php
// connect to db: use MySQLi or PDO
$conn = mysqli_connect('localhost', 'steve', 'test1234', 'ninja_pizza');

// check connection
if (!$conn) {
  echo 'aya bass! connection error: ' . mysqli_connect_error();
}

// write query to get all pizzas
$sql = 'SELECT title, ingredients, id from pizzas ORDER BY created_at';

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); // MYSQLI_ASSOC returns associative array

// TIP: after getting stuff from db, it's good practice to free the result from memory,
// and close the connection
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
  <div class="row">

    <?php foreach ($pizzas as $pizza) { ?>

      <div class="col s6 m3">
        <div class="card z-depth-0">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
            <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
          </div>
          <div class="card-action right-align">
            <a href="#" class="brand-text">more info</a>
          </div>
        </div>
      </div>
      
    <?php } ?>
  </div>
</div>

<?php include('templates/footer.php'); ?>

</html>