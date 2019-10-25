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

$title = $email = $ingredients = '';
$errors = ['email'=>'', 'title'=>'', 'ingredients'=>''];

// POST METHOD - {secure}
if (isset($_POST['submit'])) {

  // VALIDATION
  // check email
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email is required <br />';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Please enter a valid email address';
    }
    // echo htmlspecialchars($email);
  }

  // check title
  if (empty($_POST['title'])) {
    $errors['title'] = 'A title is required<br />';
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'Title must be letters and spaces only';
    }
  }

  // check for ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'At least one ingredient is required<br />';
  } else {
    $ingredients = $_POST['ingredients'];
    if (!preg_match('/(^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      $errors['ingredients'] = 'Ingredients should be comma separated list';
    }
  }

  // check if errors array has stuff
  if(array_filter($errors)){
    // if there's errors
    // echo 'errors in form';
  } else {
     header('Location: index.php');
  }

} // End of POST check
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
  <h4 class="center">Add a Pizza</h4>
  <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label>Your Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email']?></div>
    <label>Pizza Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <div class="red-text"><?php echo $errors['title']?></div>
    <label>Ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients']?></div>
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include('templates/footer.php'); ?>

</html>