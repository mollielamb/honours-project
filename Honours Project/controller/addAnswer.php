<?php

  require '../model/database.php';
  session_start();
  
   $id = $_SESSION['id'];
  $answer = $_POST['answer'];
  
  if(!isset($_SESSION['id'])){
  $poster = $_POST['poster'];
  } else {
	$pdo1 = Database::connect();
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql1 = "SELECT firstname, surname FROM user WHERE id={$_SESSION['id']}" ;
    $q1 = $pdo1->prepare($sql1);
    $q1->execute(array($id));
    $data = $q1->fetch(PDO::FETCH_ASSOC); 
	Database::disconnect();
	
	$poster = $data['firstname']." ".$data['surname']; 
  }
   $valid = "true"; 
   
     $pdo = Database::connect();
      
   
  if($valid=="true"){
	 
  			$question_id = $_GET['question_id'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO answers (question_id,answered_by,answer) values(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($question_id,$poster,$answer));
            Database::disconnect();
            header("Location: ../view/questions.php");
		
} else{
	error_log($sql);
  echo "Invalid Details";
  header("Location: ../view/questions.php?invalid=true");
}	
	
?>