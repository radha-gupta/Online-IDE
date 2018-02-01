<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'IDE_Database');
define('DB_USER','root');
define('DB_PASSWORD','');
session_start();
//$_SESSION['boolean'] = 1;

/*if( !empty($_SESSION['boolean']) )
{
	header('Location: dashboard.php');	
}
*/


$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) ;
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);
        $_SESSION["userName"]=$username;
	if($_POST['username'])
	{
		$sel_user = "select * from admin_login where username = '$username'";
		$result = mysqli_query($con,$sel_user);
		if(mysqli_num_rows($result)>0)
		{
		       $sel_user = "select password from admin_login where username = '$username'";
                       $result = mysqli_query($con,$sel_user);
                       while($row = mysqli_fetch_assoc($result)) {
                             if(!strcmp($row["password"],$pass))
                                  {
                                    header('Location: ../admin/admin.php');
                                  } 
                             else
                                  echo "wrong username or password";
                       } 		
		}
                else
                {
                 $sel_user = "select * from teacher_login where username = '$username'";
		 $result = mysqli_query($con,$sel_user);
		 if(mysqli_num_rows($result)>0)
		 {
		       $sel_user = "select password from teacher_login where username = '$username'";
                       $result = mysqli_query($con,$sel_user);
                       while($row = mysqli_fetch_assoc($result)) {
                             if(!strcmp($row["password"],$pass))
                                  header('Location: ../teacher/teacher.php');
                             else
                                  echo "wrong username or password";
                       } 		
		 }
                else
                 {

                     $sel_user = "select * from user_login where username = '$username'";
		     $result = mysqli_query($con,$sel_user);
		     if(mysqli_num_rows($result)>0)
		     {
		       $sel_user = "select password from user_login where username = '$username'";
                       $result = mysqli_query($con,$sel_user);
                       while($row = mysqli_fetch_assoc($result)) {
                             if(!strcmp($row["password"],$pass))
                                  header('Location: ../user/user.php');
                             else
                                  echo "wrong username or password";
                       } 		
		      } 
                      else
                         echo "wrong username and password";                                           
	          }
                }
         }
	else
	{
		echo'enter username';
	}
}

?>

<html lang="en">
<head>
  <title>Online IDE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    
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
        <button type="submit" name="submit" style="background-color:#bdbdbd;">Sign Up</button>       
      
    </form>
 



</body>
</html>
