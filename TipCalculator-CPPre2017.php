<?php
	$predefinedPercentages = array(0.1, 0.15, 0.2);
	$tipPercentage = (float)$_POST['percentage'];
	$subtotal = (float)$_POST['subtotal'];
	$tipAmount = $tipPercentage * $subtotal;
	$totalAmount = $tipAmount + $subtotal;
	$posted = isset($_POST['subtotal']) && isset($_POST['percentage']);

	$error = false;
	if (isset($_POST['subtotal']) && $subtotal <= 0)
	{
		$error = true;
	}
	if (!$posted) {
		$subtotal = 50;
		$tipPercentage = 0.1;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tip Calculator</title>
	<style type="text/css">

		body {
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
		}

		h3 {
			text-align: center;
		}

		.main {
			border-style: solid;
    		border-width: medium;
    		width: 300px;
    		margin: 20px;
    		padding: 10px;
		}

		.error {
			color: brown;
			font-weight: bold;
		}

		.error input {
			border-color: brown;
			border-width: 1px;
			color: brown;
		}
		
		.result {
			border-style: solid;
    		border-width: 1px;
    		border-color: blue;
    		margin: 10px;
    		padding: 10px;
		}

	</style>
</head>

<body>
	<div class="main">
		<h3>Tip Calculator</h3>
		<form method="post">
			<p <?php if ($error):?> class="error" <?php endif; ?> >
  				Bill Subtotal: $
  				<input type="text" name="subtotal" value="<?php echo $subtotal; ?>">
  			</p>
	
  			<p>Tip Percentage: </p>
  			
  			<p>
  				<?php
				foreach ($predefinedPercentages as $percentage):
					$checked = "";
					if($percentage === $tipPercentage)
					{
						$checked = "checked";
					}
				?>
					<input type="radio" name="percentage" value="<?php echo $percentage; ?>" <?php echo $checked; ?> > <?php echo $percentage*100; ?>%
  				<?php endforeach; ?>  	   
  			</p>
	
  			<input type="submit" value="Submit">
	
		</form>
		
	
		<?php if($posted && !$error): ?>
			<div class="result">
				<p>Tip: $<?php echo $tipAmount; ?></p>
				<p>Total: $<?php echo $totalAmount; ?></p>
			</div>
		<?php endif; ?>
	</div>
	
</body>
</html> 
