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
	
	$id=$_SESSION['id'];
	
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Change Password</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Change Password</h1></span>
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
  <a href=quiz.php>Test</a>
  <?php 
	if($logged == "true"){
		echo '<a href=viewScores.php>View Previous Test Scores</a>';
		echo '<a href="#" class="active">Change Password</a>';
	}
	?>
</div> 
</div>

<div class="item3">

    
             <div class="container" id="center">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Change Password</h3>
                    </div>

      <form class="form" action="../controller/updatePassword.php" method="post">
			  <div class="container">
		
		<div class="form-inline">
		<label for="old">Current Password:</label>
       <input id="old" class="form-control" name="old" placeholder="Current Password" type="password" pattern="(?=.*[A-Z]).{6,}" required>
		<i id="old-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('old', 'old-status')"></i>
		</div>
		</br>

		 <div class="form-inline">
        <label for="password">New Password:</label>
       <input id="password" class="form-control" name="password" placeholder="New Password" type="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
        <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('password', 'pass-status')"></i>
		</div>
		</br>
		
		<div class="form-inline">
        <label for="reenter">Re-enter Password:</label>
       <input id="reenter" class="form-control" name="reenter" placeholder="Re-enter New Password" type="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
        <i id="reenter-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('reenter', 'reenter-status')"></i>
		</div>
		<p><strong> (Password must contain a small letter, a capital, and be at least 6 characters long)</strong></p>
	
		</br>
			<div class="form-actions">
                          <button type="submit" class="btn btn-success">Change Password</button>
                        </div>
                    </form>
                </div>
				<div class "row">
       <?php
        if($_GET["invalid"] == "true"){ 
	echo"<label>Invalid Details</label>";
        }
      ?>

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
	<form action="changePassword.php" method="post">
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

<script>
function viewPassword(id, passID)
{
  var passwordInput = document.getElementById(id);
  var passStatus = document.getElementById(passID);
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}
  </script>
  
  </body>
</html>