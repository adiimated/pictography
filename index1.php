<!DOCTYPE html>
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




  </style>
</head>
<body>
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


    <div class="search">
      <form action="#" method="POST">
        <input type="text" name="search">
			

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
<?php

if (!$item) {
  //if there is nothing in the search bar
  ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title> information page </title>
<style>
body{
margin: 0;
margin-left: 0px;
color: black;
font-family:Arial, Helvetica, sans-serif;
padding:0px;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}
.topd h1,h2{
font-size:25px;
padding:20px;
font-family: Helvetica Verdana ;
width: 100%;
font-weight:lighter;

}

.product img{
float: left;
width: 30%;
height: 30%;
border-color: white;
border:5px;
padding-left: 20px;
max-height:420px;
}

.product .price{
float: left;
padding-left: 30px;
}

.product .price h2{
font-size: 60px;
}


.po form button{
font-weight: bold;
text-decoration: none;
border-color:pink;
float: left;
font-size: 30px;
position: relative;
font-family:Arial, Helvetica, sans-serif;
background-color: lightcoral;
padding: 3px;
border: 3px;
border-color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
    width: 100%;

}
.po form button:hover{
background-color:white;
}


.product img {
    
    display: block;
    
    margin: 2px 10px 0 0; 
    float: left;
    width: 50%;
    box-sizing: border-box;
    padding-bottom: 20px;
    height:400px;
    object-fit: cover;
  }
</style>
</head>
<body>


<?php

//dont display warnings and notices
//error_reporting(0);


$server="localhost";
$username="root";
$password="";
$dbname="test2";

$dir= "images/";
//connect to mysql database
if($conn= mysqli_connect($server,$username,$password,$dbname)){
  //search for it in your database

  //to exclude any special characters from item to search for
  //$item=mysqli_real_escape_string($conn, $_POST['imageid']);
  $item=$_GET['imgid'];
  $iext=$_GET['imgext'];
}
 ?>


<div class="topd">
<h2> IMAGE ID : <?php echo $item; ?> </h2>
</div>

<div class="product">
<a href="#">
<?php
if ($iext==".png") {
        echo '<a href="#">
        <img src="'.$dir.$item.'.png" max-height="20px" max-width="33%  ">
        </a>
        ';

 }
      else{
      echo '<a href="#">
        <img src="'.$dir.$item.'.jpg" max-height="20px" max-width="33%  ">
        </a>
        ';

    }

?>

</a>
<div class="po">

<style>

.po a {
	
  font-size: 20px;
  border: none;
  cursor: pointer;
  border: none;
  background: lightcoral;
  color: white;
  padding:80px;
  margin-right:300px;
  margin-top:115px;
  
  font-family: Helvetica Verdana;
  backface-visibility: 90%;
  text-decoration: none;
	border-radius:5px;
	float:right;
	
  
}
</style>
<?php
if($iext==".jpeg")
{
	$iext=".jpg";
}
$piext="";
$piext.=$item;
$piext.=$iext;
if($iext='jpg')
{
	?>

<a href="images/<?php echo $piext;?>" download > DOWNLOAD </a> <br><br><br>
<?php
}
?>

</div>

</div> 
</div>
<?php }?>

</body>
</html>