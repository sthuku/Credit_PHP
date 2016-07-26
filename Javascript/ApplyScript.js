//function for validation
function validate(){
	var salary = variable('salary').value;//calls the variable function to get the elements by id
	var occupation = variable('occupation').value;
	var cardType = variable('cardType').value;
	
	//if not selected anything on apply now page's drop down lists returns false, form will not be submit onsubmit
	if(occupation != "select"){
		if(salary != "select"){
			if(cardType != "select"){
				return true;
			} else{
				document.getElementById('errorMessage').innerHTML =  "Please Select the Type of Card you are applying for";
				return false;
			}
		}else{
			document.getElementById('errorMessage').innerHTML =  "Please Select your Salary";
			return false;
		}
	}else{
		document.getElementById('errorMessage').innerHTML = "We need to know what you do, please tell us what you do";
		return false;
	}
}

//variable function to get the elements by id
function variable(id){
	return document.getElementById(id);
}

//function for validating inside drop down list, if work drop down list is set to some value, values in other drop down list values will change
function workValidate(){
	if(variable('occupation').value == "work"){
		variable('studentType').disabled = true;//variable is to get elements by id
		variable('businessType').disabled = false;//if work is set, business type card can not be selected
		variable('noSalary').disabled = true;
		variable('cardType').selectedIndex = 0;//if disabled values already selected before work is selected, selected card value will be changed to default 
	}
	
	if(variable('occupation').value == "retired"){
		variable('studentType').disabled = true;
		variable('businessType').disabled = true;
		variable('regularType').disabled = false;
		variable('noSalary').disabled = true;
		variable('cardType').selectedIndex = 0;
	}
	
	if(variable('occupation').value == "business"){
		variable('studentType').disabled = true;
		variable('businessType').disabled = false;
		variable('regularType').disabled = false;
		variable('noSalary').disabled = true;
		variable('cardType').selectedIndex = 0;
	}
	
	if(variable('occupation').value == "student"){
		variable('studentType').disabled = false;
		variable('businessType').disabled = true;
		variable('regularType').disabled = true;
		variable('noSalary').disabled = false;
		variable('cardType').selectedIndex = 0;
	}
}