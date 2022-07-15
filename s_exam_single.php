<?php
 session_start();
 $conn= mysqli_connect("localhost","root","","quiz");

$exam_id = $_GET['exam_id'];
$number = $_GET['n'];

//$_SESSION["exam_id"]=$_GET['exam_id'];
$user_id = $_GET['user_id'];


$q="UPDATE `user` SET `attend`=1 WHERE  'user_id'=$user_id";
mysqli_query($conn,$q);

$query = "SELECT * FROM question WHERE exam_exam_id=$exam_id AND q_number=$number";
$result = mysqli_query($conn,$query); 
$question = mysqli_fetch_assoc($result);

$query = "SELECT * FROM answer WHERE exam_exam_id=$exam_id AND question_q_id=$number";
$choices = mysqli_query($conn,$query);

$query = "SELECT * FROM question WHERE exam_exam_id=$exam_id";
$total_q = mysqli_num_rows(mysqli_query($conn,$query));

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

  <title>Exam_single_student</title>
</head>

<body>
  <header>
    <label class="logo">...</label>
</header>
<div class="sidebar">
</div>
<nav></nav>
<label class="exam"> < <?php echo $exam['exam_name'] ?> </label>
<label class="ltime">  Time Left: </label>
<div class="timer"id="timeleft" style="font-size:20px "></div>
<!--<label class="ltimev" id="timeleft">   <?php  //echo $exam['diuration'] ?> mins </label> -->

<label class="Qu"> Q:<?php echo $number; ?>of<?php echo $total_q; ?> <?php echo $question['question'] ?> </label>
  
<div class="box1">      
        <form action="process.php" method="POST"> 
        <div class="choose">
          <?php while($row=mysqli_fetch_assoc($choices)) {?>
          <ul><input type="radio" id="choice"  name="choice" value="<?php echo $row['answer_id']; ?>"> 
          <label><?php echo $row['answers'] ?><label></ul><br>

          <?php }  ?>

          </div>
          <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="hidden" name="examid" value="<?php echo $exam_id; ?>"> 
         
  </div>   
        <div class="boxbtn">
          <div class="pre">
            <button type="submit" name="submit" value="submit">Prev</button>
             </div>
             <div class="bet">
              <label> Question <?php echo $number; ?></label>
             </div>
             <div class="next">
                <button type="submit" name="submit" value="submit">Next</button>
                 </div>
             </div> 
             </form>
  <div class="btndown">
  <div class="save1">
    <button type="submit">Save</button>
     </div>
     <div class="com">
     <button type="submit">Complete</button>
    </div> 
   </div>
 
</div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>
<script type="text/javascript">
  setInterval(function()  {
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","timeset.php",false);
xmlhttp.send(null);
document.getElementById("timeleft").innerHTML=xmlhttp.responseText;
    
  }, 1000);

  </script>

</html>