<?php
	session_start();//starts the session to either set session or get session

?>

<?php
	define("TITLE", "Change Password - Credit Card Online - Some Bank");//title
	include('../CSS/ForgotPasswordStyle.php');//stylesheet for messages
	include('../header.php');//header
	include('../nav.php');//menu
?>

<style>#footer{ margin-top : 190px;}</style>

<?php
	//validate function
	function validate($field){
		$field = trim($field);
		$field = stripslashes($field);
		$field = htmlspecialchars($field);
		return $field;
	}
	
	$accountNumber = '';
	$firstName = '';
	$lastName = '';
	$email = '';
	$phone = '';
	
	//if post method is requested
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$accountNumber = validate($_POST['accountNumber']);//values from text box with the name as key
		$firstName = validate($_POST['firstName']);
		$lastName = validate($_POST['lastName']);
		$email = validate($_POST['email']);
		$phone = validate($_POST['phone']);
	}
	
	$dbc = mysqli_connect("127.0.0.1", "root", "", "credit_card_demo") or die ("error connecting to database");//connects the database
	
	$verify =   "SELECT * FROM credit_card_table ".
				"WHERE account_number = '$accountNumber' ".
				"AND first_name = '$firstName' ".
				"AND last_name = '$lastName' ".
				"AND email = '$email' ".
				"AND phone = '$phone'";//select query from credit card table where the entered values equal to table values 
	$resultVerification = mysqli_query($dbc, $verify);//queries the query
	$row = mysqli_fetch_array($resultVerification);//fetches the data
	
	//if the data retrieved is not empty...
	if(!empty($row)){
		$_SESSION["securityQuestion"] = $row['security_question'];//saving values from table in session variables for future use 
		$_SESSION["securityAnswer"] = $row['security_answer'];
		$_SESSION["firstName"] = $row['first_name'];
		$_SESSION["lastName"] = $row['last_name'];
		$_SESSION["phone"] = $row['phone'];
		$_SESSION["email"] = $row['email'];
		$_SESSION["password"] = $row['password'];
		$_SESSION["accountNumber"] = $row['account_number'];
		
		//session for security question is set and it is not null...
		if(isset($_SESSION['securityQuestion'])&& $_SESSION['securityQuestion'] != NULL)
		{
			echo    '<div id = "forgotPasswordContent">'.
						'<form id = "forgotPasswordForm" method = "post" action = "ChangePassword.php">'; 
			echo 			'<p class = "forgotPasswordPage">'.
								'<input class = "forgotPasswordTextBox" placeholder = "'.$_SESSION['securityQuestion'].'" type = "password" name = "securityAnswer" required>'.
							'</p>';
			echo 			'<p class = "forgotPasswordPage">'.
								'<input id = "forgotPasswordButton" type = "submit">'.
							'</p>';
			echo 		'</form>'.
					'</div>';
		}else{
			//if the session is not set, unsets and destroys the session and redirects to log in page using header function
			session_unset();
			session_destroy();
			header('Location: LogIn.php');
		}
	} else {
		//if the data retrieved from the table is empty...
		echo 	'<div id = "forgotPasswordContent">'.
					'<div id = "forgotPasswordMessage">'.
						'<p>We don\'t have any records matching your information</p>'.
						'<p>'.
							'Please '.
							'<a href = "AccountAccess.php"><strong><em>try again</em></strong></a> '.
							'or '.
							'<a href = "ContactUs.php"><strong><em>Contact Us</em></strong></a>'.
						'</p>'.
					'</div>'.
				'</div>';//error message
	}
	mysqli_close($dbc);//closes the database 
?>

<?php
	include('../Footer.php');//footer
?>

