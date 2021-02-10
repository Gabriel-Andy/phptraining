<?php
include_once "dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this is where I learn all my lesson</title>
</head>
<body>
    <?php
    
 $sql = "SELECT * FROM users";
 $result = mysqli_query($conn, $sql);
 $datas = array();
 if (mysqli_num_rows($result) > 0 ){
     
     while($row = mysqli_fetch_assoc($result)){
         $datas[]= $row;
     }
 }
 foreach($datas as $data) {
     echo $data['usersId'];
 }
    ?>
</body>
</html>