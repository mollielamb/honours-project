<!DOCTYPE html>
<?php
	session_start(); 
	require '../model/database.php';
	
	$logged = "false"; 
	if(isset($_SESSION['id'])){
		$logged = "true";
		$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT firstname FROM user WHERE id={$_SESSION['id']}" ;
    $q = $pdo->prepare($sql);
    $q->execute(array());
    $data = $q->fetch(PDO::FETCH_ASSOC); 
	Database::disconnect(); 
	}
	

	if (!empty($_POST)) {
		$_SESSION['colour'] = $_POST['background'];
		$_SESSION['border'] = $_POST['border'];
		$_SESSION['text'] = $_POST['text'];
		$_SESSION['size'] = $_POST['size'];
	}
	
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Welcome User</title>

</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
		<?php if($logged=="true"){?>
			<span class="cell"><h1>Welcome, <?php echo $data['firstname'];?></h1></span>
		<?php } else {?>
			<span class="cell"><h1>Welcome, Guest User</h1></span>
		<?php }?>
    </header>
	</div>
	
	  <div class="item2">
    <div class="vertical-menu">
	<label>Navigation Bar</label>
	<nav class="nav flex-column">
	<?php
    if ($logged == "true") {
           echo '<a href=logout.php>Logout</a>';
        } else {
			echo '<a href=index.php>Login</a>';
		}?>
	  <a href="#" class="nav-link" id="myBtn">Customise Display</a>
	  <a href="#" class="nav-link active">Home</a>
	  <a class="nav-link" href=cyber.php>Cyber Information</a>
	  <a class="nav-link" href= questions.php>Q&A</a>
	  <a class="nav-link" href=quiz.php>Test</a>
	<?php 
	if($logged == "true"){
		echo '<a href=viewScores.php class="nav-link">View Previous Test Scores</a>';
		echo '<a href=changePassword.php>Change Password</a>';
	}
	?>
	</nav>
	</div> 
</div>

<div class="item3">

<h3>Basic Information<h3>

<div id="who">
<p style="font-weight:bold;">Who are we?</p>
<p>We are Cyber Safe, a company that makes your security online our number one priority.</p>

</div>

<hr class="hr">

<div id="aim">
<p style="font-weight:bold;">What is our aim?</p>
<p>Our aim is to educate and provide advice on remaining safe online. Our main focus 
is concerned around phishing, a form of online identity theft that can prove to be 
very dangerous - both for your online identity and your real life too.</p>
</div>

<hr class="hr">

<div id="why">
<p style="font-weight:bold;">Why are we doing this?</p>
<p>Several studies have concluded that older or less experienced internet users are far 
more likely to become victims of online threats (phishing, viruses, etc). Hopefully, in 
time this website will prove to be a useful resource and will help reduce the number of people 
caught out by such scams. The number of attacks per year is only increasing, as is the 
amount of people using the internet so it's important to get awareness out there for those who 
are not as experienced.</p>

<p>Older adults have the reputation of being more technopobic than their younger counterparts. The 
ultimate reason for this comes down the fact that they don't have the exposure everyone else has,
coupled with a fear of 'making a mistake', makes for a more stressful user experience. Hopefully this 
simple website will help alleviate some of that fear. </p>
</div>

<hr class="hr">

<div id="features">
<p style="font-weight:bold;">Website Features</p>
<p>Information - a series of four pages that will fill the user in on details surrounding cyber security 
in general with an in depth description of phishing attacks. </p>

<p>Q&A - a question and answer page where users can ask, answer, and view questions that will aim to improve 
their understanding on the subject.</p>

<p>Test- a quiz of ten randomly selected questions that will give the users an idea of how much information they have 
retained. </p>

<p>Accessibility - lets the user change the background, border, and text colours as well as the text size to help 
improve their user experience. </p>

<p>Password Change - available only to those user that are signed in. </p>



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
	<form action="user.php" method="post">
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