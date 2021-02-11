
<?php

session_start();
include_once 'dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_SESSION['id'])){
 
}
?>
    <form action="upload.php" method = "POST" enctype = 'multipart/form-data'>
<input type ='file' name = 'file'>
<button type = 'submit' name = 'submit'> upload</button>
 </form>
 <p>Login as user!</p>
 <form action = "login.php" method = "POST">
 <button type = 'submit' name = "submitLogin">Login</button>
</form>

 <p>Logout as user!</p>
 <form action = "logout.php" method = "POST">
 <button type = 'submit' name = "submitLogout">Logout</button>
</form>
 </body>
</html>