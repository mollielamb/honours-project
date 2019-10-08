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
    <title>Phishing Websites</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style>
img {
     max-width:100%;
    height:auto;
}
</style>
</head>
 
<body>
<div class="grid-container">

	<div class="item1">
    <header>
	
			<span class="cell"><h1>Phishing Websites</h1></span>
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

<h4>Forms of Phishing - Websites and Others</h4>

<p>It can be hard to know for sure just how secure a website actually is. Companies behind websites always want to 
make it seem as if their website's security is the best, this is rarely the case. Sometimes, it genuinely isn't the user's 
fault if their computer gets a virus: sometimes security on some actual websites can be sorely lacking and it isn't 
easy to find out from any reliable source just how secure a website is either, as organisations aren't exactly forthcoming on any 
security blind spots they may have due to the risk of losing clients or getting hacked.</p>

<hr class="hr">

<p>Phishing websites (also called spoofed websites) are designed mainly with the purpose of
obtaining the user's passwords and card details. Users usually arrive at these sites via a link from a 
dodgy email. They are usually spoofed versions of actual, legitimate websites
and can be very hard to differentiate if you don't know what to look for. There are a few dead giveaways but you probably 
wouldn't notice unless you were specifically looking for them:</p>

<img src="../pics/phishingSite1.jpg"/></br>
</br>

<img src="../pics/phishingWebsite2.jpg"/></br>

<p>1. The main one, as seen in the two examples above, is the link along the top differing from that of the 
real version. Facebook.com becomes sanagustinturismo.co/Facebook and amazon.co.uk becomes amazonn.co.uk. The former 
is noticeably wrong with one glance but the latter is only one letter different and could easily catch you out, even if you 
were looking closely. </br></br>

2. If you have plenty of previous experience online, you may be able to tell just by using the site as although the design 
and the branding are exactly the same, there may be a few small differences (spelling, grammar, overall feel) in the quality of 
user experience. </br></br> 

3. If you got to the website by clicking on an email link (a common occurence) then try accessing the website by other means - 
i.e. by typing into a search engine (Google, Yahoo, Bing) as this is less likely to take you to a spoofed site. </br></br>

4. Check the payment methods. If a website only allows you to pay by inputting your bank details, run. Legitimate websites 
will give you the option to pay by credit card/paypal. </br></p>

<hr class="hr">

<p>Sometimes scammers take it one step further though, by using cyrillic symbols that are identical in appearance to letters of the 
English language. Facebook is a good example. Given its popularity, hackers could set up a spoofed website with the URL: facebοοk.com.
Spot the difference? Well, the only way to tell the two apart would be to press CTRL and F at the same time on your keyboard and search 
for two o's next to each other. Other than that, it is very believable and almost inevitable that someone would fall for it.</p>

<hr class="hr">

<p>Something very similar to this set up is a technique called 'pharming'. The difference between phishing and pharming is that, as mentioned 
above, in phishing users arrive at the spoofed sites through email whereas in pharming they can arrive there just while browsing the internet. 
They can click on a completely legitimate link and, instead of being taken to the real website, they're taken to the false one instead. Sounds 
complicated? This happens by the attacker 'poisoning' the website names stored by the internet (called the Domain Name System) and changing 
them to direct to the fake site. Because the method of drawing people in is not obvious, this form of phishing catches quite a few 
people out. </p>

<hr class="hr">

<p>Usually one way to tell if a website is legitimate is the small lock symbol at either the top or the bottom of the screen. Like this:</p>

<img src="../pics/topLock.jpg"/>

<p>In theory this means that the website is safe and secure. This is not always the case. Don't believe that the website is legitimate just 
because you see this symbol. Always exercise caution.</p>

<hr class="hr">

<p>Phone calls</p>
<p>Occasionally known as 'vishing' (voice + phishing) this sort of phishing was a big thing before the dominance of the internet took over. Still
done today but usually far less successful than it was. This goes hand in hand with Smishing (stands for SMS phising) which is essentially phishing over text. 
Considering the main point of all phishing schemes is to gain information or large amounts of money, the most common pretence is that they are calling 
from an official source - the bank or the government - giving the user the idea that everything is above board. Sometimes they use a synthesised voice,
sometimes others it's another human on the line - don't assume that it's real just because there's another person talking to you. Unlike standard phishing, 
vishing is usually carried out without a specific target (or target group) in mind. Smishing targets mainly smart phones, so if you're still 
using your aged Nokia brick then this is a type of phishing you likely won't encounter. Smishing works as well as it does due to the false 
belief that mobiles are automatically more secure than computers. This lack of awareness lowers the user's guard, leading them to be more likely 
to open a fraudulent message. Smishing messages, again, are designed to look like they came from your bank, or your network service provider, or 
the company who made your phone (iPhones in particular). The example below is of a mocked up smishing message to give you an idea of the sort of
wording they use.</p>

<img src="../pics/Example Smishing.jpg"/></br>

<a href="phishingInfo2.php" style='color: #000000'>
 <i class='fas fa-arrow-left' style='font-size:32px; float:center'></i></br>
	Previous Page: Forms of Phishing - Email
</a>
</div>
</br>

  
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
	<form action="phishingInfo3.php" method="post">
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