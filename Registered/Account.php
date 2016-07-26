
<?php
	define("TITLE", "Account - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//style sheet with .php extension 
	include('../LogOut.php');//Log out page includes log out button
	include('../Javascript/AccountScript.php');//.js file for posting results
	include('../Header.php');//header
	include('../Nav.php');//Navigation menu
?>

<style>#footer{ margin-top : 100px;}</style>

<div id = "accountBody">
	<div id = "accountContent">
		<p>Welcome <?php echo RIGHT_HEADER; ?></p>
		<p id = "accountOffers">Our new offers for you : We are thinking about you <?php echo RIGHT_HEADER; ?>. Present, we don't have any new offers for you. We will send updates to you</p>
		<p><input id = "accountCardsButton" type = "button" value = "My Credit Cards"></p>
		<p><input id = "accountLimitButton" type = "button" value = "My Credit Limit"></p>
		<p id = "query"></p>
		<p id = "request"><strong><em>Request copy of Credit Score or Credit History statements</em></strong></p>
	</div>
</div>
	
<?php
	include('../Footer.php');//footer
?>	