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
	
			<span class="cell"><h1>Phishing Overview</h1></span>
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

<div id="container">
<h4>What is phishing?</h4>
<p>Phishing is a specific form of cyber attack involving the perpetrator stealing the 
victim's identity via social means. There are two main ways this can be carried out, 
through emails - usually claiming to be from the user's bank, requesting that they enter
their card details - or through fake websites designed to look almost exactly like the 
original, legitimate ones. Before the internet became as widely used as it has, phishing 
also took the form of spam phone calls, some of them working better than others. In the 
1990s there was a scandal involving telemarketers, where it was found that they had been 
deliberately targetting older people. It is a practice that continues now as some scammers
have compiled mailing lists comprised entirely (or almost entirely) of older users. Phishing 
works the way it does because these emails are written in a way to play on their victim's 
emotions - usually greed or fear - and usually claim that the situation is an urgent matter 
(reply within x number of days or x will happen). This is not true and if you are concerned 
that it is, get in touch with the person/people claiming to be behind the email (if it is 
from your bank, contact them and verify whether or not they did send the email).</p>

<hr class="hr">

<h4>What effect can phishing have?</h4>
<p>The main effect phishing can have on the victim is a total breach of their privacy, potentially
leading to financial losses and the user being banned from accessing their own accounts.</p> 

<hr class="hr">

<p>There are general signs to look for when you suspect that something may be amiss: </p>

<p>1. Poor spelling and/or grammar (noticeable mainly in emails).</p>
<p>2. Links that do not go to legitimate websites. </p>
<p>3. Asking the target to do things that they would not be asked to do through proper channels.</p>
<p>4. Offering up rewards. </p>
<p>These may sound obvious - why would anyone actually believe they've won an all expenses paid trip around the world? - 
but it does happen, and cyber criminals have a way of making these things seem extremely realistic in some cases.</p>

<hr class="hr">

<p>As with most cyber attacks there is more than one type of phishing. Usually these attacks are broad, 
and target a large number of people, some of whom will probably bite and some who won't. Sometimes though
these attacks have a specific target set for them.</p>

<hr class="hr">

<p>One example of this is known as spear phishing. Spear phishing is the name given to a form of attacks aimed 
at a specific business/company/person. These attacks are always personalised (quality over quantity), a process which 
involves gathering information beforehand, unlike a regular phishing scam (quantity over quality). This information 
is usually comprised of: passwords, usernames, email addresses, potentially even recent internet searches and purchases. 
Understandably, with this sort of phishing there are a lot more takers than with your regular, everyday phishing as everything
is more slick and credible in appearance. </p>

<hr class="hr">

<p>Building on spear phishing, the next step up is called whaling (or whaling phishing) and gets its name from the fact that it 
is a sort of phishing that targets only the big 'phish' (CEOs, high up board members, employees with high levels of access). 
Whaling is considered a form of spear phishing, as once again, the attacker has done their research and will already have gained 
all the necessary information. Whaling emails will always be addressed directly to the target (unlike normal phishing ones which 
usually just say 'valued customer' or 'user') and will usually ask them to download a document for viewing. The document will, 
of course, contain some sort of malware - probably a keylogger - to allow the attacker to track every key the victim presses. 
As these targets are usually in a position of relative power in some massive businesses fallout of whaling can potentially be massive for 
the target(s). </p> 

<hr class="hr"> 

<p>Another example, unrelated to the first two, is a form of phishing called clone phishing. Clone phishing is based on taking a legitmate message 
already seen by the user, and, as the name suggests, cloning it with a few minor changes. These changes will lead the user to exactly what the 
attacker wants them to see, whether it's a dodgy attachment or a fake website. This works as well as it does by claiming somewhere in the 
message that it's an updated version of the original message, luring the user into believing it because some companies and business <strong>do</strong> 
send out updated emails every so often.</p>

<hr class="hr">

<p> On the following pages is a more in depth look at some examples to give you an idea of what these 
look like in a practical concept.</p></br></br>
</div>
<a href="attacks.php" style='color: #000000'>
 <i class='fas fa-arrow-left' style='font-size:32px; float:center'></i>
	Previous Page: Cyber Attacks
</a>
</br>
<a href="phishingInfo2.php" style='color: #000000'>
 <i class='fas fa-arrow-right' style='font-size:32px; float:center'></i></br>
	Next Page: Forms of Phishing - Email 
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
	<form action="phishingInfo.php" method="post">
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