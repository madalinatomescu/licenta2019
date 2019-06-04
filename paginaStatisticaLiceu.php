
<!DOCTYPE HTML>
<html>
	<head>
	<title>Alege cu cap!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/interfata.css" />
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

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
		<h1>
			<?php
			if (isset($_GET['link']))
			{
				echo $_GET['link'];
			}
			?>
		</h1>
		
		<h2>Bacalaureat 2018</h2>
		<?php
				$conn = mysqli_connect("localhost", "root", "", "licenta_db");

				if (isset($_GET['link']))
					$numeLiceu=$_GET['link'];

				$sql = "SELECT medie_liceu,total_elevi, total_absenti, total_prezenti, total_promovati, total_respinsi FROM tabel_ani_licee WHERE nume_liceu='$numeLiceu'";
				$result = mysqli_query($conn, $sql);


				if(mysqli_num_rows($result)!= 0){
					while($row = mysqli_fetch_assoc($result)) {
						echo "Medie liceu: ".$row["medie_liceu"]."<br>";
						echo "Elevi inscrisi = ".$row["total_elevi"]."<br>";
						echo "Elevi presenti = ".$row["total_prezenti"]."<br>";
						echo "Elevi absenti = ".$row["total_absenti"]."<br>";
						echo "Elevi promovati = ".$row["total_promovati"]."<br>";
						echo "Elevi respinsi = ".$row["total_respinsi"]."<br>";
						
						
					}
					
				}else 
					echo "0 results";
				mysqli_close($conn);
			?>
		<div id="piechart" style="width: 900px; height: 500px;"></div>
	</body>
</html>