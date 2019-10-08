<?php include '../model/database.php'; ?>
<?php session_start(); ?>
<?php 


      //Check to see if score is set_error_handler
	if (!isset($_SESSION['user_score'])){
	   $_SESSION['user_score'] = 0;
	}
	
	if (!isset($_SESSION['question_number'])){
	   $_SESSION['question_number'] = 0;
	}
	
	if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = array();
	}
	$answer = $_POST['answer'];

	if($_GET['question'] == 7){
	$answer = ucfirst(strtolower($_POST['answer']));
	$_SESSION['answers'][] = $answer; 
	} else {
		$_SESSION['answers'][] = $_POST['answer'];	
	}
	
	$_SESSION['question_number'] += 1;
	

	
        $pdo = Database::connect();
  $sql = "SELECT * FROM test";
  error_log($sql);
  echo "Invalid";
  header("Location: test.php");
  foreach ($pdo->query($sql) as $row) {
      if($answer == $row['correct_answer']){
	  $_SESSION['user_score'] += 1;
	  }
  }
  Database::disconnect();
  
  if($_SESSION['question_number'] == 10){
		$_SESSION['complete'] = true; 
		header("Location: ../view/results.php");
		exit();
	} else {
	        header("Location: ../view/test.php");
	}
?>