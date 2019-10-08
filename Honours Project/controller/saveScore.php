<?php

  require '../model/database.php';
  session_start(); 
  
  $poster = $_POST['poster'];
  $answer = $_POST['answer'];
 
   $valid = "true"; 
   
     $pdo = Database::connect();
      
		if(!isset($_SESSION['id'])){
			?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#myModal').modal({ backdrop: 'static' }, 'show');
				});
			</script>
<?php
		} else {
	 
  			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO quiz_answers (userID,score) values(?, ?)";
            $q = $pdo->prepare($sql);
			$id = $_SESSION['id'];
            $q->execute(array($id,$_SESSION['user_score']));
            Database::disconnect();
            header("Location: sessions.php");
		
		} 
	
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
                <h4 class="modal-title" style="color:#FFFFFF;">Save Score Alert</h4>
            </div>
            <div class="modal-body">
				<p>Save Score</p>
				
						<p>You must be logged in to save your score</p>	
					
            </div>
			<div class="modal-footer">
          <a class="btn btn-success" href="../view/quiz.php">Close</a>
        </div>
        </div>
    </div>
</div>
</body>
</html>  