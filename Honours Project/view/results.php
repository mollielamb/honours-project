<!DOCTYPE html>
<?php
	    require '../model/database.php';
		session_start();
		$logged = "false";
		
		if (!empty($_POST)) {
		$_SESSION['colour'] = $_POST['background'];
		$_SESSION['border'] = $_POST['border'];
		$_SESSION['text'] = $_POST['text'];
		$_SESSION['size'] = $_POST['size'];
	}
		
		if(isset($_SESSION['id'])){
			$logged = "true"; 
		}
		
		if($_SESSION['complete'] == false){
			header("Location: sessions.php");
			
		}
	   
                            
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.php">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Results</title>


</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Test Results</h1></span>
    </header>
	</div>
	
	  <div class="item2">
    <div class="vertical-menu">
	<label>Navigation Bar</label>
 	<?php
    if ($logged == "true") {
           echo '<a href=index.php>Logout</a>';
        } else {
			echo '<a href=index.php>Login</a>';
		}?>
	<a href="#" id="myBtn">Customise Display</a>
  <a href=user.php>Home</a>
  <a href= cyber.php>Cyber Information</a>
  <a href= questions.php>Q&A</a>
  <a href=quiz.php class="active">Test</a>
  <?php 
	if($logged == "true"){
		echo '<a href=viewScores.php>View Previous Test Scores</a>';
		echo '<a href=changePassword.php>Change Password</a>';
	}
	?>
</div> 
</div>

<div class="item3">
         <div class="span10 offset1">
                    <div class="row">
                        <h3 style="margin:20px;">View Answers</h3>
                    </div>
					<?php
                        	echo '<form class="form-horizontal" action="../controller/saveScore.php" method="post">';
                            ?>
					<table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Question ID:</th>
						  <th>Question:</th>
                          <th>Your Answer:</th>
						  <th>Correct Answer:</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					<?php

                       for ($i = 0; $i < 10; $i++) {
								$num = (int)$_SESSION['questions'][$i];
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								 $sql = "SELECT * FROM test WHERE testID=$num" ;
								$q = $pdo->prepare($sql);
								$q->execute(array($num));
								$data = $q->fetch(PDO::FETCH_ASSOC); 
								$x = $i + 1; 
								Database::disconnect(); 
                                echo '<tr>';
								echo '<td>'. $x . '</td>';
								echo '<td>'. $data['question'] . '</td>';
								echo '<td>'. $_SESSION['answers'][$i] . '</td>';
								echo '<td>'. $data['correct_answer'] . '</td>';
								if ($_SESSION['answers'][$i] == $data['correct_answer']){
									echo '<td><i class="fa fa-check" style="font-size:'. $_SESSION['size'] .'px"></i></td>';
								} else {
									echo '<td><i class="fas fa-times style="font-size:'. $_SESSION['size'] .'px"></i></td>';
								}
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
					 </tbody>
					</table>
                   
					<p>FINAL SCORE: <?php echo $_SESSION['user_score'];?></p>	
						
<div class="form-actions">
		<a class="btn" name="retake" href="../controller/sessions.php">Retake Test</a>
		<button type="submit" name="save" class="btn btn-success">Save Score</button>
		<a type="button" href="quiz.php" class="btn btn-danger">Exit Test</a>
</div>
</form>
<script>
function colourChange() {
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

 $(document).ready(function(){
		$("#myModal").modal('show');
	});
}
</script>

  
  
  
  </div>
  </div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   <div class="modal-header">
   <h2>Change Colour</h2>
      <span class="close">&times;</span>
    </div>
	 <div class="modal-body">
	<form action="results.php" method="post">
	<?php if($_SESSION['deviceType'] == "computer"){?>
	  Select background colour: <input type="color" name="background" value="<?php echo $_SESSION['colour'];?>"><br><br>
	   Select border colour: <input type="color" name="border" value="<?php echo $_SESSION['border'];?>"><br><br>
	    Select text colour: <input type="color" name="text" value="<?php echo $_SESSION['text'];?>"><br><br>
		Select text size: <input type="number" id="change" class="form-control" name="size" value="<?php echo $_SESSION['size'];?>"><br><br>
	   <button type="submit" name="submit" class="btn btn-success">Submit</button>
	<?php } else { ?>
	<aside id="info-block">
      <section class="file-marker">
              <div>
                  <div class="box-title">
                      Not Available
                  </div>
                  <div class="box-contents">
                      <div id="audit-trail">
		 Select background colour: <input type="color" name="background" disabled value="<?php echo $_SESSION['colour'];?>"><br><br>
	   Select border colour: <input type="color" name="border" disabled value="<?php echo $_SESSION['border'];?>"><br><br>
	    Select text colour: <input type="color" name="text" disabled value="<?php echo $_SESSION['text'];?>"><br><br>
	</div>
	</div>
	</div>
	</section>
	</aside>
	</br>
		Select text size: <input type="number" id="change" class="form-control" name="size" value="<?php echo $_SESSION['size'];?>"><br><br>
	   <button type="submit" name="submit" class="btn btn-success">Submit</button>
	<?php } ?>
	</form>
	 </div>
	
  </div>

</div>
</div>
<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 
</script>

  </body>
</html>