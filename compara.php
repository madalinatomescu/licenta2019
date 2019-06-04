	<?php
		$conn = mysqli_connect("localhost", "root", "", "licenta_db");
		
		$sql1 = "SELECT numeJudet FROM judete";
		$result1 = mysqli_query($conn, $sql1);
	?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Alege cu cap!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- sa arate bine pe toate deviceurile si la tpate rezolutiile-->
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
		<h4>Alege judetul</h4>
		
		<div>
		<form method = "post" action = "">
		  <select name="takeOption">
		  <?php
			$val=1;
			if(mysqli_num_rows($result1)!= 0){
				
				while($row = mysqli_fetch_assoc($result1)) {
					
					echo "<option >".$row["numeJudet"]."</option>";
					$val+=1;
					}
			}
			else 
				echo "0 results";
		  ?>
			
		  </select>
		   <input type="submit" value="Mai departe"/>
		<!--  <h4>Sorteaza dupa:</h4>
		  <select name="takeOption">
		  
			<option value='bac'>Medie bacalaureat</option>
			<option value='admitere'>Medie admitere</option>
			
		  </select>-->
		 
		 
		  <?php
				
				$option = $_POST['takeOption'];  
				echo "You have selected :" .$option;  


				$conn = mysqli_connect("localhost", "root", "", "licenta_db");

				$sql = "SELECT nume_scoala FROM scoli_temp WHERE nume_judet='$option'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)!= 0){
					while($row = mysqli_fetch_assoc($result)) {
						$nume=$row["nume_scoala"];
						echo "<div>"."<input type='checkbox' name='licee[]' id='liceu' value='$nume'>".$row["nume_scoala"]."<br>"."</input>"."</div>";
											
					}
										
				}else 
					echo "0 results";
				mysqli_close($conn);
				echo "<input type='submit' value='submit'>";

			?>
			    

			<?php
				$numeLiceu= $_POST['licee'];
				if(empty($numeLiceu)){
					echo "Nu ai ales nici un liceu";
				}
				else {
					$N = count($numeLiceu);
					echo("You selected $N door(s): ");
					for($i=0; $i < $N; $i++){
						echo "<div>".$numeLiceu["$i"]."<br>"."</div>";
					}

				}


			?>

</form>
		</div>
		
		
	</body>
</html>