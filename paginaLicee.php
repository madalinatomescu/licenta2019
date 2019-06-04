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
		
		<div class="tabelLiceu"><table style="width:100%">
		
		  <tr>
			<th><h2>
			<?php
			if (isset($_GET['link']))
			{
				echo "Licee judetul ".$_GET['link'];
			}
			?></h2></th>
		  </tr>
		  
		  <tr>
			<td>
<?php
$conn = mysqli_connect("localhost", "root", "", "licenta_db");
if (isset($_GET['link']))
	$numeJUD=$_GET['link'];

$sql = "SELECT nume_liceu FROM licee WHERE nume_judet='$numeJUD'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)!= 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$num_scoala=$row["nume_liceu"];
        echo"<a href='paginaStatisticaLiceu.php?link=$num_scoala'>".$row["nume_liceu"]."<br>"."</a>";
    }
} else 
    echo "0 results";

mysqli_close($conn);
?>
			</td>
		  </tr>
		</table>
		</div>
	</body>
</html>