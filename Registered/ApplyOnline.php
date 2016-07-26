<?php
	define("TITLE", "Apply - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//style sheet
	include('../LogOut.php');//log out button
	include('../Header.php');//header
	include('../Nav.php');//menu
?>	

<style>#footer{ margin-top : 100px;}</style>
<script type = "text/javascript" src = "../Javascript/ApplyScript.js"></script><!--external .js extention javascript file-->

<div id = "accountBody"><!--content-->
	<div id = "accountContent">
		<form method = "post" onsubmit = "return validate()" action = "ApplyForm.php">
						<p>
			<select name = "occupation" id = "occupation" class = "applyTextBox" onchange = "workValidate()">
				<option id = "selectO" value = "select">Can you tell us what you do?</option>
				<option id = "work" value="work">I work</option>
				<option id = "business" value="business">I have own business</option>
				<option id = "retired" value="retired">I am Retired</option>
				<option id = "student" value="student">I am a Student</option>
			</select>
			</p>
			
			<p>
			<select name = "cardType" id = "cardType" class = "applyTextBox" >
				<option value = "select">Select the card you want to apply</option>
				<option id = "studentType" value="studentType" >Student Card</option>
				<option id = "regularType" value="regularType">Regular Card</option>
				<option id = "businessType" value="businessType">Business Card</option>
				<option id = "securedType" value="securedType">Secured Card</option>
			</select>
			</p>
			

			<p>
			<select name = "salary" id = "salary" class = "applyTextBox">
				<option value="select">What is your Salary per Anum?</option>
				<option id = "noSalary" value="noSalary">I am a student or I don't Work</option>
				<option value="thirty">below 20,000</option>
				<option value="forty">20,00 to 40,000</option>
				<option value="fifty">40,000 to 60,000</option>
				<option value="seventy">60,000 to 80,000</option>
				<option value="ninty">80,000 to 100,000</option>
				<option value="oneten">more than 100,000</option>
			</select>
			</p>
			
			<p>
				<input class = "applyTextBox" id = "ssn" type = "text" placeholder = "Social Security Number" name = "ssn" required/>
			</p>
			<strong><p id = "errorMessage"></p></strong>
			<p><input id = "applyButton" type = "submit" value = "Apply"></p>
		</form>
	</div>
</div>
	
<?php
	include('../Footer.php');
?>