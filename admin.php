<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'IDE_Database');
define('DB_USER','root');
define('DB_PASSWORD','');
session_start();
echo "Hello ".$_SESSION["userName"]."<br>";

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) ;
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit1']))
{
        $username = mysqli_real_escape_string($con,$_POST['username']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);

        if($_POST['username'])
	{
		$sel_user = "insert into admin_login values ('$username','$pass','$email')";
		$result = mysqli_query($con,$sel_user);
                echo "added successfully";
        }
}

if(isset($_POST['submit2']))
{
        $username = mysqli_real_escape_string($con,$_POST['username']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);

        if($_POST['username'])
	{
		$sel_user = "insert into teacher_login values ('$username','$pass','$email')";
		$result = mysqli_query($con,$sel_user);
                echo "added successfully";
        }
}

?>




<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
    <br> 
    <label>Add new admin:</label>
    <br><br>

     <form method="POST" action = "">

        <label for="user">UserName:</label>
        <input type="text" id="username" style="width:450px" name = "username">
        <br>
 
        <label for="email">E-mail address:</label>
        <input type="text" id="email" style="width:450px" name = "email">
        <br>

        <label for="pwd">Password:</label>
        <input type="password" id="password" style="width:450px" name="password" >
        <br> 
        <button type="submit" name="submit1" style="background-color:#bdbdbd;">Add admin</button>       
      
    </form>

     <br><br>
     <label>Add new teacher:</label> 
     <form method="POST" action = "">

        <label for="user">UserName:</label>
        <input type="text" id="username" style="width:450px" name = "username">
        <br>
 
        <label for="email">E-mail address:</label>
        <input type="text" id="email" style="width:450px" name = "email">
        <br>

        <label for="pwd">Password:</label>
        <input type="password" id="password" style="width:450px" name="password" >
        <br> 
        <button type="submit" name="submit2" style="background-color:#bdbdbd;">Add teacher</button>       
      
    </form>
 
    <br>
    <a href="../login/login.php">Log Out</a>        


</body>
</html>
