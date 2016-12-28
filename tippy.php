<!DOCTYPE html>
<html>
<head>
	<title>Tip Calculator W</title>
</head>
<body>
	<b>Tip Calculator W</b>
	<?php 
		try {
			$bill = $_GET["bill"];
			$percentage = $_GET["percentage"];
		}
		catch (Exception $e) {
			$bill = "";
			$percentage = "";
		}
 	?>
	<form action="tippy.php">
		<p>Bill subtotal: $
		<?php
			echo "<input type=\"text\" id=\"bill\" name=\"bill\" required=\"required\" value=$bill>";
		?>
		</p>
		<p>Tip percentage: </p>
		<p>
		<?php
			for($i = 10; $i <= 20; $i += 5) {
				$value = $percentage * 100;
				if ($i == $value) {
					echo "<input type=\"radio\" name=\"percentage\" value=0.$i checked> $i%";
				}
				else {
					echo "<input type=\"radio\" name=\"percentage\" value=0.$i> $i%";
				}
			}
		?> </p>
	  <p><input type="submit"></p>
	</form>
	<?php
		if ($bill != "") {
			if ($bill <= 0) {
				echo "<p>Incorrect bill amount</p>";
			}
			else if ($percentage <= 0) {
				echo "<p>Incorrect percentage rate</p>";
			}
			else {
				$tip = $bill * $percentage;
				$total = $bill + $tip;
				echo "<p>Tip: $$tip</p>"; 
				echo "<p>Total: $$total</p>";
			}
		}
	?>
</body>
</html>