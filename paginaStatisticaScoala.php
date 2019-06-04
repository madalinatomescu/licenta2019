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
	
	<!--script pt column chart-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
	<?php
		$conn = mysqli_connect("localhost", "root", "", "licenta_db");
		if (isset($_GET['link']))
					$numeSC=$_GET['link'];

		$sql1 = "SELECT note_10_romana, note_10_mate FROM tabel_ani_scoli WHERE nume_scoala='$numeSC' AND an='2015'";
		$result1 = mysqli_query($conn, $sql1);

	?>
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Materie", "Numar note", { role: "style" } ],
		<?php
		if(mysqli_num_rows($result1)!= 0){
					while($row = mysqli_fetch_assoc($result1)) {
					echo "["."'Romana'".",".$row["note_10_romana"].","."'red'"."],";
					echo "["."'Matematica'".",".$row["note_10_mate"].","."'blue'"."]";
					}
		}
		else 
			echo "0 results";

		?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Situtatia notelor de 10",
        width: 350,
        height: 200,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  
  
  <!--pie chart-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var dataRomana = google.visualization.arrayToDataTable([
          ['Note', 'Procentaj'],
         <?php
			 
			$sql2 = "SELECT note_peste_5_romana, note_sub_5_romana FROM tabel_ani_scoli WHERE nume_scoala='$numeSC' AND an='2015'";
			$result2 = mysqli_query($conn, $sql2);
			if(mysqli_num_rows($result2)!= 0){
						while($row = mysqli_fetch_assoc($result2)) {
						echo "["."'Note peste 5'".",".$row["note_peste_5_romana"]."],";
						echo "["."'Note sub 5'".",".$row["note_sub_5_romana"]."]";
						}
			}
			else 
				echo "0 results";

		?>
        ]);
		
		 var dataMate = google.visualization.arrayToDataTable([
          ['Note', 'Procentaj'],
         <?php
			 
			$sql3 = "SELECT note_peste_5_mate, note_sub_5_mate FROM tabel_ani_scoli WHERE nume_scoala='$numeSC' AND an='2015'";
			$result3 = mysqli_query($conn, $sql3);
			if(mysqli_num_rows($result3)!= 0){
						while($row = mysqli_fetch_assoc($result3)) {
						echo "["."'Note peste 5'".",".$row["note_peste_5_mate"]."],";
						echo "["."'Note sub 5'".",".$row["note_sub_5_mate"]."]";
						}
			}
			else 
				echo "0 results";

		?>
        ]);

        var optionsRomana = {
          title: 'Situatia notelor Limba Romana',
		  width: 350,
		  height: 200,
        };

		var optionsMate = {
          title: 'Situatia notelor Matematica',
		  width: 350,
		  height: 200,
        };

        var chartRomana = new google.visualization.PieChart(document.getElementById('piechartRomana'));

        chartRomana.draw(dataRomana, optionsRomana);
		
		var chartMate = new google.visualization.PieChart(document.getElementById('piechartMate'));

        chartMate.draw(dataMate, optionsMate);

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
			<h1>
				<?php
				if (isset($_GET['link']))
				{
					echo $_GET['link'];
				}
				?>
			</h1>
		</header>
		
		
		<!--pt coloane-->

		<section>

			<nav>
				<ul>
					<li>2015</li>
					<br>
					<li>2016</li>
					<br>
					<li>2017</li>
					<br>
					<li>2018</li>
					<br>
				</ul>
			</nav>
			<article>
			
			  <div class="divScoali">
				
				
				<?php
					//$conn = mysqli_connect("localhost", "root", "", "licenta_db");

					/*if (isset($_GET['link']))
						$numeSC=$_GET['link'];*/

					$sql = "SELECT medie_scoala, romana_max, mate_max,admitere_max, absolvire_max,romana_min,mate_min,admitere_min,absolvire_min  FROM tabel_ani_scoli WHERE nume_scoala='$numeSC' AND an=2015";
					$result = mysqli_query($conn, $sql);


					if(mysqli_num_rows($result)!= 0){
						while($row = mysqli_fetch_assoc($result)) {
							
							echo "<table style='width:100%'>";
							echo "<tr>";
							echo "<th>"."Media scolii"."</th>";
							echo "<th>"."Cele mai mari note"."</th>";
							echo "<th>"."Cele mai mici note"."</th>";
							//echo "<h3>Cele mai mari note</h3>";
							echo "</tr>";
							echo "<tr>";
							echo "<td style='text-align: center'>";
							echo $row["medie_scoala"];
							echo "</td>";
							echo "<td style='text-align: center'>";
							echo "Limba Romana = ".$row["romana_max"]."<br>";
							echo "Matematica = ".$row["mate_max"]."<br>";
							echo "Medie Absolvire = ".$row["absolvire_max"]."<br>";
							echo "Medie Admitere = ".$row["admitere_max"]."<br>";
							echo "</td>";
							echo "<td style='text-align: center'>";
							//echo "<h3>Cele mai mici note</h3>";
							echo "Limba Romana = ".$row["romana_min"]."<br>";
							echo "Matematica = ".$row["mate_min"]."<br>";
							echo "Medie Absolvire = ".$row["absolvire_min"]."<br>";
							echo "Medie Admitere = ".$row["admitere_min"]."<br>";
							echo "</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>";
							echo "<div id='columnchart_values' style='width: 350px; height: 100px;'>"."</div>";
							echo "</td>";
							echo "<td>";
							echo "<div id='piechartRomana' style='width: 500px; height: 200px;'>"."</div>";
							echo "</td>";
							echo "<td>";
							echo "<div id='piechartMate' style='width: 500px; height: 200px;'>"."</div>";
							echo "</td>";
							echo "</tr>";
							echo "</table>";
							
						}
						
					}else 
						echo "0 results";
					mysqli_close($conn);
				?>
				</div>
				
				<!--<div id="columnchart_values" style="width: 350px; height: 100px;"></div>
				
				<div id="piechartRomana" style="width: 500px; height: 200px;"></div>
				
				<div id="piechartMate" style="width: 500px; height: 200px;"></div>-->
				
			</article>
		  </section>
		  
		  <!--<div class="divScoali">
			<h1>2016</h1>
			<p>Some text..</p>
		  </div>
		</div>

		<div class="row">
		  <div class="divScoali">
			<h1>2017</h1>
			<p>Some text..</p>
		  </div>
		  <div class="divScoali">
			<h1>2018</h1>
			<p>Some text..</p>
		  </div>
		</div>-->

	</body>
</html>