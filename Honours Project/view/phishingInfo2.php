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
    <title>Phishing Information</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

 
<body>
<div class="grid-container">
	<div class="item1">
    <header>
	
			<span class="cell"><h1>Phishing Information</h1></span>
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
  <a href= cyber.php class="active">Cyber Information</a>
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

<h4>Forms of Phishing</h4>
<h5>Email</h5>
<p>The most common form of stealing details. Phishing via email has come a long way 
from the old 'Nigerian Prince' scams that once dominated the internet. The 'Nigerian 
Prince' scam is where the user is sent an email claiming to be from a Nigerian Prince,
requesting help with money issues (originally it was help getting out of his country but now 
includes matters such as paying hospital bills or bail). It is a scam that is still used today,
albeit not as frequently. Below are two examples of such scams, each with a different premise and 
request but ultimately with the same purpose.</p>
</br>
<hr class="hr">
<img src="../pics/nigerianPrince1.jpg"/></br></br>

<p>As you can see from this first example, the spelling and grammar may be better than some, the entire 
scenario being set up is completely ridiculous. Context with these emails may be the key to identifyining 
whether something is real. In this case, the idea that for the last fourteen years there has been an unknown
Nigerian astronaut stuck in space, is far from believable.</p>

<hr class="hr">

<img src="../pics/nigerianPrince2.png"/></br></br> 
<p>The second example is slightly more typical of this kind of scam - a wealthy benefactor looking to establish 
a connection - in this case as business partners. As usual, there is the promise that their generosity and cooperation 
will be rewarded with a large sum of money. As mentioned, this sort of scam is an old 
one and you wonder how people are still falling for them but it happens. Those most commonly targetted in this type of 
scam are those aged between 45 and 75 and are likely, though not always, widowed. The thinking behind this is that they 
are the most likely age group to have time and money, making them easy marks in the scammers eyes. It's a scam that goes 
hand in hand with the 'Save a Friend' scam where the outcome is the same - someone asking for a (large) loan - but in this 
instance the plea comes from a supposed friend. If this happens, the easiest way to determine if it is real is to phone or 
text the friend in question.</p> 

<hr class="hr">

<p>As mentioned above, the art of phishing someone has come a long way. A more common example 
today is that of the 'bank requesting card input details' variety.</p>

<img src="../pics/phishingEmail1.png"/></br>
<p>As you can see from the email, everything appears to be normal - there are no poor spelling errors
or bad grammar or anything that would make it look blatantly unprofessional. The only dead give away with
this email is that the bank would never ask the user to do this - it is far too insecure for such sensitive 
information. (Likewise they would never ask for this information over the phone.) However, the email even tries to 
play on the receiver's sense of paranoia by suggesting that someone else may have obtained their details, prompting 
them to follow through will the instructions without really thinking about it. If something seems suspicious, it probably is. 
When dealing with emails and downloads, it's best to be cautious, especially if there is a supposed time limit in which the user 
'must' reply.</p>

<hr class="hr">

<p>An example of such manipulation is seen in this next email:</p>

<img src="../pics/phishingEmail2.png"/></br>

<p>This is arguably a far more obvious one as it shows multiple signs of deception. </p>
<p>1. The email address. You might not know what Amazon's official email address is (@amazon.co.uk) but "@efficaciouscrbays.xyz"
is obviously not right. </p>
<p>2. The 'reward' link. This is another thing phishers often do: try to convince the victim that they've won some sort of competition
(usually one they didn't even enter in the first place) or reward (usually a holiday or a large sum of money). </p>
<p>3. The time limit. It's just trying to play on the fear that something terrible will happen if you don't respond. That's almost 
never the case and if it is, it is likely that there will be more than one email sent as the deadline gets closer. </p>


<a href="phishingInfo.php" style='color: #000000'>
 <i class='fas fa-arrow-left' style='font-size:32px; float:center'></i>
	Previous Page: Phishing Overview
</a>
</br>
<a href="phishingInfo3.php" style='color: #000000'>
	Next Page: Forms of Phishing - Other
	 <i class='fas fa-arrow-right' style='font-size:32px; float:center'></i>
</a>

  
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
	<form action="phishingInfo2.php" method="post">
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