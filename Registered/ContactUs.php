<?php

	define("TITLE", "Conatct Us - Credit Card Online - Some Bank");//title
	include('../LogOut.php');//log out button
	include('../CSS/ContactUsStyle.php');//style sheet with .php extension
	include('../Header.php');
	include('../Nav.php');
	
?>

<style>#footer{ margin-top : 100px;}</style>
		
<div id = "regContactUsContent">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			echo "<p>We Will be Gladly Contact You<br>Thank You!</p>";//displays result on submit
		}
	?>
	<h3>Contact Us</h3>
	<p id = "regContactUsCaption">Please use this form to contact a member of Some Bank's team</p>
	<form method="post" action="ContactUS.php">
		<p class = "regContactUsRadioPage">
			<label for="date">When do you want us to contact you?</label>
			<input class = "contactUsRadio" type="radio" name="date" value="" checked>Tomorrow
			<input class = "contactUsRadio" type="radio" name="date" value="noon">Day After Tomorrow
					
			<p class = "regContactUsTextBoxPage">
				<input class = "contactUsTextBox" placeholder = "if any other day please specify" type="text" name="date">
			</p>
		</p>
		<p class = "regContactUsRadioPage">
			<label for="time">At what time, you want us to contact you?</label>
			<input class = "contactUsRadio" type="radio" name="time" value="morning" checked>Morning
			<input class = "contactUsRadio" type="radio" name="time" value="noon">Noon
			<input class = "contactUsRadio" type="radio" name="time" value="evening">Evening
		</p>
		<p>
			<input id = "regContactUsButton" type="submit" value="Submit">
		</p>
	</form>
</div>
		

<?php
	require_once('../Footer.php');
?>	