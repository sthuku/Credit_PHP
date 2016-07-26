<?php
	define("TITLE", "Account Access - Log In - Credit Card Online - Some Bank");//title
	include('../CSS/AccountAccessStyle.php');//stylesheet
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

	
<div id = "accountAccessContent"><!--content-->
	<form id = "accountAccessContentForm" method = "post" action = "SecurityQuestion.php">
		<p class = "accountAccessContentPage">
			<input class = "accountAccessTextBox" type = "text" placeholder = "Account Number" name = "accountNumber" required>
		</p>
		<p class = "accountAccessContentPage">
			<input class = "accountAccessTextBox" type = "text" placeholder = "First Name" name = "firstName" required>
		</p>
		<p class = "accountAccessContentPage">
			<input class = "accountAccessTextBox" type = "text" placeholder = "Last Name" name = "lastName" required>
		</p>
		<p class = "accountAccessContentPage">
			<input class = "accountAccessTextBox" type = "tel" placeholder = "Phone" name = "phone" required>
		</p>
		<p class = "accountAccessContentPage">
			<input class = "accountAccessTextBox" type = "email" placeholder = "Email" name = "email" required>
		</p>
		<p class = "accountAccessContentPage">
			<input class = "accountAccessContentButton"  id = "accountAccessContentButton" type = "submit">
		</p>
	</form>
</div>
	
<?php
	include('../Footer.php');//footer
?>