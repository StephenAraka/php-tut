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
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['title']);
    echo htmlspecialchars($_POST['ingredients']);
}

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