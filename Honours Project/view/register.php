<?php
     
    require '../model/database.php';

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM security_questions" ;
        $q = $pdo->prepare($sql);
        $q->execute(array());
        $data = $q->fetch(PDO::FETCH_ASSOC); 
		
        Database::disconnect(); 
		
?>		
		

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.php">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <title>Register</title>
 <style>     
    select {
        width:500px;
    }
	
	form {
		padding-bottom: 50px;
	}
</style>

</head>
<body>
 <header>
           <span class="cell"><h1>Register</h1></span>
</header>


  <div class="container">
    <div class="row">
      <h4>Register with Valid Details</h4>
    </div>

    <div class="row">
      <form class="form" autocomplete="off" action="../controller/checkDetails.php" method="post">
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
    <label for="email">Email (Optional)</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="JohnSmith@gmail.com">
  </div>
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="password">Password</label>
	<div class="form-inline">
    <input type="password" class="form-control" id="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password">
	<i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('password', 'pass-status')"></i>
	</div>
  </div>
  <div class="form-group col-md-7">
    <label for="password2"> Re-enter Password</label>
	<div class="form-inline">
    <input type="password" class="form-control" id="password2" name="password2" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Re-enter Password">
	 <i id="reenter-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('password2', 'reenter-status')"></i>
	</div>
  </div>
  </div>
  <p><strong> (Password must contain a small letter, a capital, and be at least 6 characters long)</strong></p>
	
  <div class="form-group">
      <label for="ID">Security Questions</label>
      <select id="ID" class="form-control" name="ID" onchange="yesnoCheck(this);">
        <option id="security" required name="security" value="">Please choose a security question to answer</option>
			 <?php

               foreach ($pdo->query($sql) as $row) {
					echo '<option id="security" value="'.$row['sec_id'].'">'.$row['value'].'</option>';
			   }
				   
			?>
      </select>
    </div>
    
		
<div id="ifYes" style="display: none;">
    <label for="answer"><script type="text/javascript">
        document.write(value)
      </script> 
	 </label> 
	 <label for="answer">Security Question Answer</label>
	<input type="text" class="form-control" id="answer" placeholder:"Security Question Answer" required name="answer">
</div>

		
		</div>
		<a class="btn btn-danger" href="index.php" style="margin-bottom: 25px;">Cancel</a>
		<input type="submit" class="btn btn-success" value="Submit" style="margin-bottom: 25px;">
	</br>
	
<script type="text/javascript">	
function yesnoCheck(that) {
    if (that.value == "") {
		document.getElementById("ifYes").style.display = "none";
    } else {
        document.getElementById("ifYes").style.display = "block";
		var number=document.getElementById("ID").value;  
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
	echo"<label>Invalid Details</label>";
        }
      ?>
    </div>
</form>
	
    </div>
  </div>
</body>
</html>