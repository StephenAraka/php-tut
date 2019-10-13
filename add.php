<?php

// We are checking if this submit name is set... if it's set,
// ...then it means we have sent data to the server, and now we wanna
// ...process that data

// GET METHOD - {insecure}
// if (isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

// POST METHOD - {secure}
if (isset($_POST['submit'])) {

  // VALIDATION
  // check email
  if (empty($_POST['email'])) {
    echo 'An email is required <br />';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'Please enter a valid email address';
    }
    // echo htmlspecialchars($email);
  }

  // check title
  if (empty($_POST['title'])) {
    echo 'A title is required <br />';
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      echo 'Title must be letters and spaces only';
    }
  }

  // check for ingredients
  if (empty($_POST['ingredients'])) {
    echo 'At least one ingredient is required <br />';
  } else {
    $ingredients = $_POST['ingredients'];
    if (!preg_match('/(^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      echo 'Ingredients should be comma separated list';
    }
  }
} // End of POST check
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Pizza</h4>
  <form class="white" action="add.php" method="POST">
    <label>Your Email:</label>
    <input type="email" name="email" required>
    <label>Pizza Title:</label>
    <input type="text" name="title" required>
    <label>Ingredients (comma separated):</label>
    <input type="text" name="ingredients" required>
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include('templates/footer.php'); ?>

</html>