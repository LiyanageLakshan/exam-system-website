<?php
session_start();

$exam_id= $_SESSION["exam_id"];
$conn= mysqli_connect("localhost","root","","quiz");
$diuration="";
$sql = mysqli_query($conn,"SELECT * FROM exam WHERE exam_id=$exam_id"); 

while($row=mysqli_fetch_array($sql))
{
  $diuration=$row["diuration"];
}
$_SESSION["diuration"]=$diuration;
$_SESSION["start_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["diuration"].'minutes', strtotime($_SESSION["start_time"])));

$_SESSION["end_time"]=$end_time;

?>

<script type="text/javascript">
  window.location="index.php";
  </script>

