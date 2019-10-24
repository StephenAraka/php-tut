<?php

include('config/db_connect.php');

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

    <?php foreach ($pizzas as $pizza) : ?>

      <div class="col s6 m3 l6">
        <div class="card z-depth-0">

          <img src="./assets/img/pizza.png" class="pizza" />
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>

            <ul>

              <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) : ?>
                <li><?php echo htmlspecialchars($ingredient) ?></li>
              <?php endforeach; ?>

            </ul>

          </div>
          <div class="card-action right-align">
            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

  </div>
</div>

<?php include('templates/footer.php'); ?>

</html>