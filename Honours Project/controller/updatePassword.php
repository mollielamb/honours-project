<?php 

require '../model/database.php';
session_start();

  $old = $_POST['old'];
  $password = $_POST['password'];
  $reenter = $_POST['reenter'];
  $userID = $_SESSION['id'];
  
   $valid = false; 

   
  $pdo = Database::connect();
   $sql = "SELECT * FROM user WHERE id='$userID'";
    $q = $pdo->prepare($sql);
        $q->execute(array($userID));
        $data = $q->fetch(PDO::FETCH_ASSOC); 

 
if($password == $reenter && password_verify($old,$data['password'])){
	
   $token = password_hash($password, PASSWORD_BCRYPT);
  
   $id = $_SESSION['id'];
      $sql = "UPDATE user SET password = '$token' WHERE id='$id'";
      $q = $pdo->prepare($sql);
      $q->execute(array($id));
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
  header("Location: ../view/changePassword.php?invalid=true");
}
  
Database::disconnect(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Change Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:<?php echo $_SESSION['border'];?>;">
                <h4 class="modal-title" style="color:#FFFFFF;">Change Password</h4>
            </div>
            <div class="modal-body">
				<p>Password Successfully Changed</p>
				
						<p>Your password has been changed to: <?php echo $password;?> use this to login.</p>	
					
            </div>
			<div class="modal-footer">
          <a class="btn btn-success" href="../view/user.php">Close</a>
        </div>
        </div>
    </div>
</div>
</body>
</html>  