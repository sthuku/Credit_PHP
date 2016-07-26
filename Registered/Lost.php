<?php
	define("TITLE", "Lost Card - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//style sheet
	include('../LogOut.php');//log out button
	include('../Header.php');//header
	include('../Nav.php');//menu
?>	

<style>#footer{ margin-top : 210px;}</style>
	
<div id = "lostContent"><!--content-->
	<form method = "post" action = "Lost.php">
		<p>Lost Card? Don't worry we will get you new one.</p>
		<p>
			<p><input id = "lostTextBox" type = "text" placeholder = "Enter Card Number" name = "cardNumber"></p>
			<p><input id = "lostButton" type = "submit" value = "Submit"></p>
		</p>
	</form>
<?php 
//checks if post is set
if(isset($_POST['cardNumber'])){
	//validation
	$cardNumber = $_POST['cardNumber'];
	$cardNumber = trim($cardNumber);
	$cardNumber = stripslashes($cardNumber);
	$cardNumber = htmlspecialchars($cardNumber);
	
	$database = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die (mysqli_error($database). " Error connecting database");//databse connection
	
	$cardQuery = 	"SELECT *FROM credit_cards ".
					"WHERE email = '$email'";//query to cradit_Cards table
	$resultCardQuery = mysqli_query($database, $cardQuery) or die(mysqli_error($database). " Error querying credit_card");//submits the query
	$rowCardQuery = mysqli_fetch_array($resultCardQuery);//fetches the data
	
	$booln = 0;
	//checks if entered card number exists with each record
	foreach($rowCardQuery as $value){
		if($value === $cardNumber){
			echo "<p>We will mail the credit card to your address<br>If you changed your address<br>please update it on Some Bank's main site<br>For more Information, please <a href = ../Registered/ContactUs.php ><strong><em>Contact Us<em></strong></a></p>";
			$booln = 1;
			break;
		}
	}
	
	//if no card number found
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