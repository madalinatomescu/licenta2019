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
			<th><h3>Județ</h3></th>
			<th><h3>2015</h3></th>
			<th><h3>2016</h3></th>
			<th><h3>2017</h3></th>
			<th><h3>2018</h3></th>
		  </tr>
		  
		  <!--<tr>
			<td>-->
				<?php
								
					// Create connection
					$conn = mysqli_connect("localhost", "root", "", "licenta_db");
					if (isset($_GET['link']))
						$numeJUD=$_GET['link'];

					$sql = "SELECT nume_judet,an,medie FROM medie_judet_scoli";
					$result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($result)!= 0){
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							$jud=$row["nume_judet"];
							echo "<tr>";
							echo "<td>"."<a href='paginaScoali.php?link=$jud'>".$row["nume_judet"]."<br>"."</a>"."</td>";
							echo "<td>".$row["medie"]."<br>"."</td>";
							echo "</tr>";
						}
					} else 
						echo "0 results";

					mysqli_close($conn);
				?>
			
			<!--</td>
		  </tr>-->
		</table>
		</div>
	</body>
</html>