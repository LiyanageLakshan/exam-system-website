<?php
session_start();
$resuls=$_SESSION['score'];

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

  <title>Exam_Result</title>
</head>

<body>
  <header>
    <label class="logo">...</label>
</header>
<div class="sidebar">
</div>
<nav></nav>
<label class="exam"> <  Exam Name </label>

<div class="rb1">
  <label class="topic">Exam Completed</label>

  <?php
  $class="presult";
if($resuls>40){

  echo "<label class=$class>Passed</label>";
}else
{
echo "<label class=$class>Fail</label>";
}
  ?>

<?php
  $class="presult";
if($resuls>40){

  echo "<label class=$class>Passed</label>";
}else
{
echo "<label class=$class>Fail</label>";
}
  ?>

<?php
 $class2="result";
    $calculate="$resuls";
    switch ($calculate)
    {
    case "75":
       echo "";
       break;
    case "65":
       echo "B";
       break;
    case "50":
       echo "C";
       break;
    default:
       echo "";
    }
    ?>
  
  <label class="result">A - <?php echo $_SESSION['score']*33; ?> Points</label>
</div>

<div class="rb2">
  <label class="topic">Questions </label>  
  <div class="ra">
    <label >Question 1</label>
    <input type="checkbox" name="answer"  class="answer">
  </div>
  <div class="rb">
    <label >Question 2</label>
    <input type="checkbox" name="answer" id="a" class="answer">
  </div>
  <div class="rc">
    <input type="checkbox" name="answer" id="a" class="answer">
    <label >Question 3</label>
  </div>
     
</div>
<div class="cls">
  <button type="submit">Close</button>
   </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>