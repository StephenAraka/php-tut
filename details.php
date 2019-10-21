<?php
// connect to db
include('config/db_connect.php');

// check for GET request id parameter
if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // make sql query to select one individual record
  // get query results
  // fetch result in array format
  // free result
  // close connection

  $sql = "SELECT * from pizzas WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $pizza = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center">
  <?php if ($pizza) : ?>
    <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
    <p>Created by: <?php echo htmlspecialchars($pizza['email']) ?></p>
    <p><?php echo htmlspecialchars(date($pizza['created_at'])) ?></p>
    <h5>Ingredients</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>

  <?php else : ?>

    <h5>No such pizza exists!</h5>

  <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>