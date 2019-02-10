<!DOCTYPE html>
<html>
<head>
<title> PICTOGRAPHY </title>
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
  border: none;
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
	
</script>
 
  <div class="containerfornav">
    <a href="index.php">HOME</a>
    <a href="#">ABOUT</a>
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
    </div>
    </div>


    <div class="search">
      <form action="gethint.php" method="POST">
        <input type="text" name="search" onkeyup="showsug(this.value)">
			<span id="suggestions"></span>

          <button type="submit" >SEARCH</button>
        </form>
    </div>


    <div class="log">
      <a href="#">LOGIN</a>
    </div>


    
  </div>
<div id="categorycontent"></div>



  <?php
    //include the page in website
    include 'information1.php';
  ?>

</body>
</html>
</body>

<?php

if (!$item) {
  //if there is nothing in the search bar
  echo '

<html>
<head> 

<title>About</title>
<div style="text-align: center; color: black; float: none; padding-left : 10px ">
<h1> <b> About </b> </h1>
</div>
 
</head>

<body background="b.jpg">
<h3>
<p style="color: black; float: none; padding: 10px ">Pictography provides photographers all over the world a platform to  sell, purchase and download images.</p>
<p style=" color: black; float: none; padding-left : 10px ">Pictography was launched to provide budding as well as professional photographers a platform to showcase their work and to make it easy for buyers/collectors to find images they are looking for. </p>



</h3>
</body>
</html>
';
}?>
