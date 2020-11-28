<?php
include_once('../includes\config.php');
session_start();
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
if($username=="" || $email=="" || $password=="")
{
?>
  <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> Please fill the details
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php
}
else{
$query=mysqli_query($con,"insert into register(username,email,password) values('$username','$email','$password')");
if($query)
{
?>

    <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> Your registered successfully.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
 <?php
}
else
{
?>
  <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> A problem has been occurred while submitting your data.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php
}
}
}
if(isset($_POST['login']))
{

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from register where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
           header('Location: admin.php');
        }
        else{
            ?>
              <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> Invalid Email or Password
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lion Survey | Admin</title>
	 <!-- add icon link -->
<link rel="icon" type="image/x-icon" href="../lion.svg">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

<!---Register as a new user-->
<form name="submit" method="post" onSubmit="return valid();">
	<h1>Sign Up</h1>
	<input type="text" name="username" placeholder="Name">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button name="submit">SignUp</button>
</form>
</div>

<!---Login as a user -->
<div class="form-container sign-in-container">
	<form  name ="login" method="post" onSubmit="return valid();">
		<h1>Sign In</h1>
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password"> 
	<a href="#">Forgot Your Password</a>

	<button name="login">Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello, Friend!</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

 <script type="text/javascript">  
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) return true;  
            return false;  
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }  
    </script>  


</body>
</html>