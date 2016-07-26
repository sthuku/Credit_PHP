<?php
	define("TITLE", "Contact Us - Log In - Credit Card Online - Some Bank");//title
	include('../CSS/ContactUsStyle.php');//style sheet
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

<div id = "contactUsContent"><!--content-->
	<?php
		//message upon submit
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			echo "<p>We Will be Gladly Contact You <br>Thank You!</p>";
		}
	?>
	<h3>Contact Us</h3>
		<p id = "contactUsCaption">Please use this form to contact a member of Some Bank's team</p>
			<form method="post" action="ContactUS.php">
				<p class = "contactUsTextBoxPage">
					<input class = "contactUsTextBox" placeholder = "Full Name" type="text" name="name" required>
				</p>
				
				<p class = "contactUsTextBoxPage">
					<input class = "contactUsTextBox" placeholder = "Email" type="email" name="email" required>
				</p>
				
				<p class = "contactUsTextBoxPage">
					<input class = "contactUsTextBox" placeholder = "Phone" type="tel" name="phone">
				</p>
				
				<p class = "contactUsRadioPage">
					<label for="date">When do you want us to contact you?</label>
					<input class = "contactUsRadio" type="radio" name="date" value="" checked>Tomorrow
					<input class = "contactUsRadio" type="radio" name="date" value="noon">Day After Tomorrow
					
					<p class = "contactUsTextBoxPage">
						<input class = "contactUsTextBox" placeholder = "if any other day please specify" type="text" name="date">
					</p>
				</p>
				
				<p class = "contactUsRadioPage">
					<label for="time">When do you want us to contact you?</label>
					<input class = "contactUsRadio" type="radio" name="time" value="morning" checked>Morning
					<input class = "contactUsRadio" type="radio" name="time" value="noon">Noon
					<input class = "contactUsRadio" type="radio" name="time" value="evening">Evening
				</p>
				<p>
					<input id = "contactUsButton" type="submit" value="Submit">
				</p>
				<p>
					<em>Note: If you have already an account please <a href = "LogIn.php"><strong><em>Log In</em></strong></a> and try 'Contact Us' form.</em>
				</p>
			</form>
</div><!--content ends-->
		
<?php
	include('../Footer.php');//footer
?>