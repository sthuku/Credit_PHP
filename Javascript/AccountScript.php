<?php
	//connecting to database using mysqli_connect method
	$database = mysqli_connect('127.0.0.1', 'root', '', 'credit_card_demo') or die (mysqli_error($database). " Error connecting database");

	$creditQuery = "SELECT * FROM credit_cards ".
					"WHERE email = '$email'"; //query saved in a variable
	$resultCreditQuery = mysqli_query($database, $creditQuery) or die(mysqli_error($database). " Error querying credit_card");//submitting query
	$rowCredityQuery = mysqli_fetch_array($resultCreditQuery);//fetches the row as an assoc array
		
	//function to check whether row array is empty, prints the results (credit cards)
	function cards($type, $rowCredityQuery){
		if($rowCredityQuery[$type] === NULL){
			echo 'you don\'t have '.$type.' card<br>';
		}else{
			echo 'you have '.$type.' card.<br>Card number is '.$rowCredityQuery[$type].'<br>';
		}
	}
	
	//shows credit limit for each card
	function creditLimit($type, $rowCredityQuery, $limit){
		if($rowCredityQuery[$type] != NULL){
			echo 'Credit limit for your '. $type. ' card is '.$limit.'<br>';
		}
	}
?>

	
<script>	
	//this script posts the results on registered account page
	
	//instances of above php cards function in a javascript function for each card
	function creditCards(){
		document.getElementById('query').innerHTML = 	"<?php 
															cards('student', $rowCredityQuery);
															cards('regular', $rowCredityQuery);
															cards('business', $rowCredityQuery);
															cards('secured', $rowCredityQuery);
														?>"
	}
	
	//instances of credit limit function in a function for each card
	function creditLimit(){
		document.getElementById('query').innerHTML = 	"<?php 
															creditLimit('student', $rowCredityQuery, 2000);
															creditLimit('regular', $rowCredityQuery, 4500);
															creditLimit('business', $rowCredityQuery, 9000);
															creditLimit('secured', $rowCredityQuery, 1500);
														?>"
	}
				
	//event listener, inside calling above functions when clicked
	window.addEventListener('load', function () {
	document.getElementById('accountCardsButton').addEventListener('click', creditCards);
	document.getElementById('accountLimitButton').addEventListener('click', creditLimit);
	document.getElementById('request').addEventListener('click', function(){
		document.getElementById('request').innerHTML = "We will email you a copy of your credit history";
	});
	});
</script>

<?php	
	mysqli_close($database);//closes the database connection
?>

