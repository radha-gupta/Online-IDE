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
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image:    url(codecode.jpg);
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;              /* optional, center the image */
}
form {
    border: 3px solid #f1f1f1;
    background-color: rgba(255, 255, 255, 0.5);
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    height: 200;
    width: 200;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
 
<form method="POST" action="/action_page.php">
  <div class="imgcontainer">
    <img src="student.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="email"><b>E-mail address</b></label>
    <input type="text" id="email" placeholder="Enter E-mail address" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Sign-up</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="loginbtn">Have an account? Log in</button>
  </div>
</form>

</body>
</html>
