<!DOCTYPE html>
<html>
<head>
	<title>pictography:category_name</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="ps1.css">
	<style type="text/css">
  <style type="text/css">
    * {box-sizing: border-box;}
body{
  margin: 0;
  background-color: white;
  color: black;

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
		
	display: block;
		
    margin: 2px 10px 0 0; 
    float: left;
    width: 32.5%;
    box-sizing: border-box;
    padding-bottom: 20px;
    padding-left:10px; 
    height:300px;
    object-fit: cover;
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
			<form action="">
     		<input type="text" placeholder="Search.." name="search">
      		<button type="submit">SEARCH</button>
    		</form>
    		<
	
		</div>
		<div class="log">
			<a href="#">LOGIN</a>
		</div>
		
	</div>
	<?php
    //include the page in website
    include 'information1.php';?>
  ?>

	<?php

//dont display warnings and notices
//error_reporting(0);
header("index1.php");

$server="localhost";
$username="root";
$password="";
$dbname="test2";

$dir= "images/";
//connect to mysql database
if($conn= mysqli_connect($server,$username,$password,$dbname)){
  //search for it in your database

  //to exclude any special characters from item to search for
 $item=mysqli_real_escape_string($conn,$_GET['cat']); 
 $search=mysqli_real_escape_string($conn,$_GET['search']);
 if ($search != "") {
	$item1=$search;
	//the sql query
	$sqlquery="SELECT img_id, imgext from searchtab where img_id like '%".$item1."%' OR  category like '%".$item1."%' OR 	name1 like '".$item1."' OR name2 like '".$item1."' OR name3 like '".$item1."';";

	//store result in rs variable
	$rs = mysqli_query($conn,$sqlquery);
	$dir= "images/";

	//check if there are results in rs
	if($rs){
		// if there are items found
		header("index1.php");
					?>
<div class="imgforsale">
 	<div class="cname" style="color: lightcoral; float: none; padding-left : 10px "> <br>
		<h1> search results for <?php echo $item1;?></h1>
		<ul> 
	</div>
</div>

 <?php
	
		echo '<div class="srh">';
		while($rows= mysqli_fetch_assoc($rs))
		
		{

			echo '<div class="srhpp">';
			$iid=$rows['img_id'];
			$iext=$rows['imgext'];
			$sqlquery1="SELECT img_price  from infotab where img_id like '%".$iid."%';";
			$rs1 = mysqli_query($conn,$sqlquery1);
			$rows1= mysqli_fetch_assoc($rs1);
			$iprice=$rows1['img_price'];
			if ($iext==".png") {
				?><a href="index1.php?imgid=<?php echo $iid;?>&imgprice=<?php echo $iprice;?>&imgext=<?php echo $iext;?>" class="pictures" > <img src="<?php echo $dir.$iid;?>.png" max-height="20px" max-width="33%"></a>

			<?php
		}
			else{
			?>
				<a href="index1.php?imgid=<?php echo $iid;?>&imgprice=<?php echo $iprice;?>&imgext=<?php echo $iext;?>" class="pictures" > <img src="<?php echo $dir.$iid;?>.jpg" max-height="20px" max-width="33%"></a>
			<?php

		}
		
		}
		echo '</div>';


	} 
	else{
		echo "NO RESULTS found";
 	}
}
 ?>
<div class="imgforsale">
 	<div class="cname" style="color: lightcoral;"> <br>
		<h1><?php echo $item;?></h1>
		<ul>
	</div>


 <?php

 if ($item!="") {
	
	//the sql query
	$sqlquery="SELECT img_id, imgext from searchtab where img_id like '%".$item."%' OR  category like '%".$item."%' OR 	name1 like '".$item."' OR name2 like '".$item."' OR name3 like '".$item."';";

	//store result in rs variable
	$rs = mysqli_query($conn,$sqlquery);
	$dir= "images/";

	//check if there are results in rs
	if($rs){
		// if there are items found
		header("index1.php");
	
		echo '<div class="srh">';
		while($rows= mysqli_fetch_assoc($rs))
		
		{
			echo '<div class="srhpp">';
			$iid=$rows['img_id'];
			$iext=$rows['imgext'];
			if ($iext==".png") {
				?><a href="index1.php?imgid=<?php echo $iid;?>&imgprice=<?php echo $iprice;?>&imgext=<?php echo $iext;?>" class="pictures" > <img src="<?php echo $dir.$iid;?>.png" max-height="20px" max-width="33%"></a>

			<?php
		}
			else{
			?>
				<a href="index1.php?imgid=<?php echo $iid;?>&imgprice=<?php echo $iprice;?>&imgext=<?php echo $iext;?>" class="pictures" ><img src="<?php echo $dir.$iid;?>.jpg" max-height="20px" max-width="33%"></a>
			<?php

		}
		
		}
		echo '</div>';


	} 
	else{
		echo "NO RESULTS found";
 	}

}


 
}
 ?>
 </ul>   
  </div>  
</body>
</html>