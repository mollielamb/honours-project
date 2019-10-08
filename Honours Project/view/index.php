<!DOCTYPE html>
<?php 
session_start();
 $_SESSION['colour'] = "#FFFFFF";
$_SESSION['border'] = "#218c04";
$_SESSION['text'] = "#000000";
$_SESSION['size'] = 18;
unset($_SESSION['security']);

require_once '../mobile/Mobile_Detect.php';
$detect = new Mobile_Detect;
$_SESSION['deviceType'] = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

?>
<html>
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../css/style.php">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <title>Login</title>
  
</head>
<body>
 <header>
           <span class="cell"><h1>Login</h1></span>
</header>


  <div class="container">
    <div class="row">
      <h4>Login with a valid User ID and Password</h4>
    </div>

     <form class="form-horizontal" autocomplete="off" action="../controller/menu.php" method="post">
	  
		<div class="control-group">
             <label class="control-label">User ID</label>
                <div class="form-inline">
                    <input name="userID" class="form-control" required   type="text"  placeholder="ID">
				</div>
        </div>
		</br>
		<div class="control-group">
             <label class="control-label">Password</label>
				<div class="form-inline">
                    <input id="password" class="form-control" name="password" placeholder="Password" pattern="(?=.*[A-Z]).{6,}" type="password" required>
					<i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword('password', 'pass-status')"></i>
				</div>
        </div>
		</br>
				<button class="btn btn-success">Login</button>
				</br>
	<label>Don't have an account?</label>
	<a href="register.php">Register now!</a>
	</br>
	<label>Don't want to sign in?</label>
	<a href="user.php">Continue as Guest</a><br>
	<br>
	<a href="forgotten.php">Forgotten ID or Password</a>
</form>
	<div class "row">
       <?php
        if($_GET["invalid"] == "true"){ 
	echo"<label>Invalid Login</label>";
        }
      ?>

    </div>
    </div>
  </div>
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

</html>
