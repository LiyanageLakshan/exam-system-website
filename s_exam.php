<?php
  session_start();

 $conn= mysqli_connect("localhost","root","","quiz");
 
 $user_id=$_SESSION['user_id'];
 //$number = $_GET['n'];
 
 //$_SESSION["exam_id"]=$_GET['exam_id'];
 
 $query = "SELECT * FROM `user` WHERE role='student' ";
 $query_run = mysqli_query($conn,$query);
 

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

  <title>Student Exam</title>
</head>

<body>
  <header>
    <label class="logo">...</label>
</header>
<div class="sidebar">
</div>
<nav></nav>
<form action=""  method="POST">
<div class="search">
        <input type="text" name="valueToSearch" placeholder="What you are looking for?">
        <button type="submit" name="search" >Search</button>
</div>

<table class="table">
  <table>
    <thead>
      <tr>
      <th>Exam</th>
      <th>Starting Time</th>
      <th>Exam Duration</th>
      <th>Status</th>
      </tr>
      </thead>
    <tbody>
      <?php 
      $conn= mysqli_connect("localhost","root","","quiz");
       if(isset($_POST['search']))
       {
          $value_filter= $_POST['valueToSearch'];
          $query = "SELECT * FROM exam WHERE status=1 LIKE  '%$value_filter%'";
          $query_run = mysqli_query($conn,$query);

          if(mysqli_num_rows($query_run) > 0)
          {
              while($row = mysqli_fetch_array($query_run))
              {
                    ?>
         <tr>
              <td><?php echo $row['exam_name'] ; ?></td>
               <td><?php echo $row['exam_date'] ; ?></td>
               <td><?php echo $row['diuration'] ; ?></td>
              <td>
                <?php
                 if($row['status']==1){
                  $exam_id=$row["exam_id"];
                  $_SESSION["exam_id"]=$exam_id;
                  echo '<p><a href="s_exam_single.php? exam_id='.$row['exam_id'].' &status=0 &n=1 &user_id='.$_SESSION['user_id'].' ">start </a></p>';
                 }else{
                   echo '<p><a href="status.php?exam_id='.$row['exam_id'].'&status=1">Draft</a></p>';
                 }
               ?>
               </td>

         </tr>
                <?php
              }
          }
          else{
            ?>
            <tr>
              <td colspan="3">No Record Found</td>
            </tr>
            <?php
           
          }
       }
     ?>
     
    </tbody>
   </table>
   </form>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>