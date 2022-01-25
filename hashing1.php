<!doctype html>

<html>
	<head>
		<title>hashing</title>
	</head>

		<body>


			<?php
			
				$pwd = 'password';
				$elhashing= password_hash($pwd, PASSWORD_DEFAULT);

                if(password_verify($pwd, $elhashing))
				{
					echo 'password is valid.';
				}	
				else
				{
					echo 'Invalid password.';
				}
		
			?>
		</body>
</html>