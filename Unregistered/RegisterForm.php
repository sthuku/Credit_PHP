<?php
	include('../CSS/ForgotPasswordStyle.php');//style sheet for styling error messages and other messages
	define("TITLE", " Register - Credit Card Online - Some Bank");//title
	include('../Header.php');//header
	include('../Nav.php');//menu
?>

<?php 
//validate
function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);//no cross site scripting nor sql injection
	return $data;
}

$firstName = '';
$lastName = '';
$accountNumber = '';
$email = '';
$phone = '';
$password =''; 
$confirmPassword = '';
$securityQuestion = '';
$securityAnswer = '';

//checks if post method is requested
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$firstName = validate($_POST['firstName']);//saves the value from text box based on text box name
	$lastName = validate($_POST['lastName']);
	$accountNumber = validate($_POST['accountNumber']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);
	$password = validate($_POST['password']);
	$confirmPassword = validate($_POST['confirmPassword']);
	$securityQuestion = validate($_POST['securityQuestion']);
	$securityAnswer = validate($_POST['securityAnswer']);
}
	
	//if passwords match
	if($password == $confirmPassword)
	{
		$databaseConnection = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die('Error connecting to Database');//database connection
		$verify = 	"SELECT * FROM credit_card_account_numbers ".
					"WHERE first_name = '$firstName' ".
					"AND last_name = '$lastName' ".
					"AND email = '$email' ".
					"AND account_number = '$accountNumber' ".
					"AND phone = '$phone'";//query
		
		$resultVerify = mysqli_query($databaseConnection, $verify) or die('Error recording starting!');//queries the query
		$info = mysqli_fetch_array($resultVerify);//fetches the data
		
		//if retrieved data is empty, that means user does not have bank account in some bank, he must have an account in some bank. literally, in credit card account numbers table which is for accounts
		if(is_null($info))
		{
			echo 	'<div id = "forgotPasswordContent">'.
						'<p id = "forgotPasswordMessage" stylepadding:>'.
							'No records found matching your information '.
							'<a href = "Register.php"><strong><em>Try Again<em></strong></a> '.
						'</p>'.
					'</div>';;
		}
		else
		{
			//if user has account in some bank, this query verifies whether he is already registered. credit card table is this sites table where as credit card account numbers is some bank's table
			$verifySignUp = 	"SELECT * FROM credit_card_table ".
								"WHERE first_name = '$firstName' ".
								"AND last_name = '$lastName' ".
								"AND email = '$email' ".
								"AND account_number = '$accountNumber' ".
								"AND phone = '$phone'";//query
			
			$resultSignUp = mysqli_query($databaseConnection, $verifySignUp) or die('Error getting results!');//queries the query
			$row = mysqli_fetch_array($resultSignUp);//fetches the data
			
			//if data is not null means user has already registered
			if(!is_null($row))
			{
				echo 	'<div id = "forgotPasswordContent">'.
							'<div id = "forgotPasswordMessage">'.
								'<p>'.
									'You have already Registered '.
									'<a href = "LogIn.php"><strong><em>Log In<em></strong></a> '.
								'</p>'.
								'<p>'.
									'If you never registered, please '.
									'<a href = "ContactUs.php" ><strong><em>Contact Us<em></strong></a>'.
								'</p>'.
							'</div>'.
						'</div>';
			} else{
				//if the the above data empty, inserts the user info into credir cards table
				$query = 	"INSERT INTO credit_card_table ". 
							"(first_name, last_name, account_number, email, phone, password, security_question, security_answer) ".
							"VALUES ".
							"('$firstName', '$lastName', '$accountNumber', '$email', '$phone', '$password', '$securityQuestion', '$securityAnswer')";//query
		
				mysqli_query($databaseConnection, $query) or die('Error recording!');//queries the query
				echo '<div id = "forgotPasswordContent">'.
						'<p id = "forgotPasswordMessage">'.
							'Registration Successfull. Please '.
							'<a href = "LogIn.php"><strong><em>Log In<em></strong></a> '.
						'</p>'.
					'</div>';//success message
				
			}
		}
		mysqli_close($databaseConnection);//closes the database connection
	}
	else
	{
		//if passwords does not match
		echo 	'<div id = "forgotPasswordContent">'.
					'<p id = "forgotPasswordMessage">'.
						'Password and Confirm Password must match '.
						'<a href = "Register.php"><strong><em>Try Again<em></strong></a> '.
					'</p>'.
				'</div>';
	}
?>

<?php	
	include('../Footer.php');//footer
?>