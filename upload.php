<?php
if(isset($_POST['submit'])) {
    
$file = $_FILES['file'];
print_r($file);
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('png','jpeg', 'jpg','pdf');
if(in_array( $fileActualExt, $allowed)){
    if($fileError === 0){
      if($fileSize < 2000000 ) {
          $fileNameNew = uniqid('', true).'.'.$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName , $fileDestination);
          header("Location: index.php?uploadssuccess");
      } else {
          echo '<br/>';
          echo '<br/>';
          echo 'your file is too big';
      }
    } else {
        echo 'there was error uploading this file';
    }

}else {
    echo "you cannot upload files of this type!";
}

}
?>