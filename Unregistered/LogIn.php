<?php
	session_start();//session starts, to set sessions or get sessions
	//if session for firstName, accountNumber, email is set...
	if(isset($_SESSION["firstName"]) || isset($_SESSION["accountNumber"]) || isset($_SESSION["email"])){
		//unset, destroy, redirect to the log in page using header function 
		session_unset();
		session_destroy();
		header('Location: LogIn.php');
	}
?>

<style>#footer{ margin-top : 110px;}</style>

<?php
	include('../CSS/LogInStyle.php');//style sheet
	define("TITLE", " Log In - Credit Card Online - Some Bank");//title
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

<div id = "logInBody" class = "logIn"><!--content-->
	<form method = "post" action = "LogInForm.php">
		<p class = "logInPage"><input type = "email" class = "logInForm" placeholder = "Email" Name = "email"  onclick = "clearMessage()" required/></p>
		<p class = "logInPage"><input type = "password" class = "logInForm" placeholder = "Password" Name = "password" onclick = "clearMessage()" required/></p>
		<p class = "logInPage" id = "logInButtonPage"><input type = "submit" id = "logInButton" value = "Sign In" /></p>
	</form>
	<p class = "logInPage"><a class = "logInLinks" href = "AccountAccess.php">Forgot Password?</a></p>
	<p class = "logInPage" id = "logInOR">or</p>
	<p class = "logInPage"><a class = "logInLinks" href = "Register.php">Set Up An Account</a></p>
</div>

<?php	
	include('../Footer.php');//footer
?>