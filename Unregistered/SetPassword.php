<?php
	session_start();//starts the session to either set session or get session
?>

<?php
	define("TITLE", "Set Password - Credit Card Online - Some Bank");//title
	include('../CSS/ForgotPasswordStyle.php');//style sheet for styling error or other messages
	include('../header.php');//header
	include('../nav.php');//menu
?>

<style>#footer{ margin-top : 250px;}</style>

<div id = "forgotPasswordContent"> 
	<?php
		//validate
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);//no sql injection
			$data = htmlspecialchars($data);//no cross site scripting
			return $data;
		}

		$newPassword =''; 
		$confirmNewPassword = '';
		
		//if post method is requested
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$newPassword = validate($_POST['newPassword']);;//saves the value from text box based on text box name
			$confirmNewPassword = validate($_POST['confirmNewPassword']);
		}
						
		$dbc = mysqli_connect("127.0.0.1", "root", "", "credit_card_demo") or die ("error connecting to database");//database connection
						
		//if sessions are set during log in	and they are not null			
		if(isset($_SESSION["accountNumber"]) && isset($_SESSION["email"]) && $_SESSION["accountNumber"] != NULL && $_SESSION["email"] != NULL){
			if($newPassword == $confirmNewPassword){
				//if new passwords match
				$updatePassword = 	"UPDATE credit_card_table SET password = '$newPassword'".
									"WHERE account_number = '".$_SESSION["accountNumber"]."' AND email = '".$_SESSION["email"]."'"; //update new passwords query
				mysqli_query($dbc, $updatePassword) or die("Something is wrong with query");//queries the query
				
				//successfull message
				echo 	'<div id = "setPasswordMessage">'.
							'<p>'.
								'Password changed successfully. Please '.
								'<a href = "LogIn.php"><strong><em>Log In</em></strong></a>'.
							'</p>'.
						'</div>';
			} else{
				//if passwords does not match
				echo 	'<div id = "setPasswordFailedMessage">'.
							'<p>'.
								'Password and Confirm Password must match! '.
								'<a href = "AccountAccess.php"><strong><em>Try again</em></strong></a> '.
								'or '.
								'<a href = "ContactUs.php"><strong><em>Contact Us</em></strong></a>'.
							'</p>'.
						'</div>';
			}
		} else{
			//if session is not set, unsets and destroys the session
			unset($_SESSION['accountNumber']);
			unset($_SESSION['email']);
			session_destroy();
			header("location: LogIn.php");
		}
		mysqli_close($dbc);//closes the database conncetion
	?>
</div>

<?php
	include('../Footer.php');//footer
?>

