<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Alege cu cap!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/interfata.css" />
	</head>
	
	<body>
		<header id="header">
			<!--<h1>Bine ati venit!</h1>-->
			<ul>
				<li><a href="indexLicenta.html">Acasa</a></li>
				<li><a href="scoli.php">Lista scoli generale</a></li>
				<li><a href="licee.php">Lista licee</a></li>
				<li><a href="general.php">Statistici generale</a></li>
				<li><a href="compara.php">Compara</a></li>
			</ul>	
		</header>
		
<div class="tabelJudete"><table style="width:100%">
		
		  <tr>
			<th><h2>
			<?php
			if (isset($_GET['link']))
			{
				echo " Top 10 licee judetul ".$_GET['link'];
				
			} 
			?></h2></th>
		  </tr>
		  
		  <tr>
			<td>
				<?php
				$conn = mysqli_connect("localhost", "root", "", "licenta_db");
				if (isset($_GET['link']))
				{
					$jud=$_GET['link'];
				
				} 

				$sql = "SELECT nume_liceu,medie_liceu FROM tabel_ani_licee WHERE nume_judet='$jud' ORDER BY medie_liceu DESC";
				$result = mysqli_query($conn, $sql);
				$cnt=1;

				if(mysqli_num_rows($result)!= 0){
					while($row = mysqli_fetch_assoc($result)) {
						if($cnt<=10)
						{
							echo "<h4>".$cnt.". ".$row["nume_liceu"]."</h4>"."Media: ".$row["medie_liceu"]."<br>";
							$cnt+=1;
						}
						else break;
												
					}
					
				}else 
					echo "0 results";
				mysqli_close($conn);
			?>
			</td>
		  </tr>
		</table>
		</div>
		
	</body>
</html>