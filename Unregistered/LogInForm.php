<?php
	session_start();//starts the session to either set session or get session
?>

<?php
	include('../CSS/LogInStyle.php');//stylesheet
	include('../CSS/ForgotPasswordStyle.php');//stylesheet for styling messages
	define("TITLE", " Log In - Credit Card Online - Some Bank");//title
	include('../Header.php');//header
	include('../Nav.php');//menu
?>


<?php 
	//function to validate 
	function validate($data){
		$data = trim($data);//trims white spaces
		$data = stripslashes($data);//removes back slashes, to prevent sql injection
		$data = htmlspecialchars($data);//converts special characters to html specail charactrs, prevents cross site scripting ->xss hacks
		return $data;
	}

	$email = '';
	$password = '';
	
	
	//checks whether post method is called
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$email = validate($_POST['email']);//this assoc array retrieves the value entered in form 
		$password = validate($_POST['password']);
		
		
	}
	//checks if email and password not empty
	if(!empty($email) && !empty($password)){
			$databaseConnection = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die ("Connection Failed");//database connection
			$query = "SELECT * FROM credit_card_table WHERE email = '$email' AND password = '$password'";//selects data where entered email and password
			
			$result = mysqli_query($databaseConnection, $query) or die('something went wrong');//submits the query
			$row = mysqli_fetch_array($result);//fetches the row
		//checks if row is not empty
		if(!empty($row))
		{
			$_SESSION['email'] = $email;//session, super global variable carries the data to next pages, here it carries email and first name
			$_SESSION['firstName'] = $row['first_name'];
			echo "<script>window.location.href = '../Registered/Account.php';</script>";//redirects to registered account page
			mysqli_close($databaseConnection);//closes database connection
		} 
		else
		{
			//error messages if the row is empty
			echo '<div id = "forgotPasswordContent">'.
					'<p id = "forgotPasswordMessage">'.
						'Wrong Email or Password. '.
						'<a href = "LogIn.php"><strong><em>Try Again<em></strong></a> '.
						'or '.
						'<a href = "ContactUs.php" ><strong><em>Contact Us<em></strong></a>'.
					'</p>'.
				'</div>';
		}
	
	}
	else 
	{
		//error messages if $email, $password are empty
		echo 	'<div id = "forgotPasswordContent">'.
					'<p id = "forgotPasswordMessage">'.
						'Wrong Email or Password. '.
						'<a href = "LogIn.php"><strong><em>Try Again<em></strong></a> '.
						'or '.
						'<a href = "ContactUs.php" ><strong><em>Contact Us<em></strong></a>'.
					'</p>'.
				'</div>';
	}
?>

<?php	
	include('../Footer.php');//footer
?>