<!DOCTYPE html>
<?php
session_start();

$logged = "false"; 

if(isset($_SESSION['id'])){
	$logged = "true";
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
    <title>Phishing Overview</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Cyber Security</h1></span>
    </header>
	</div>
	
	  <div class="item2">
    <div class="vertical-menu">
	<label>Navigation Bar</label>
 <?php
    if ($logged == "true") {
           echo '<a href=logout.php>Logout</a>';
        } else {
			echo '<a href=index.php>Login</a>';
		}?>
	<a href="#" id="myBtn">Customise Display</a>
  <a href=user.php>Home</a>
  <a href= "#" class="active">Cyber Information</a>
  <a href= questions.php>Q&A</a>
  <a href=quiz.php>Test</a>
  <?php 
	if($logged == "true"){
		echo '<a href=viewScores.php>View Previous Test Scores</a>';
		echo '<a href=changePassword.php>Change Password</a>';
	}
	?>
</div> 
</div>

<div class="item3">


<h4>What is Cyber Security?</h4>
<p>Cyber Security is the practice of taking steps to ensure that your digital devices are 
protected against incoming attacks. These attacks are usually aimed at gaining something 
from the system (passwords, bank details, personal documents) or at altering something on
the system (deleting or destroying documents, changing passwords to lock the user out of the system).</p>

<hr class="hr"> 

<h4>How do I make sure my system is safe?</h4>
<p>You don't need to know much about technology or be a cyber security specialist to make sure your systems
are protected. All you need to do is take a few preventative measures. </br>

1. Always check that the URLs (the link across the top of the page) is a safe and trusted one. Whether you 
do this via anti-virus software (Norton, Avast, McAfee) or just by checking that it starts with 'https' it 
does not matter.</br></br>

2. Don't open emails from unknown sources and don't download attachments unless you know what it is. </br></br>
 
3. Make sure you check regularly for updates and always install them the first chance you get. One of the ways 
older systems are compromised is by the perpetrator exploiting flaws in the outdated security software. </br></br>

4. Make sure your files are backed up. (This basically just means that you should save your files in two different places, 
e.g. in the cloud or on a memory stick.) </br></br>

5. Strong passwords. Strong passwords usually contain a mix of small letters, captial letters, numbers, and symbols. Make 
sure this is something you will remember but not something that can be easily guessed. </br></br>

6. Don't use Internet Explorer (Microsoft Edge in newer systems), use Chrome, Firefox, or Safari instead - these are more secure.</br></br> 

7. Avoid connecting to a WiFi network you don't know, stick to trusted sources. </br></br>

<p class="hr"> On the following pages is a more in depth look at some examples to give you an idea of what these 
look like in a practical setting.</p></br></br>

<a href="attacks.php" style='color: #000000'>
 <i class='fas fa-arrow-right' style='font-size:32px; float:center'></i></br>
	Next Page: Types of Cyber Attack 
</a>
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
	<form action="cyber.php" method="post">
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