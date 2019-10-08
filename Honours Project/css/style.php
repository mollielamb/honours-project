<?php 

session_start();
header("Content-type: text/css; charset: UTF-8");
?>

header {text-align:center;
    padding: 20px;
		}	


html {
	font-family: 'Arial';
}

body {
	font-family: 'Arial';
}
		
div{color: <?php echo $_SESSION['text'];?>;}
h3 {text-align:center;}


.vertical-menu {
    width: 200px; /* Set a width if you like */
	padding: 15px; 
}
#myBtn{color: black;}

.vertical-menu a {
    background-color: #fff;
	font-size: <?php echo $_SESSION['size']; ?>px;
    color: black;?>; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
	 border: 1px solid black;
	
}

.vertical-menu a:hover {
    background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: <?php echo $_SESSION['border']; ?>;
    color: white;
}

label {
	font-size: <?php echo $_SESSION['size']; ?>px;
}

.item1 {
	background-color: #ffdb3a;
	font-size: 2rem;
	font-weight: 700;
	font-style: italic;

	display: flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}

.item4 {
	background-color: rgb(100, 100, 100);
	color: #fff;
	font-size: 1.2rem;
	font-style: italic;

	display: flex;
	justify-content: center;
	align-items: center;
}

.item2 {
	background-color: rgb(230, 230, 230);
	text-align: center;
	padding: 10px;
}

.item1,
.item2,
.item3 {
	padding: 15px;
}

.item1 { grid-area: header; }
.item4 { grid-area: footer; }
.item3 { grid-area: main; }
.item2 { grid-area: menu; }
.item5 {grid-area:space;}

.grid-container {
	display: grid;
	grid-template-areas: "header header header header header space"
	                     "menu main main main main space"
	                     "footer footer footer footer footer space";

	grid-template-columns: 300px 500px 1fr;

	grid-template-rows: 100px 
						1fr 
						30px;
	grid-gap: 10px;
  background-color: <?php echo $_SESSION['border']; ?>;

	min-height: 100vh;
}


.grid-container > div {
  background-color:  <?php echo $_SESSION['colour'];?>;
  text-align: center;
  padding: 20px 0;
}

@media screen and (max-width: 600px) {
	.grid-container {
		grid-template-areas: "header"
		                     "menu"
		                     "main"
							 "space"
		                     "footer";

		grid-template-columns: 100%;
		grid-template-rows: 100px 
							50px 
							1fr
							50px 
							30px;
	}
}



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  right: 10px;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;
			float:right;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

p{
	font-size: <?php echo $_SESSION['size']; ?>px;
	position: relative;
	margin: 40px;
	padding: 10px; 
	
}
table tbody tr td {
  font-size: <?php echo $_SESSION['size']; ?>px;
}

#change{
	width: 80px;
	 margin: auto;
}


#container{
	font-size: <?php echo $_SESSION['size']; ?>px;
	padding 20px;
	  position: relative;
	left: 50%
  width: 75%;
	
}

#center {
    width: 400px;
    margin-right: auto;
    margin-left: auto;
    
    height: 400px;
}


#disabled {

   /* Make form elements appear disabled against grey background */
   background-color: gray;
   opacity:0.5; 

   /* Prevent user interaction with form while disabled */
   pointer-events:none;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.hr{ 
    display: block
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 3px;
border-color:<?php echo $_SESSION['border']; ?>;
} 

 /* Style the form - display items horizontally */
.form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

/* Add some margins for each label */
.form-inline label {
  margin: 5px 10px 5px 0;
}

/* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

#info-block section {
    border: 2px solid black;
}

.file-marker > div {
    padding: 0 3px;
    margin-top: -0.8em;
    
}
.box-title {
    background: white none repeat scroll 0 0;
    display: inline-block;
    padding: 0 2px;
    margin-left: 8em;
} 

