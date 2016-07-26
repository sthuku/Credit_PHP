//event listener on load
window.addEventListener("load", function (){
	//calls empty content function, which sets the content to empty
	document.getElementById('studentButton').addEventListener("click", function(){
		emptyContent('regularMessage');//regular message arguement is the id for a div on type of cards page
		emptyContent('businessMessage');
		emptyContent('securityMessage');
		details("studentMessage", "0% for 6 months", "11% for 6 months", "13.40% - 22.40% variable*", "0", "up to $2000");//after all the content is set empty, details function is called to post the student details on click
	});
	
	//repeat for regular card details
	document.getElementById('regularButton').addEventListener("click", function(){
		emptyContent('studentMessage');
		emptyContent('businessMessage');
		emptyContent('securityMessage');
		details("regularMessage", "0% for 6 months", "12% for 6 months", "14.50% - 24.50% variable*", "0", "up to $10000");
	});
	
	//repeat for business card details
	document.getElementById('businessButton').addEventListener("click", function(){
		emptyContent('regularMessage');
		emptyContent('studentMessage');
		emptyContent('securityMessage');
		details("businessMessage", "0% for 6 months", "0% for 6 months", "14.00% - 25.00% variable*", "0", "up to $15000");
	});
	
	//repeat for secured card details
	document.getElementById('securityButton').addEventListener("click", function(){
		emptyContent('regularMessage');
		emptyContent('businessMessage');
		emptyContent('studentMessage');
		details("securityMessage", "0% for 6 months", "7% for 6 months", "9.99% - 14.40% variable*", "0", "up to $3000");
	});
	
}, false);

//function for the card details
function details(message, pApr, bApr, rApr, fee, limit){
	var description = document.getElementById(message);
	description.innerHTML = "<p id = 'message'>Purchases Intro APR: "+pApr+"<br>Balance Transfer Intro APR: "+bApr+"<br>Regular APR: "+rApr+"<br>Annual Fee: $"+fee+"<br>Credit Limit: "+limit+"</p><p><a href = 'ApplyOnline.php'><strong><em>Apply Now</em></strong></a></p>";
}

//function 
function emptyContent(id){
	document.getElementById(id).innerHTML = "";
}
