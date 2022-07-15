<?php
  session_start();
  //$examid = $_SESSION['exam_id'];

  if(isset($_POST["add_q&a"]))
  
  {

   if(isset($_SESSION["ques_ans"]))
   {
       $qa_array_id = array_column($_SESSION["ques_ans"],"qa_id");

       if(!in_array($_POST["qid"],$qa_array_id))
       {
             $count = count($_SESSION["ques_ans"]);
             $qa_array = array(
              'q_number'  => $_POST["qid"],
              'q_question'  => $_POST["question"],
              'q_cre'  => $_POST["cans"],
              
              'answer[1]' => $_POST['answer1'],
              'answer[2]' => $_POST['answer2'],
              'answer[3]' => $_POST['answer3'],
              'answer[4]' => $_POST['answer4']

             );

             $_SESSION["ques_ans"][$count] = $qa_array;
       }
      else
      {
        echo'<script>alert("Added Successfuly")</script>';
          echo '<script>window.location="exam_single.php"</script>';
          
      }


   }
   else
   {
        $qa_array = array(

          'q_number'  => $_POST["qid"],
          'q_question'  => $_POST["question"],
          'q_cre'  => $_POST["cans"],
      
          'answer[1]' => $_POST['answer1'],
          'answer[2]' => $_POST['answer2'],
          'answer[3]' => $_POST['answer3'],
          'answer[4]' => $_POST['answer4']
        );

        $_SESSION["ques_ans"][0] = $qa_array;
   }
  }
if(isset($_GET["action"])){

       if($_GET["action"]=="delete")
       {
         foreach($_SESSION["ques_ans"] as $keys => $values)
         {

          if($values["q_number"]==$_GET["qid"])
          {
              unset($_SESSION["ques_ans"] [$keys]);

              echo'<script>alert("Item Removed")</script>';
              echo '<script>window.location="exam_single.php"</script>';
          }

         }

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

  <title>Exam_single</title>
</head>

<body>
  <header>
    <label class="logo">...</label>
</header>
<div class="sidebar">
</div>
<nav></nav>
<label class="exam"> <  Add Exam  </label>
<?php if (isset($messge)) {
  echo"<h4>" .$message."</h4>";
}
?>
<form action="add_exam.php"  method="POST">
<form action=""  method="POST">
<div class="aquiz">
    <table class="table1">
      <table1>
        <caption>Question List</caption>
        <thead>
          <tr>
          <th>Question No</th>
          <th>Question</th>
          <th>Answer</th>
          <th>Action</th>
          </tr>
          </thead>
        <tbody>
          
       <?php
          if(!empty($_SESSION["ques_ans"])){
            foreach($_SESSION["ques_ans"]as $keys => $values)
            {
              ?>
           <tr>
             <td><?php echo $values["q_number"]  ?></td>
             <td><?php echo $values["q_question"]  ?></td>
             <td><?php echo $values["answer[1]"]  ?>,<?php echo $values["answer[2]"]  ?>,<?php echo $values["answer[3]"]  ?>,<?php echo $values["answer[4]"]  ?></td>

             <td><a href="exam_single.php?action=delete&qid=<?php echo $values["q_number"]; ?>"><span class="text-danger">Delete</span></a></td>
           </tr>
        <?php
            }
          }

          ?>

        </tbody>
       </table>
       <br>
      </form>
     
        <div class="examdate">
          <label for="Examdate">Exam Date:</label>
          <input type="date" id="Examdate" name="Examdate" required >
          </div>
          <div class="examdu">
            <input type="number" name="dutime" placeholder="Exam Duration Minutes"  required >
            </div>
            <div class="ename">
            <input type="text" name="examname" placeholder="Exam Name" required >
              </div>
              <div class="pubdate">
                <label for="pubdate">Publish Date:</label>
                <input type="date" id="pubdate" name="pubdate" required >
                </div>
                  <div class="fbtn">
     
                    <button type="submit">Publish Paper</button>
                    </div>
                
                  </div>
    

  <form action="exam_single.php" method="POST">
  <div class="box"> 
     
    <div class="Qname1">
        <input type="text"  name="question" placeholder="Question" required>
        </div>
        <div class="Qnum">
          <input type="number" name="qid" placeholder="Question Number" value="" required>
          </div>     
         <ul>
          <li>
          <p><br><br><br><br><br>Answers</p>
          </li><br><br><br><br><br><br><br><br><br><br><br>
          <li>
            <input type="text" name="answer1" placeholder="Answer 1" required>
         
          </li><br><br><br>
          <li>
            
            <input type="text" name="answer2"  placeholder="Answer 2" required>
          
          </li><br><br><br>
          <li>
           
            <input type="text" name="answer3" placeholder="Answer 3" required>
        
          
          </li><br><br><br>
          <li>
             <input type="text" name="answer4" placeholder="Answer 4">
          
           </li>
           <div class="cq">
          <input type="number" name="cans" placeholder="Correct Question Number">
          </div>

             <div class="save">
              <input  type="submit" name="add_q&a" value="Add Q&A">
          </div>
             
  </div>
  </form>
 
</div>
 </form>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>


<script>

</script>

</body>

</html>