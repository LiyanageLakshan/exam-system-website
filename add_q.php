<?php
  session_start();

?>

<?php
  $qname = $_POST['qname'];
  $question = $_POST['question'];
  $qnumber= $_POST['qid'];
  $canswer = $_POST['cans'];
  $userid = $_SESSION['user_id'];
  $examid = $_SESSION['exam_id'];
  //$value = $_POST["value"];
  //$q_id = $_POST["qid"]

  //Answer array()
  $answer = array();
  $answer[1] =$_POST['answer1'];
  $answer[2] =$_POST['answer2'];
  $answer[3] =$_POST['answer3'];
  $answer[4] =$_POST['answer4'];
  

 // $userid = $_POST['user_id'];

$conn = mysqli_connect('localhost','root','','quiz');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt = "INSERT INTO question (question_name,question,exam_user_user_id,exam_exam_id,q_number) VALUES ('$qname','$question','$userid','$examid','$qnumber')";

    $query = mysqli_query($conn,$stmt);

    if($query){

          foreach($answer as $option => $value){
            if($value != ""){
              if($canswer == $option){
                $c_value = 1;
              }else{
                $c_value = 0;
              }

              $stmt2= "INSERT INTO answer (answers,canswer,question_q_id) VALUES ('$value','$c_value','$qnumber')";

              $result=mysqli_query($conn,$stmt2);
                       
              if($result) {
                continue;
              }else{
                echo $result;
                die("2nd Query not execute");
              }


            }
          }
          $message ="Question has been added successfully";
        }

      }

      $query = "SELECT * FROM question";
      $question = mysqli_query($conn,$query);
      $total = mysqli_num_rows($question);
      $next = $total+1;

?>