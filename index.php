<?php
  session_start();
  include_once 'dbh.inc.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <?php
      // Here we spit out all users from the database.
      // Note: We are not using any security here like prepared statements! Since this is just an exercise.
 

      // Here we show the upload system IF the user is logged in!
      if (isset($_SESSION['id'])) {
             $sql = "SELECT * FROM costumer";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $sqlImg = "SELECT * FROM profileimg WHERE userid='$id';";
          $resultImg = mysqli_query($conn, $sqlImg);
          while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo '<div class="user-container">';
              if ($rowImg['status'] == 0) {
                echo '<img src="uploads/profile'.$id.'.png">';
              }
              else {
                echo '<img src="uploads/profiledefault.jpg">';
              }
              echo "<p>" . $row['username'] . "</p>";
            echo '</div>';
          }
        }
      }
      else {
        echo "There are no users yet!";
      }
        if ($_SESSION['id'] === $id ) {
          echo "You are logged in as user #1";
        }
        echo "you are logged in as user #1";
        echo '<form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file">
          <button type="submit" name="submit">UPLOAD</button>
        </form>';
      }
      else {
        echo "You are not logged in!";
        echo '<form action="signup.php" method="post">
          <input type="text" name="first" placeholder="First name">
          <input type="text" name="last" placeholder="Last name">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="submitSignup">Signup</button>
        </form>';
      }
    ?>

    <p>Login as user!</p>
    <form action="login.php" method="post">
      <button type="submit" name="submitLogin">Login</button>
    </form>

    <p>Logout as user!</p>
    <form action="logout.php" method="post">
      <button type="submit" name="submitLogout">Logout</button>
    </form>

  </body>
</html>
