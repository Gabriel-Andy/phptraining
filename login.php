<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submitLogin'])){
     $sql = " SELECT * FROM costumer ";
 $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
        }
    $_SESSION['id'] = $id ;
    header('Location: index.php');
      }
}