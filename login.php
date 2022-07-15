<?php
  session_start();

?>
<?php

$host ='localhost';
$user ='root';
$pass ='';
$db_name = 'quiz';

$conn = new MySQLi($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
if(isset($_POST['submit_btn']))
{
  $email=$_POST["email"];
  $password=$_POST["password"];
 

  
  $sql="SELECT * FROM user WHERE email='".$email."' AND password='".$password."' LIMIT 1 ";
   $result = mysqli_query($conn,$sql);

   $row=mysqli_fetch_array($result);

   if($row["role"]=="teacher"){
    $user_id=$row["user_id"];
    $_SESSION["user_id"]=$user_id;
    header("location:exam.php");
   }

   elseif($row["role"]=="student")
{
  $user_id=$row["user_id"];
  $_SESSION["user_id"]=$user_id;
  header("location:s_exam.php?user_id=".$user_id."");
}

else
{
  echo "Email or Password not vaild";
}
 


}

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
<title>Login</title>
</head>

<body>

    <header>
        <label class="logo">...</label>
    </header>
    
    <div class="loginbox">
      <!-- <p class="error">Invalid Email / Password </p>  -->
        <form action="" method="POST">
            <p>Email Address</p>
            <input type="email" name="email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required d>
            <input type="submit" name="submit_btn" value="Sign In">
    </form>

    </div>


  <!-- JQuery -->
  <script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>
<?php mysqli_close($conn);?>