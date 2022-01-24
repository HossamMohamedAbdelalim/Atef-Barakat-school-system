
<?php  
include "MY DB.php";

if (isset($_POST['login'])
{
	$username = $_POST["username"];
	$password=$_POST["Password"];
	$result=mysqli_query($conn, "SELECT *FROM tb_users WHERE username='$username' OR email='$email'");
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0 ){
		if($password=$row["Password"])
		{
			$_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            header("Location: "".php");

		}
		else
		{
		
		}


}	


<!DOCTYPE html>
<html>
    <head> 
        <link href="p2.css"rel="stylesheet" type="text/css">
        <div0 class="big"> 
        <div0 class="head">
            <h1>Login</h1>
        </div0>
    </head>
    <body>
        <div1 class="first">
            <h4> Username</h4>  
            <input type="text" name="Username"required>
        </div1>  

        <div2 class="second">
            <h4> Password</h4>  <?php
			
				$pwd = '$password';
				$hashing= password_hash($pwd, PASSWORD_DEFAULT);
                if(password_verify($pwd, $hashing))
				{
					echo 'password is valid.';
				}	
				else
				{
					echo 'Invalid password.';
				}
            <input type="text" name="Password"required>
        </div2>
        
    </div0>

    <div4 class="text">
        <h3>Login</h3>
        <input type="login">
    </div4>
    </body>
		<a href="registeration.php"></a>
    </html>
