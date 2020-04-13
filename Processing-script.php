<?php
if(isset($_POST['email'])) {
$data = $_POST['email'].',' ;
$ret = file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
if($ret === false) {
die('There was an error writing this file');
}
else {
echo "$ret bytes written to file";
header('Location: index.php');
}
}
else {
die('no post data to process');
}
?>
