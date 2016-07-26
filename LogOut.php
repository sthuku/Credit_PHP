
<?php
session_start();//starts the session to either set session or get session
	//checks whethers sessions are set
	if(isset($_SESSION['firstName']) && $_SESSION['firstName'] != NULL && isset($_SESSION['email']) && $_SESSION['email'] != NULL){
		define("RIGHT_HEADER",$_SESSION['firstName']);//constant, saves first name from session		
		$email = $_SESSION['email'];//saves session email into email variable
	}else{
		//if session is not set, unsets and destroys the session
		session_unset();
		session_destroy();
		header('Location: ../Unregistered/LogIn.php');//using header function, is session is not set, after destroying the session, it redirects to log in page
	}
?>

<script>
	window.addEventListener("load", function(){
		var logout = document.getElementById('logout');
		logout.addEventListener("mouseover", function(){
			logout.innerHTML = "Log Out";
			});//name will be changed to "Log Out" on mouse over
		logout.addEventListener("mouseout", function(){
			logout.innerHTML = "<?php echo 'Hi '.RIGHT_HEADER; ?>";
			});//"Log Out" will be changed back to the name on mouse out
	}, "false");
</script>

<section id = "topRightHeader">
	<p id = "topRightHeaderPage"><a id = "logout" href = "../Unregistered/LogIn.php"><?php echo 'Hi '.RIGHT_HEADER;//displays name in logged in pages ?></a></p>
</section>
