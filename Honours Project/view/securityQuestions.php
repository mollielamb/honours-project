<?php 
require '../model/database.php';
	session_start();
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname']; 
	$email = $_POST['email'];

	$selected_val = $_POST['id_form']; 
	
	if(!isset($_SESSION['forgotten'])){
	$_SESSION['forgotten'] = $selected_val;
	}
	
	if($selected_val == "id"){
		$password = $_POST['password'];
		
		
		 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT u.firstname, u.surname, u.email, u.id, u.security_question, u.security_answer, s.sec_id, s.value
		FROM user u INNER JOIN security_questions s ON u.security_question = s.sec_id 
		WHERE u.firstname='$firstname' 
		AND u.surname='$surname' 
		AND u.email='$email'";
		
        $q = $pdo->prepare($sql);
        $q->execute(array($firstname, $surname, $email));
        $data = $q->fetch(PDO::FETCH_ASSOC); 
		
        Database::disconnect();
		
		if(!isset($_SESSION['pass'])){
		$_SESSION['pass'] = $data['password'];
		}
		
		if(!isset($_SESSION['security'])){
			$_SESSION['security'] = $data['value'];
		}
		
		if(!isset($_SESSION['user'])){
		$_SESSION['user'] = $data['id'];
		}
		
		if (!$data || password_verify($password, $data['password'])){
			error_log($sql);
			echo "Invalid Details";
			 header("Location: forgotten.php?invalid=true");
		}
		
		
		
	} else if ($selected_val == "password") {
		$userID = $_POST['userID'];
		
		
		 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT u.firstname, u.surname, u.email, u.password, u.security_question, u.security_answer, s.sec_id, s.value
		FROM user u INNER JOIN security_questions s ON u.security_question = s.sec_id 
		WHERE u.firstname='$firstname' 
		AND u.surname='$surname' 
		AND u.email='$email'
		AND u.id='$userID'";
		
        $q = $pdo->prepare($sql);
        $q->execute(array($firstname, $surname, $email, $userID));
        $data = $q->fetch(PDO::FETCH_ASSOC); 
		
        Database::disconnect();
		
		if(!isset($_SESSION['security'])){
			$_SESSION['security'] = $data['value'];
		}
		
		if (!$data){
			error_log($sql);
			echo "Invalid Details";
			 header("Location: forgotten.php?invalid=true");
		}
	}
	
	if(!empty($_POST)){
		$answer=$_POST['sec_answer'];
  $pdo3 = Database::connect();
  $sql3 = "SELECT * FROM user WHERE security_answer='$answer'";
   $q3 = $pdo3->prepare($sql3);
        $q3->execute(array($answer));
        $data3 = $q3->fetch(PDO::FETCH_ASSOC); 
 Database::disconnect();
 
if($data3){
		
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
	<?php 


} 
	}
	
	
		
?>	
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Security Question</title>
</head>
<body>
 <header>
           <span class="cell" style="text-align:center;"><h1>Recover Information</h1></span>
</header>

<h4 style="text-align:center;">Forgotten Your ID or Password</h4>

  <div class="container">
		
    
	<form class="form-horizontal" action="securityQuestions.php" method="post">
	
	 <label for="sec_answer"><?php echo $_SESSION['security']?></label> 
	<input type="text" id="sec_answer" name="sec_answer" class="form-control" required placeholder="Answer to Security Question">

<div class="form-actions" style="margin-top:20px;">
	<a class="btn btn-danger" href="forgotten.php">Cancel</a>
<button type="submit" name="submit" class="btn btn-success">Submit Answer</button>

</div>
	

</form>

</div>
<div class "row">
       <?php
        if($_GET["invalid"] == "true"){ 
		echo"<label>Invalid Login</label>";
        }
      ?>
    </div>
	
<script type="text/javascript">
$(document).ready(function(){
	$('.launch-modal').click(function(){
		$('#myModal').modal({
			backdrop: 'static'
		});
	}); 
});
</script>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:<?php echo $_SESSION['border'];?>;color:#FFFFFF">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Recover Identification</h4>
            </div>
            <div class="modal-body">
				<p>Forgotten Information Recovered</p>
				<?php 
					if ($_SESSION['forgotten'] == "password"){
						  $newPass = $answer."2030";
			
						  
						  $token = password_hash($newPass, PASSWORD_BCRYPT);
						  
						   $pdo1 = Database::connect();
							$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							 $sql1 = "UPDATE user SET password = '$token' WHERE security_answer='$answer'";
							
							$q1 = $pdo1->prepare($sql1);
							$q1->execute(array($answer));
							
							Database::disconnect();
						  
						?>
						<p>Your password has been reset to: <?php echo $newPass;?> use this to login. 
						If you wish to change your password login and then follow the steps highlighted.</p>	
					<?php
						
					} else if($_SESSION['forgotten'] == "id"){?>
					<p>Your user ID is: <?php echo $_SESSION['user']; ?> use this to login, this cannot be changed.</p>
					
					<?php
					} else {
						echo $_SESSION['forgotten'];
					}
					?>
            </div>
			<div class="modal-footer">
          <a class="btn btn-info" href="index.php">Back to Login</a>
        </div>
        </div>
    </div>
</div>
	
</body>
</html>