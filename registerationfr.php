<?php
require 'MY DB.php';
if(isset($_POST["submit"]))
{
	$fullname==$_POST["fullname"];
	$username = $_POST["username"];
	$email=$_POST["email"];
	$birthdate=$_POST["birthdate"]
	$password=$_POST["Password"];
	$duplicate=mysqli_query($conn, "SELECT *FROM tb_users WHERE username='$username' OR email='$email'");
		if(mysqli_num_rows($dublicate) > 0 ){
			echo "<Script>alert('username or email  has already taken'); </script>";
		}
		else
		{
			$pass=password_hash($password,PASSWORD_DEFAULT);
			$query= "INSERT INTO tb_users VALUES('','$name','$username','$email',$birthdate,'$pass')";
			mysqli_query($conn,query);
			echo "<Script>alert('registeration success'); </script>";
		}
		

}
?>



<!DOCTYPE html>
<html>
    <head> 
        <link href="p1.css"rel="stylesheet" type="text/css">
    </head>
    <body>
        <div0 class="first">
            <h1>Register</h1>
        </div0>
        <div1 class="name">
            <h5> Full Name:*</h5>  
            <input type="text" name="Full Name"required>
        </div1>

        <div2 class="user">
            <h5> Username:*</h5>  
            <input type="text" name="Username"required>
        </div2>

        <div3 class="pass">
            <h5> Password:*</h5>  
            <input type="text" name="Password"required>
        </div3>

        <div4 class="birth">
            <form action="/action_page.php">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday">
                <input type="submit">
              </form>
        </div4>

        <div5 class="email">
            <h5> E-mail:*</h5>  
            <input type="text" name="E-mail"required>
        </div5>

        <SELECT class="list">
            <option value='teacher'>Teacher</option>
            <option value='super teacher'>Super Teacher </option>
            <option value='student'>Student </option>
            <option value='parent'>Parent </option>
            <option value='accountant' selected>Accountant  </option>
            <option value='librarian'>Librarian</option>
       
        </body>
		<input type="submit">
		<br>
		<a href="login.php"></a>
</html>