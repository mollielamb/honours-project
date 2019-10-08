<?php 
session_start();
unset($_SESSION['forgotten']);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.php">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <title>Forgotten</title>
 <style>     
    select {
        width:500px;
    }
</style>

</head>
<body>
 <header>
           <span class="cell"><h1>Recover Details</h1></span>
</header>


  <div class="container">
  
<h4>Forgotten Your ID or Password</h4>
    <div class="row">
	<form class="form" action="securityQuestions.php" method="post">
	   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">Firstname</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
    </div>
    <div class="form-group col-md-6">
      <label for="Surname">Surname</label>
      <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
    </div>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="JohnSmith@gmail.com">
  </div>
  <div class="form-group">
  <label for="id_form"> What form of log in identification have you forgotten?</label>
	<select id="id_form" class="form-control" name="id_form" required onchange="forgotten(this);">
			<option id="forgotten" name="forgotten" value="">Please select what form of ID you have forgotten</option>
			<option id="forgotten" name="forgotten" value="id">I've forgotten my ID</option>
			<option id="forgotten" name="forgotten" value="password">I've forgotten my password</option>
	</select>
	
	
	<div id="id" form-group col-md-7" style="display: none;">
    <label for="password">Enter your password:</label> 
	<div class="form-inline">
	<input type="password" class="form-control" id="password" name="password">
	<i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('password', 'pass-status')"></i>
	</div>
	</div>
	
	<div id="pass" style="display: none;">
    <label for="userID">User ID:</label> 
	<input type="text" class="form-control" id="userID" name="userID">
	</div>
	</br>
	
 <a class="btn btn-danger" style="top-margin:20px; bottom-margin=20px;" href="index.php">Cancel</a>
 <button type="submit" name="submit" class="btn btn-success">Submit Details</button>
              

<script type="text/javascript">	
function forgotten(that) {
    if (that.value == "") {
		document.getElementById("id").style.display = "none";
		document.getElementById("pass").style.display = "none";
		
		document.getElementById("password").required = false ;
		document.getElementById("userID").required = false ;
		
    } if(that.value=="id") {
		document.getElementById("id").style.display = "block";
		document.getElementById("pass").style.display = "none";
		
		document.getElementById("password").required = true ;
		document.getElementById("userID").required = false ;
	} if(that.value=="password") {
		document.getElementById("id").style.display = "none"; 
		document.getElementById("pass").style.display = "block";
		
		document.getElementById("userID").required = true ;
		document.getElementById("password").required = false ;
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
	<div class "row">
       <?php
        if($_GET["invalid"] == "true"){ 
	echo"<label>Invalid Login</label>";
        }
      ?>
    </div>
</form>
	

<div class "row">
       <?php
        if($_GET["invalid"] == "true"){ 
		echo"<label>Invalid Details</label>";
        }
      ?>
    </div>
</form>
	
</body>
</html>
