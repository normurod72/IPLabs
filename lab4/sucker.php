<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php
			
			if(isset($_POST['submit'])){

				if($_POST['NameOfperson']!='' AND $_POST['credit_card_number']!='' AND isset($_POST['Country'])){

		?>

					<h1>Thanks, sucker!</h1>

					<p>
						Your information has been recorded.
					</p>

					<?php
					file_put_contents("sucker.txt", $_POST['NameOfperson'].";".$_POST['Country'].";".$_POST['credit_card_number'].";".$_POST['credit_card_type']."\n",FILE_APPEND);

					echo "<dt>Name</dt>";
						
					echo "<dd>".$_POST['NameOfperson']."</dd>";
						
					echo "<dt>Section</dt>";
						
					echo "<dd>".$_POST['Country']."</dd>";
						
					echo "<dt>Credit Card</dt>";
						
					echo "<dd>".$_POST['credit_card_number']."</dd>";
					
					echo "<pre>".file_get_contents("sucker.txt")."</pre>";

				}else{

					?>
						<h1>Sorry!</h1>
						<p>You didn't fill out the form <a href="buyagrade.html">Try again?</a></p>
					<?php

				}

			}else{
				
				echo "<h3>404 - Page does not exist! <b>:)</b></h3>";
			
			}

		?>
		
	</body>
</html>