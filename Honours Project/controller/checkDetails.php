<?php

  require '../model/database.php';
  session_start();
  
  $firstname = ucfirst(strtolower($_POST['firstname']));
  $surname = ucfirst(strtolower($_POST['surname']));
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['password2'];
  $security_question = $_POST['ID'];
  $security_answer = $_POST['answer'];
   $valid = true; 
   
  echo '<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css">';
   
     $pdo = Database::connect();
      
   
  if($password==$confirm && $valid==true ){
	 
  
   $token = password_hash($password, PASSWORD_BCRYPT);
  
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO user (firstname, surname, email, password, security_question, security_answer) VALUES (?,?,?,?,?,?)"; 
        $q = $pdo->prepare($sql);
		$q->execute(array($firstname, $surname, $email, $token, $security_question, $security_answer));
		
		Database::disconnect();
		
		
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql1 = "SELECT MAX(id) AS id FROM user" ;
        $q = $pdo->prepare($sql1);
        $q->execute(array());
        $data = $q->fetch(PDO::FETCH_ASSOC); 
		 Database::disconnect(); 
	?> 	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myModal').modal({ backdrop: 'static' }, 'show');
	});
</script>
<?php


} else{
	error_log($sql);
  echo "Invalid Details";
  header("Location: ../view/register.php?invalid=true");
}	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register an Account</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:<?php echo $_SESSION['border'];?>;color:#FFFFFF;">
                <h4 class="modal-title">Register an Account</h4>
            </div>
            <div class="modal-body">
				<p>Successfully Registered</p>
				
						<p>Your new user ID is <?php echo $data['id']; ?>. Remember this, you'll need this to log in.</p>	
					
            </div>
			<div class="modal-footer">
          <a class="btn btn-success" href="../view/index.php">Close</a>
        </div>
        </div>
    </div>
</div>
</body>
</html>  