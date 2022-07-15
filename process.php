<?php
include "app/database/connect.php";

?>

<?php
 session_start();

 //$sql = "SELECT * FROM exam WHERE exam_id=$exam_id ";
//$results = mysqli_query($conn,$sql);
//$exam = mysqli_fetch_assoc($results);

    if(!isset($_SESSION['score'])){

        $_SESSION['score'] = 0;
    }

    if($_POST){

    $exam_id = $_POST['examid'];
       //$number = $_POST['number'];
    $sql = "SELECT * FROM exam ";
    $results = mysqli_query($conn,$sql);
    $exam = mysqli_fetch_assoc($results);

    $query = "SELECT * FROM question WHERE exam_exam_id=$exam_id";
    $total_q = mysqli_num_rows(mysqli_query($conn,$query));
    

   $number = $_POST['number'];

   $selected_ans = $_POST['choice'];

   $next = $number+1;

   $query = "SELECT * FROM answer WHERE exam_exam_id=$exam_id  AND question_q_id=$number  AND  canswer=1";
   $result = mysqli_query($conn,$query);
     $row = mysqli_fetch_assoc($result);

     $correct_answer = $row['answer_id'];

    if ($selected_ans == $correct_answer){

        $_SESSION['score']++;

    }

    if($number == $total_q){
        header("LOCATION:exam_result.php");
    }else{
        //echo '<a href="s_exam_single.php? exam_id='.$exam_id.' &n='.$next.'"> </a>';
        header("LOCATION:s_exam_single.php? exam_id=".$exam_id." && n=".$next );
    }

    }

 ?>