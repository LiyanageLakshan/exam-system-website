<?php
 session_start();
 $conn= mysqli_connect("localhost","root","","quiz");

$exam_id = $_GET['exam_id'];
//$number = $_GET['n'];

//$_SESSION["exam_id"]=$_GET['exam_id'];

$query = "SELECT * FROM `user` WHERE role='student' ";
$total_s = mysqli_num_rows(mysqli_query($conn,$query));


$query = "SELECT * FROM `user` WHERE attend=1 ";
$total_a = mysqli_num_rows(mysqli_query($conn,$query));


$sql = "SELECT * FROM exam WHERE exam_id=$exam_id ";
$results = mysqli_query($conn,$sql);
$exam = mysqli_fetch_assoc($results);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Moniter_Exam</title>
</head>

<body>
  <header>
    <label class="logo">...</label>
</header>
<div class="sidebar">
</div>
<nav></nav>
<label class="exam"> < <?php echo $exam['exam_name'] ?> </label>

<div class="b1">
  <label class="topic">Exam Completed</label>
  <label class="time"><?php echo $total_a; ?>/<?php echo $total_s; ?> </label>
  <label class="timerem">Time Left: <?php echo $exam['diuration'] ?> munits</label>
</div>
<div class="b2">
  <label class="topic">Exam Stared Time: <?php echo $exam['exam_date'] ?> </label><br><br><br><br>
  <label class="topic">Exam End Time : <?php echo $exam['diuration'] ?> munits</label>
</div>
<div class="b3">
  <label class="topic">Attending Student List </label> <br><br><br> 
  <?php 
      $conn= mysqli_connect("localhost","root","","quiz");
     
          $query = "SELECT * FROM user WHERE attend=1 ";
          $query_run = mysqli_query($conn,$query);

          if(mysqli_num_rows($query_run) > 0)
          {
              while($row = mysqli_fetch_array($query_run))
              {
                    ?>
        
        <p>   </p> <li style="font-size=25px">  <?php echo $row['user_name'] ; ?></li>
              
         
                <?php
              }
          }
          else{
            ?>
            
              <li>No Record Found</li>
        
            <?php
           
          }
     
     ?>
</div>
</div>
<div class="end">
  <button type="submit"><a href="exam.php">End Exam</button>

   </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>