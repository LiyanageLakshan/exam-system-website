<?php
   session_start();
?>

<?php
   include('app/database/connect.php');

$id=$_GET['exam_id'];
$status=$_GET['status'];

$q="UPDATE exam SET status=$status WHERE exam_id=$id";

mysqli_query($conn,$q);

header('location:exam.php');

?>