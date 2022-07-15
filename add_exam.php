<?php
  session_start();

?>

<?php
  $examname = $_POST['examname'];
  $Examdate = $_POST['Examdate'];
  $dutime = $_POST['dutime'];
  $pubdate = $_POST['pubdate'];
  $userid = $_SESSION['user_id'];

$conn = mysqli_connect('localhost','root','','quiz');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);      
}else{
    $stmt1 = "INSERT INTO exam( exam_name, publish_date, exam_date, diuration, user_user_id) VALUES ('$examname','$pubdate','$Examdate','$dutime','$userid')";
    //$eid = .$conn->insert_id($stmt1);
    $results = mysqli_query($conn,$stmt1);
    
    $eid = $conn->insert_id;

    if(!empty($_SESSION["ques_ans"])){
      foreach($_SESSION["ques_ans"]as $keys => $values)
      {
               
          $qnumber = $values["q_number"];
          $question = $values["q_question"];
          $canswer = $values["q_cre"];



          $answer = array();
          $answer[1] = $values["answer[1]"];
          $answer[2] = $values["answer[2]"];
          $answer[3] = $values["answer[3]"];
          $answer[4] = $values["answer[4]"];



        $stmt2 = "INSERT INTO question (question,exam_user_user_id,exam_exam_id,q_number) VALUES ('$question','$userid','$eid','$qnumber')";
        $query = mysqli_query($conn,$stmt2);

        if($query){

          foreach($answer as $option => $value){
            if($value != ""){
              if($canswer == $option){
                $c_value = 1;
              }else{
                $c_value = 0;
              }

              $stmt3= "INSERT INTO answer (answers,canswer,question_q_id,exam_eaxm_id) VALUES ('$value','$c_value','$qnumber','$eid')";

              $result=mysqli_query($conn,$stmt3);
                       
              if($result) {
                continue;
              }else{
                echo $result;
                die("2nd Query not execute");
              }


            }
          }
          //$message ="Question has been added successfully";
        }


      }

    }

      if($results){
      
        echo'<script>alert("Data Added succesfuly")</script>';
        echo '<script>window.location="exam_single.php"</script>';
       } else{
         echo 'Insert Error';
       
       }
}

?>