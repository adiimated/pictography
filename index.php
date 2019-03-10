<?php
	session_start();
?>
<?php
error_reporting(0);
?>

<html>
<head>
  <title>pictography:home page</title>
  <style type="text/css">
  * {box-sizing: border-box;}
body{
  margin: 0;
  background-color: white;

}
.containerfornav {
  background: white ;
  overflow: hidden;
  width:100%;
}
.containerfornav a {
  font-family: Helvetica Verdana ;
  float: left;
  padding: 10px 15px;
  text-decoration: none;
  color: black;
  font-size: 20px;
}
.containerfornav a:hover{
  background-color: LightCoral;
}


.cat ul{
display:none;

list-style: none;
}
.categories ul{
color: black;
position: absolute;
float: none;
background:white;
min-width:100px;
padding:5px;
top:27px;
left: 190px;
z-index:1;
text-align:center;
align-self: center;
}
.categories ul li a{
  text-align: center;
}
.containerfornav .cat:hover ul {
  display: block;
}

.containerfornav .cat .categories ul li a:hover{
  background-color: lightcoral;
}

.log{
  position: absolute;
  right: 0px;
}
.search{
  position: absolute;
  float: right;
  right: 100px;
  font-size: 20px;
  border: none;

}
.search button {
  font-size: 20px;
  border: none;
  cursor: pointer;
  border: black;
  background: lightcoral;
  color: white;
  padding: 5px 15px;
  font-family: Helvetica Verdana;
  backface-visibility: 90%;
}
.search button:hover{
  background-color: black;
}
.search input[type=text] {
  padding: 6px;
  margin-top: 7px;
  font-size: 17px;
  border: none;
  width: 400px;
  font-family: Verdana ;
}

.srh img {
    padding: 10px;
    float: left;
    min-height: 300px;
    width: 33%;
    display: block;
}

</style>


    <script type="text/javascript" src="functionsfornavbar.js"></script>
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>


</head>
<body>
<script>
	
	function showsug(str) {
    if (str.length == 0) {
        document.getElementById("suggestions").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("suggestions").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str, true);
        xmlhttp.send();
    }
}
function gotothis(str){
	window.location(url);
}
	
</script>
 
  <div class="containerfornav">
    <a href="index.php">HOME</a>
    <a href="about.php">ABOUT</a>
    <div class="cat">
    <a href="#">CATEGORIES</a>
    <div class="categories">
      <ul>
        <li> <a href="categorypage.php?cat=Animal"> Animal</a></li>
        <li> <a href="categorypage.php?cat=Art"> Art</a></li>
        <li> <a href="categorypage.php?cat=Architecture"> Architcture</a></li>
        <li> <a href="categorypage.php?cat=Festival"> Festivals</a></li>
        <li> <a href="categorypage.php?cat=Food"> Food</a></li>
        <li> <a href="categorypage.php?cat=Lifestyle"> Lifestyle</a></li>
        <li> <a href="categorypage.php?cat=Sports"> Sports</a></li>
        <li> <a href="categorypage.php?cat=Wildlife"> Wildlife</a></li>
        <li> <a href="categorypage.php?cat=Wedding"> Weddings</a></li> </ul>
   </ul>
    </div>
    </div>

	<a href="#" padding-left="100px"; >Welcome
				<?php echo $_SESSION['username'] ?> </a>
   
    <div class="Search">
      <form action="" method="POST">
        <input type="text" name="search" onkeyup="showsug(this.value)" onclick="gotothis(this.value)">
			<span id="suggestions"></span>

          <button type="submit" >SEARCH</button>
        </form>
    </div>


    <div class="log">
      <a href="http://localhost/login/login.php">LOGIN</a>
    </div>
	<div>
       </div>
	   <div class="search">
      <form action="" method="POST" >
        <input type="hidden" name="search" value="">
			

          <button type="submit" >SEARCH</button>
        </form>
    </div>
	<?php
error_reporting(0);	
session_start();
	require'C:\xampp\htdocs\login\dbconfig\config.php';
	if($_SESSION['username'])
	{
		?>
		<style>
			.log{
				display:none;
			}
		</style>
		<?php
	}
	?>
    
  </div>
<div id="categorycontent"></div>


  <?php
    //include the page in website
    include 'information1.php';
error_reporting(0);
  ?>


</body>
</html>


<?php
error_reporting(0);

if (!$item) {
  //if there is nothing in the search bar
  echo '

<!Slideshow>

<!DOCTYPE html>
<html>
<head>
<title> Pictography</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  min-width: 100%;
  top:30px;
  margin: auto;
}

/* Caption text */
.text {
  color: black;
  font-size: 20px;
  padding: 8px 12px;
  position: absolute;
  top:70px;
  bottom: 8px;
  width: 100%;
  text-align: bottom-left;
}

/* Number text (1/3 etc) */
.numbertext {
  color: black;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 40px;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="art8.jpg" style="width:100%; color="black";">
  <div class="text" > Pictography</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="a7.jpg" style="width:100%">
  <div class="text">Pictography</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="f07.jpg" style="width:100%">
  <div class="text">Pictography</div>
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>
<body background="a.png">
</body>
</body>
</html> 

<!Categories>

<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
    border: 1px solid black;
}

div.gallery:hover {
  margin: 5px;
  
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px) {
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>


<div class="clearfix"></div>


</body>
</html>
';
}
?>    					
<style>

.po a {
	
  font-size: 30px;
  border: none;
  cursor: pointer;
  border: none;
  background: lightcoral;
  color: white;
  padding:15px;
  font-family: Helvetica Verdana;
  backface-visibility: 90%;
  text-decoration: none;
	border-radius:5px;
	float:left;
	margin-left: 17%;
	padding-left:500px;
	padding-right:500px;
  
}
</style>


<div class="po">

<br>
<a href="login.php" onclick="bye()" > LOGOUT </a> <br><br><br>
<script>
function bye()
{
	<?php
		$_SESSION['username']="";
		?>
			<style>
			.log{
			position: absolute;
  right: 0px;
			}
			</style>
	
		
</script>
</div>
