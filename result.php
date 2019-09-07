<!DOCTYPE html> 
<html> 
	<head> 
		<title>Result page</title> 
		
<style type="text/css">
.results {margin-left:12%; margin-right:12%; margin-top:10px;}
</style>
	</head> 
	
	
<body bgcolor="#F5DEB3"> 

<form action="result.php" method="get"> 
		
		<span><b>Write your Keyword:</b></span>
		
		<input type="text" name="user_query" size="120"/> 
		<input type="submit" name="search" value="Search Now">
</form>
	
	<a href="search.html"><button>Go Back</button></a>
	
<?php 
$con=mysqli_connect("localhost","root","yadav@1153","search");
	//mysql_select_db("search");
	
	if(isset($_GET['search'])){
	
	$get_value = $_GET['user_query'];
	
	if($get_value==''){
	
	echo "<center><b>Please go back, and write something in the search box!</b></center>";
	exit();
	}
	
	$result_query = "select * from sites where site_keywords like '%$get_value%'";
	
	$run_result=$con->query($result_query);
	
	if(mysqli_num_rows($run_result)<1){
	
	echo "<center><b>Oops! sorry, nothing was found in the database!</b></center>";
	exit();
	
	}
	
	while($row_result=mysqli_fetch_array($run_result)){
		
		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		$site_image=$row_result['site_image'];
	
	echo "<div class='results'>
		
		<h2>$site_title</h2>
		<a href='$site_link' target='_blank'>$site_link</a>
		<p align='justify'>$site_desc</p> 
		<img src='images/$site_image' width='100' height='100' />
		
		</div>";

		}
}


?>


</body> 
</html>