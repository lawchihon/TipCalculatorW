<!DOCTYPE html>
<html>
<head>
	<title>Tip Calculator W</title>
</head>
<body>
	<b>Tip Calculator W</b>
	<?php 
		$bill = $_GET["bill"];
		$percentage = $_GET["percentage"];
		$custom = $_GET["custom"];
		$split = $_GET["split"];
		if (!$split) {
			$split = 1;
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
					echo "<input type=\"radio\" name=\"percentage\" value=0.$i required checked> $i%";
				}
				else {
					echo "<input type=\"radio\" name=\"percentage\" value=0.$i required> $i%";
				}
			}
			if ($percentage == "on") {
				echo "<input type=\"radio\" name=\"percentage\" required checked>";
			}
			else {
				echo "<input type=\"radio\" name=\"percentage\" required>";
			}
			echo "Other: <input type=\"text\" name=\"custom\" value=$custom>%";
		?>
		</p>
		<p>
		<?php
			echo "Split: <input type=\"text\" name=\"split\" value=$split required> persons";
		?>
		</p>
		<p><input type="submit"></p>
	</form>
	<?php
		if ($bill != "") {
			if ($percentage == "on") {
				$percentage = $custom / 100;
			}

			if (!is_numeric($bill) || $bill <= 0) {
				echo "<p>Invalid bill</p>";
			}
			else if ($percentage == "") {
				echo "<p>Missing percentage</p>";
			}
			else if (!is_numeric($percentage) || $percentage <= 0) {
				echo "<p>Invalid percentage</p>";
			}
			else if ($split == "") {
				echo "Missing split";
			}
			else if (!is_numeric($split) || $split <= 0) {
				echo "<p>Invalid persons</p>";
			}
			else {
				$tip = $bill * $percentage;
				$splitTip = $tip / $split;
				$total = $bill + $tip;
				$splitTotal = $total / $split;
				echo "<p>Tip: $$tip; Split Tip: $$splitTip</p>"; 
				echo "<p>Total: $$total; Split Total: $$splitTotal</p>";
			}
		}
	?>
</body>
</html>