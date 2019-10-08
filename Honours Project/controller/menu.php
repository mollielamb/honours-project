<?php
  require '../model/database.php';
  session_start();
  $_SESSION['user_score'] = 0;
  $_SESSION['question_number'] = 0;
 
  
  $userID = $_POST["userID"];
  $password = $_POST["password"];
  
  $pdo = Database::connect();
  $sql = "SELECT * FROM user WHERE id='$userID'";
  
  foreach ($pdo->query($sql) as $row) {
  if(password_verify($password,$row['password'])){ 
   $id = $row['id'];
      $_SESSION["id"] = $id;
	  session_regenerate_id(true);
      header("Location: ../view/user.php");  
die();	 
  } else {
  
  error_log($sql);
  echo "Invalid Login";
  header("Location: ../view/index.php?invalid=true");
    
     }
  }

  header("Location: ../view/index.php?invalid=true");
  Database::disconnect();
  
?>

