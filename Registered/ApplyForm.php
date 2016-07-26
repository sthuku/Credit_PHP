<?php
	define("TITLE", "Apply - Credit Card Online - Some Bank");//title
	include('../CSS/AccountStyle.php');//style sheet
	include('../LogOut.php');//logout button
	include('../CSS/ForgotPasswordStyle.php');//styling error messages or other messages
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

<style>#footer{ margin-top : 170px;}</style>

<?php
	//variables
	$salary = '';
	$occupation = '';
	$cardType = '';
	$ssn = '';
	
	//if post method is set
	if(isset($_POST['salary']) && isset($_POST['occupation']) && isset($_POST['ssn'])){
		$salary = $_POST['salary'];//gets the text box values using text box names
		$occupation = $_POST['occupation'];
		$cardType = $_POST['cardType'];
		$ssn = $_POST['ssn'];
		
		//validate to prevent sql injection, xss
		$ssn = trim($ssn);
		$ssn = stripslashes($ssn);
		$ssn = htmlspecialchars($ssn);
		
		//connects to the database
		$database = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die (mysqli_error($database). " Error connecting database");
		
		$verifyApplyQuery = "SELECT * FROM apply_card ".
							"WHERE email = '$email'";//select query to apply card
		$resultApplyQuery = mysqli_query($database, $verifyApplyQuery) or die(mysqli_error($database). " Error verifying apply_card");//queries the query
		$rowApplyyQuery = mysqli_fetch_array($resultApplyQuery);//fetches the data
		
		//if above query is null, then insert data into apply card
		if(is_null($rowApplyyQuery)){
			
			$insertApply = "INSERT INTO apply_card (occupation, salary, ssn, email) VALUES ('$occupation', '$salary', '$ssn', '$email')";
			mysqli_query($database, $insertApply) or die(mysqli_error($database)." Error inserting values into apply_card");
			
		}else{
			//if that query is not null, check entered ssn and ssn value in table are same
			if($rowApplyyQuery['ssn'] == $ssn){
				//if ssn's are same, check if selected occupation and occupation value in apply table are same
				if($rowApplyyQuery['occupation'] != $occupation){
					//if not update the value
					$updateOccupation = "UPDATE apply_card ".
										"SET occupation = '$occupation' ".
										"WHERE ssn = '$ssn'";
					mysqli_query($database, $updateOccupation) or die(mysqli_error($database). " Error updating occupation in apply_card");
					
				}
				
				//if selected salary and salary value in apply table are same
				if($rowApplyyQuery['salary'] != $salary){
					//if not, update the value
					$updateSalary = "UPDATE apply_card ".
									"SET salary = '$salary' ".
									"WHERE ssn = '$ssn'";
					mysqli_query($database, $updateSalary) or die(mysqli_error($database)." Error updating salary in apply_card");
				}
			}else{
				//if ssn's does not match, kills the script, displays the error message, here it's calling message function
				die(message("Check your ssn, it does not match with our records", "If you are applying for the first time"));
			}
		}
		
		//select query from credit cards
		$verifyQuery = 	"SELECT * FROM credit_cards ".
						"WHERE email = '$email'";
				
		$resultVerifyQuery = mysqli_query($database, $verifyQuery) or die(mysqli_error($database)." Error verifying credit_cards");
		$rowVerifyQuery = mysqli_fetch_array($resultVerifyQuery);
		
		//generates random numbers for card number
		function nextCardNumber(){
			$booln = true;
			while($booln){
				$random = rand(1,2400000);
				if(empty($rowVerifyQuery)){
					return $random;
					break;
				}
				else {
					if($rowVerifyQuery['student'] != $random || 
						$rowVerifyQuery['regular'] != $random || 
						$rowVerifyQuery['business'] != $random || 
						$rowVerifyQuery['secured'] != $random)
					{
						//if not the random number is already used 
						return $random;
						break;
					}
				}
			}
		}
		$nextNumber = nextCardNumber();
		
		//function for inserting query into credit cards table for the first time that means if user never applied a card
		function insertQ($database, $cardType, $email, $rowVerifyQuery, $type, $insertType, $cardNumber){
			//if card type from form is equals to one of the type from the list...
			if($cardType == $type){
				//insert type is the column in credit cards in which the value will be inserted, if that column is empty...
				if(empty($rowVerifyQuery[$insertType])){
					$insertStudentQuery = 	"INSERT INTO credit_cards(email, $insertType) ".
											"VALUES	('$email', '$cardNumber')";//insert query
					mysqli_query($database, $insertStudentQuery) or die(mysqli_error($database)." Error inserting value into credit_card");
					echo message("Your Card Number is $cardNumber<br>We will mail the credit card to your address","If you changed your address,<br>Please update it on Some Bank's main site<br>For more Information");//calls message function to display the successful message
				}else echo message("You already have this card", "If you never applied");//error message if the column is not empty which means user already have that card can not apply the same card again
			}
		}
		
		//function for updating query into credit cards table if it is not for the the first time that means if user applied a card before
		function updateQ($database, $cardType, $email, $rowVerifyQuery, $type, $insertType, $cardNumber){
			if($cardType == $type){
					if($rowVerifyQuery[$insertType] === NULL){
						$updateStudentQuery = 	"UPDATE credit_cards ".
												"SET $insertType = '$cardNumber' ".
												"WHERE email = '$email'";//update query
						mysqli_query($database, $updateStudentQuery) or die(mysqli_error($database)." Error updating value in credit_card");
						echo message("Your Card Number is $cardNumber<br>We will mail the credit card to your address","If you changed your address<br>please update it on Some Bank's main site<br>For more Information");
						echo "empty";
					}else echo message("You already have this card", "If you never applied");
				}
		}
		
		//if selected query from credit cards is empty...
		if(empty($rowVerifyQuery)){
			//calls the insertQ function for four times for each card, here inside the function valiadtion goes on, only requested card column will be updated
			insertQ($database, $cardType, $email, $rowVerifyQuery, 'studentType', 'student', $nextNumber);
			insertQ($database, $cardType, $email, $rowVerifyQuery, 'regularType', 'regular', $nextNumber);
			insertQ($database, $cardType, $email, $rowVerifyQuery, 'businessType', 'business', $nextNumber);
			insertQ($database, $cardType, $email, $rowVerifyQuery, 'securedType', 'secured', $nextNumber);
	
		}else{
			//if ssn's match...
			if($rowApplyyQuery['ssn'] == $ssn){
				//calls the updateQ function for four times for each card, here inside the function valiadtion goes on, only requested card column will be updated
				updateQ($database, $cardType, $email, $rowVerifyQuery, 'studentType', 'student', $nextNumber);
				updateQ($database, $cardType, $email, $rowVerifyQuery, 'regularType', 'regular', $nextNumber);
				updateQ($database, $cardType, $email, $rowVerifyQuery, 'businessType', 'business', $nextNumber);
				updateQ($database, $cardType, $email, $rowVerifyQuery, 'securedType', 'secured', $nextNumber);
			}else{
				echo message("Check your ssn, it does not match with our records", "If you are applying for the first time");//if ssn's don't match
			}
		}

		mysqli_close($database);//closes the database
	
	}
?>

<?php
	//this is the message function
	function message($msg1, $msg2){
			return '<div id = "forgotPasswordContent">'.
						'<div id = "forgotPasswordMessage">'.
							'<p>'.
								$msg1.
							'</p>'.
							'<p>'.
								$msg2.', please '.
								'<a href = "../Registered/ContactUs.php" ><strong><em>Contact Us<em></strong></a>'.
							'</p>'.
						'</div>'.
					'</div>';
		}
?>

<?php
	include('../Footer.php');
?>