<?php

if(isset($_POST['submit'])
{
$option = $_POST['takeOption'];  
echo "You have selected :" .$option;  
}


$conn = mysqli_connect("localhost", "root", "", "licenta_db");

$sql = "SELECT nume_scoala FROM scoli_temp WHERE nume_judet='$option'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)!= 0){
	while($row = mysqli_fetch_assoc($result)) {
		echo "<div>"."<input type='checkbox'>".$row["nume_scoala"]."<br>"."</input>"."</div>";
							
	}
						
}else 
	echo "0 results";
mysqli_close($conn);

?>