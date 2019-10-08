 <?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.php">
	<title>Logging out</title>
	<style>
	header {text-align:center;
    padding: 19px;
		}		
		
h3 {text-align:center;}

.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #000000; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
    position: absolute;
  left: 50%;
  top: 40%;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<header>
			<span class="cell"><h1>Logging out</h1></span>
</header>
<h4 align="center">You are now logging out of your account. Redirecting to login page.</h4>
 <div class="loader"></div> 
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header( "refresh:2;url=index.php" );

?>

</body>
</html>  