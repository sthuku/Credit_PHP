<?php
	define("TITLE", "Deactivate Card - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//style sheet
	include('../LogOut.php');//log out button
	include('../Header.php');//header
	include('../Nav.php');//menu
?>	

<style>#footer{ margin-top : 70px;}</style>

<div id = "deactivateContent">
	<form method = "post" action = "DeactivateCard.php">
		<p>With One Click Deactivate your card</p>
		<p><input class = "deactivateTextBox" type = "text" placeholder = "Enter Card Number" name = "cardNumber" required></p>
		<textarea id = "deactivateTextarea" placeholder = "Reason for deactivation" rows="4" cols="50">
		
		</textarea>
		<p><input id = "deactivateButton" type = "submit" value = "Deactivate"></p>
	</form>
<?php 
//checks if post is set
if(isset($_POST['cardNumber'])){
	$cardNumber = $_POST['cardNumber'];
	$cardNumber = trim($cardNumber);
	$cardNumber = stripslashes($cardNumber);
	$cardNumber = htmlspecialchars($cardNumber);//validate, prevents xss or sql injection attacks
	
	$database = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die (mysqli_error($database). " Error connecting database");//database connection
	
	//query into credit cards table
	$cardQuery = 	"SELECT *FROM credit_cards ".
					"WHERE email = '$email'";
	$resultCardQuery = mysqli_query($database, $cardQuery) or die(mysqli_error($database). " Error querying credit_card");//submits the query
	$rowCardQuery = mysqli_fetch_array($resultCardQuery);//fetches the result data
	
	//function for upadating table upon deactivation request
	function cards($type, $rowCardQuery, $cardNumber, $email , $database){
		//checks if any row value has entered card number
		if($rowCardQuery[$type] === $cardNumber){
			$deactivateQuery = 	"UPDATE credit_cards ".
								"SET $type = NULL ".
								"WHERE email = '$email'";//query for updating the table
			mysqli_query($database, $deactivateQuery) or die(mysqli_error($database). " Error deactivating credit_card");//submits the query
			echo '<p>Successfully Deactivated!</p>';//successful message
		}
	}
	
	//calling the above function for each type card inside foreach loop
	$booln = 0;
	foreach($rowCardQuery as $value){
		if($value === $cardNumber){
			cards('student', $rowCardQuery, $cardNumber, $email, $database);
			cards('regular', $rowCardQuery, $cardNumber, $email, $database);
			cards('business', $rowCardQuery, $cardNumber, $email, $database);
			cards('secured', $rowCardQuery, $cardNumber, $email, $database);
			$booln = 1;
			break;
		} 
	}
	
	//if card not found, message
	if($booln === 0){
		echo "<p>Please Check your card number</p>";
	}
	
	mysqli_close($database);//closes the database connection
}
?>
</div>	
<?php
	include('../Footer.php');
?>