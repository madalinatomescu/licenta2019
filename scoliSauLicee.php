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
				echo "Judetul ".$_GET['link'];
			} 
			?></h2></th>
		  </tr>
		  
		  <tr>
			<td>
			<?php
			if (isset($_GET['link']))
			{
				$jud=$_GET['link'];
			} 
			
			echo "<h4><a href='statGenScoli.php?link=$jud'>Scoli generale </a></h4>";
			echo "<h4><a href='statGenLicee.php?link=$jud'>Licee </a></h4>"
			?>
			</td>
		  </tr>
		</table>
		</div>
		
	</body>
</html>