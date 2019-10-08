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
		
		
		if (!isset($_SESSION['questions'])) {
    $_SESSION['questions'] = array();
	}
	$ids = join("','",$_SESSION['questions']);
		
	
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM test WHERE testID NOT IN ( '" . implode( "', '" , $_SESSION['questions'] ) . "' ) ORDER BY RAND() LIMIT 1";
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
	$_SESSION['questions'][] = $data['testID'];	
	$q_id = (int)$data["testID"];
				
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Test</title>
<style>
img {
     max-width:100%;
    height:auto;
}

</style>

</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Test Phishing Knowledge</h1></span>
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
		 <div="container">
                    	<?php
                        	echo '<form class="form-horizontal" autocomplete="off" action="../controller/score.php?question='.$q_id.'" method="post">';
                            ?>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Question <?php echo $_SESSION['question_number'] + 1; ?></label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['question'];?>
                            </label>
                        </div>
                      </div>
					<?php 
					if ($q_id == 7) {?>
					<div class="control-group">
					 <label class="control-label">Your Answer (One word):</label>
						<div class="controls">
							<input name="answer" required class="form-control" autocomplete="off" type="text" placeholder="Answer" 
							style="width:200px;margin:auto;margin-bottom:25px;">
						</div>
					</div>
					<?php } else if ($q_id == 8){ ?>
					<img src="../pics/Fake Microsoft.jpg"/></br>
					<input required type="radio" id="option1" name="answer" value="<?php echo $data['answer'];?>">&nbsp;<label for="option1"><?php echo $data['answer']; ?></label><br>
					<input required type="radio" id="option2" name="answer" value="<?php echo $data['answer2'];?>">&nbsp;<label for="option2"><?php echo $data['answer2']; ?></label><br>
					<?php } else if ($q_id == 9){ ?>
					<img src="../pics/Real Gmail.jpg"/></br>
					<input required type="radio" id="option1" name="answer" value="<?php echo $data['answer'];?>">&nbsp;<label for="option1"><?php echo $data['answer']; ?></label><br>
					<input required type="radio" id="option2" name="answer" value="<?php echo $data['answer2'];?>">&nbsp;<label for="option2"><?php echo $data['answer2']; ?></label><br>
					<?php } else if ($q_id == 10){ ?>
					<img src="../pics/Smishing-scam.jpg"/></br>
					<input required type="radio" id="option1" name="answer" value="<?php echo $data['answer'];?>">&nbsp;<label for="option1"><?php echo $data['answer']; ?></label><br>
					<input required type="radio" id="option2" name="answer" value="<?php echo $data['answer2'];?>">&nbsp;<label for="option2"><?php echo $data['answer2']; ?></label><br>
					
					<?php } else {?>
					<input required type="radio" id="option1" name="answer" value="<?php echo $data['answer'];?>">&nbsp;<label for="option1"><?php echo $data['answer']; ?></label><br>
					<input required type="radio" id="option2" name="answer" value="<?php echo $data['answer2'];?>">&nbsp;<label for="option2"><?php echo $data['answer2']; ?></label><br>
					<input required type="radio" id="option3" name="answer" value="<?php echo $data['answer3'];?>">&nbsp;<label for="option3"><?php echo $data['answer3']; ?></label><br>
					<input required type="radio" id="option4" name="answer" value="<?php echo $data['answer4'];?>">&nbsp;<label for="option4"><?php echo $data['answer4']; ?></label><br><br><br>
					<?php } ?> 
					  <div class="form-action">
                        <button type="submit" class="btn btn-success">Next Question</button>
                        </div>
                    </form>
					
                </div>

  </div>
</div>
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


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   <div class="modal-header">
	<h2>Change Colour</h2>
      <span class="close">&times;</span>
    </div>
	 <div class="modal-body">
	<form action="test.php" method="post">
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