<?php
	session_start();//starts the session to either set session or get session

?>

<?php
	define("TITLE", "Change Password - Credit Card Online - Some Bank");//title
	include('../CSS/ForgotPasswordStyle.php');//stylesheet for content or messages
	include('../header.php');//header
	include('../nav.php');//menu
?>

<style>#footer{ margin-top : 180px;}</style>
		
<?php
						
	$securityAnswer = '';
	//if post method is requested..
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$securityAnswer = $_POST['securityAnswer'];//value from text box with the name as key
	}
	//validate
	$securityAnswer = trim($securityAnswer);
	$securityAnswer = stripslashes($securityAnswer);
	$securityAnswer = htmlspecialchars($securityAnswer);
	
	//if session for securityAnswer is set...
	if(isset($_SESSION['securityAnswer']) && $_SESSION['securityAnswer'] != NULL){
		//if the securityAnswer from session which is from table matches with entered securityAnswer...
		if($_SESSION['securityAnswer'] == $securityAnswer){
			echo 	'<div id = "forgotPasswordContent">'.
						'<form id = "forgotPasswordForm" method = "post" action = "SetPassword.php">'; 
			echo 			'<p class = "forgotPasswordPage">'.
								'<input class = "forgotPasswordTextBox" placeholder = "New Password" type = "password" name = "newPassword" required>'.
							'</p>';//password text box for new password
			echo 			'<p class = "forgotPasswordPage">'.
								'<input class = "forgotPasswordTextBox" placeholder = "Confirm New Password" type = "password" name = "confirmNewPassword" required>'.
							'</p>';//confirm password
			echo 			'<p class = "forgotPasswordPage">'.
								'<input id = "forgotPasswordButton" type = "submit">'.
							'</p>'.
						'</form>'.
					'</div>';
		} else {
			//if the securityAnswer from session which is from table does not matche with entered securityAnswer...
			echo 	'<div id = "forgotPasswordContent">'.
						'<div id = "forgotPasswordMessage">'.
							'<p>Entered Security Answer doesn\'t match with our records</p>'.
							'<p>'.
								'You can '.
								'<a href = "AccountAccess.php"><strong><em>try again</em></strong></a> '.
								'or '.
								'<a href = "ContactUs.php"><strong><em>Contact Us</em></strong></a>'.
							'</p>'.
						'</div>'.
					'</div>';//message
							}
	}else{
		//if session is not set, unsets and destroys the session and redirects to the log in page using header functio
			session_unset();
			session_destroy();
			header("location: LogIn.php");
	}

?>

<?php
	include('../Footer.php');//footer
?>

