<?php
	define("TITLE", " Register - Credit Card Online - Some Bank");//title
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

<style>#footer{ margin-top : 10px;}</style>

<div id = "signUpContent" id = "logInBody"><!--content-->
	<form id = "registerForm" method = "post" action = "RegisterForm.php">
		<p id = "firstBox" class = "otherBoxesP">
			<input class = "otherBoxes" type = "text" placeholder = "First Name" name = "firstName" required/>
			<input class = "otherBoxes" type = "text" placeholder = "Last Name" name = "lastName" required/>
		</p>
		<p class = "otherBoxesP">
			<input class = "singleBoxes" type = "text" placeholder = "Account Number" name = "accountNumber" required/>
		</p>
		<p class = "otherBoxesP">	
			<input class = "otherBoxes" type = "email" placeholder = "Email" name = "email" required/>
			<input class = "otherBoxes" type = "tel" placeholder = "Phone" name = "phone" required/>
		</p>
		<p class = "otherBoxesP">
			<input class = "singleBoxes" type = "password" placeholder = "Password" name = "password" required/>
		</p>
		<p id = "lastBox" class = "otherBoxesP">
			<input class = "singleBoxes" type = "password" placeholder = "Confirm Password" name = "confirmPassword" required/>
		</p>
		<p id = "lastBox" class = "otherBoxesP">
			<input class = "singleBoxes" type = "text" placeholder = "Security Question" name = "securityQuestion" required/>
		</p>
		<p id = "lastBox" class = "otherBoxesP">
			<input class = "singleBoxes" type = "password" placeholder = "Answer" name = "securityAnswer" required/>
		</p>
		<p id = "signUpButtonP">
			<input type = "submit" id = "signUpButton" value = "Sign Up" />
		</p>
		<p id = "signUpCaption">
			If you already have an account, Please <a href = "LogIn.php"><strong><em>Log In</em></strong></a>
		</p>
	</form>
</div>


<?php
	include('../Footer.php');//footer
?>
