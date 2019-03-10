<style type="text/css">

	
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
<?php

//dont display warnings and notices
error_reporting(0);

if(!isset($_POST['search'])){
	header("index1.php");
}
$server="localhost";
$username="root";
$password="";
$dbname="test2";


//connect to mysql database
if($conn= mysqli_connect($server,$username,$password,$dbname)){

	//search for it in your database

	//to exclude any special characters from item to search for
	$item=mysqli_real_escape_string($conn, $_POST['search']);
	

	//query to insertinto table
	//INSERT INTO `searchtab`(`img_id`, `category`, `name1`, `name2`, `name3`, `imgext`) VALUES ("f2","festival","bharatnatyam","india","tradition",".jpeg")
	//INSERT INTO `infotab`(`img_id`, `category`, `img_price`, `date_added`) VALUES ([value-1],[value-2],[value-3],[value-4])


	if ($item != "") {
	
	//the sql query
	$sqlquery="SELECT img_id, imgext from searchtab where img_id like '%".$item."%' OR  category like '%".$item."%' OR 	name1 like '".$item."' OR name2 like '".$item."' OR name3 like '".$item."';";

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
		<h1> search results for <?php echo $item;?></h1>
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
}
?>

