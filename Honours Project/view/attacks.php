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
    <title>Cyber Attacks</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Cyber Attacks</h1></span>
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
<h4>What are the different types of cyber attack?</h4>
<p>Before going into more detail on a specific form of cyber attack - phishing - here is a brief overview of the kind of 
thing that could pose a threat to any system.</p>

<hr class="hr">

<p>1. Malware</p> 
<p>Most commonly gets onto the system via email attachment the user has opened. Comes in a few different 
forms but all of them share the common trait of being able to spread across multiple systems (a network)
and still remain undetected. </p>

<p>Randomware: most commonly affects businesses but has also been used to target organisations with large amounts
of personal data (hospitals, banks). Ransomware forces the victim to pay a ransom 
in order to access a certain thing (file, pices of software, website, etc) and it is not guarenteed that the user
will get their access back even if they pay.</p>

<p>Trojan Horse: malicious software diguised as something legitimate (a pdf or zip file for example). Ransomware is a 
form of Trojan and these are usually used as a way of obtaining the victim's financial details. </p>

<p>Spyware: software which tracks what actions you take. One form of this is a keylogger: a program that records everything 
you type, giving the hacker all your passwords and, potentially, your card details too. Adware: tracks what websites you visit
and what you download - used mainly for advertising purposes and isn't as malicious as the rest but can considerably slow down 
your computer. </p></br> 

<hr class="hr">

<p>2. Web Attacks</p> 

<p>SQL Injection (also known as SQLI): targets the database containing user information. Can either cause this information to be displayed, 
leaking private user information to anyone who accesses it, or can delete all the information stored there. Either 
way this is an attack that could end up costing a business millions and end up completely destroying its reputation. </p>

<p>Cross-Site Scripting (also known as XSS): malicious code inserted into normally trusted websites which is then carried out on 
the user's system.</p>

<hr class="hr">

<p>3. (D)DOS </p>
<p>Distributed Denial of Service (or simply Denial of Service) attack: a large number of computers constantly bombarding a server with data 
(for example, emails) until the server (the hardware hosting the website) is overloaded and no longer responds. Depending on the scale 
of the attack this can sometimes take days to resolve. Unlike most other forms of cyber attack, this one doesn't yield any real form of 
payment for the perpetrators; it doesn't make them any money and they don't get any personal user data out of it. Usually the reason for 
carrying out one of these attacks is to shut down a business for a day or two and again, can end up proving very costly for the victims. 
</p> 

<hr class="hr">

<p>4. Eavesdropping attack </p>

<p>Comes in two different forms - </p>

<p>Passive: spies on the messages being sent out by the computer, does not interfere or initiate in any way, just listens in. </p>

<p>Active: poses as a benign machine and looks for the information by sending out signals or messages. Also known as probing or scanning. </p>

<p>Passive attacks can be more dangerous than the active ones as those need permission in order to trespass. Passive attacks don't make 
themselves known in the same manner and generally go undetected for longer. If an active attack is carried out, it is a sign that a 
passive attack was launched first. </p>

<hr class="hr">

<p>There are general signs to look for when you suspect that something may be amiss (or even if you don't): </br></br>

1. Your computer is slower than usual. This is only a concern if it's much slower than normal; for example if it takes more than five 
minutes to start up while it usually only thirty seconds.</br></br>

2. Things won't run or will run extremely slowly (installed applications or the internet). Linked to the first point. Could be caused by something 
else but it's still an issue to be looked into. </br></br>

3. Or alternatively, things start randomly opening and closing on their own. </br></br>

4. Your laptop will randomly freeze/shutdown. It could just be a problem with the hardware or it could be a sign of malware. </br></br>

5. A sudden increase in used disk space. If you find you're running unexpectedly low on available space then there's a chance that the 
resources are being taken up by malicious software. </br></br>

6. Antivirus software is disabled but you weren't the one who disabled it. If the antivirus software is no longer enabled there's a chance 
that this has been caused by malware sneaking through your computer's defences and disabling it. This is something you should look into 
fixing immediately. </br></br>

7. Missing/altered files. </br></br>

8. Error messages - possibly asking you to install something in order to 'fix the problem'. </br></br>

9. Emails you didn't send. Various viruses and malwares spread through email so if you notice emails in your sent box, you probably have a 
virus, or if you receive strange emails from friends accounts with links to random downloads, do not click it. </br></br>

10. An influx in popup adverts/messages is a sign of spyware. </br>

</p>

<a href="cyber.php" style='color: #000000'>
 <i class='fas fa-arrow-left' style='font-size:32px; float:center'></i>
	Previous Page: Cyber Security
</a>
</br>
<a href="phishingInfo.php" style='color: #000000'>
 <i class='fas fa-arrow-right' style='font-size:32px; float:center'></i></br>
	Next Page: Phishing Overview 
</a>
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
	<form action="attacks.php" method="post">
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