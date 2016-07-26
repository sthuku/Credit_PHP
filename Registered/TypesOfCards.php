<?php
	define("TITLE", "Card Types - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//stylesheet
	include('../LogOut.php');//log out button
	include('../Header.php');//header
	include('../Nav.php');//menu
?>	

<style>#footer{ margin-top : 80px;}</style>
<script type = "text/javascript" src = "../Javascript/CardsScript.js"></script><!-- with .js extention -->

<div id = "cardsBody">
	<div id = "cardsContent">
	<p>Some Bank offers these types Of Cards. We will let you know our new services</p>
	<p><input class = "cardsButton" id = "studentButton" type = "button" value = "Student Cards"/></p>
	<div id = "studentMessage"  style = "margin-left = 0px;"></div>
	<p><input class = "cardsButton" id = "regularButton" type = "button" value = "Regular Cards"/></p>
	<div id = "regularMessage" style = "margin-left = 0px;"></div>
	<p><input class = "cardsButton" id = "businessButton" type = "button" value = "Business Cards"/></p>
	<div id = "businessMessage" style = "margin-left = 0px;"></div>
	<p><input class = "cardsButton" id = "securityButton" type = "button" value = "Secured Cards"/></p>
	<div id = "securityMessage" style = "margin-left = 0px;"></div>
	<p><em>Note: Credit Limit may vary based on your earnings. For more Information <a href = "ContactUs.php"><strong>Contact Us</a></strong></em></p>
	</div>
</div>
	
<?php
	include('../Footer.php');
?>