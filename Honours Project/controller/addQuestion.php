<?php

  require '../model/database.php';
  session_start(); 
  
  $id = $_SESSION['id'];
  $question = $_POST['question'];
  if(!isset($_SESSION['id'])){
  $asker = $_POST['asker'];
  } else {
	$pdo1 = Database::connect();
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql1 = "SELECT firstname, surname FROM user WHERE id={$_SESSION['id']}" ;
    $q1 = $pdo1->prepare($sql1);
    $q1->execute(array($id));
    $data = $q1->fetch(PDO::FETCH_ASSOC); 
	Database::disconnect();
	
	$asker = $data['firstname']." ".$data['surname']; 
  }
	
   $valid = "true"; 
   
     $pdo = Database::connect();
      
   
  if($valid=="true"){
	 
  			$pdo = Database::connect();
			$question_id = $_GET['question_id'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO questions (poster, question) values(?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($asker,$question));
            Database::disconnect();
            header("Location: ../view/questions.php");
		
} else{
	error_log($sql);
  echo "Invalid Details";
  header("Location: ../view/questions.php?invalid=true");
}	
	
?>

