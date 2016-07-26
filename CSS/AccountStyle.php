<style>
#accountContent, #cardsContent, #deactivateContent, #lostContent{
	opacity: 0.7;
    filter: alpha(opacity=70);
	border: solid black 1px;
	border-radius:4px;
	background-color: black;
	color: white;
	text-align: center;
	padding: 20px;
	margin-top: 80px;
	margin-left: 300px;
	margin-right: 300px;
}

#deactivateContent{
	padding-bottom: 40px;
}

#accountOffers{
	padding: 5px 10px;
}

.applyTextBox, .deactivateTextBox, #deactivateTextarea, #lostTextBox{
	width: 270px;
	height: 30px;
	appearance: none;
	box-shadow: none;
	padding-left: 4px;
	outline: none;
	border-radius:3px;
	border: solid 1px;
}

#deactivateTextarea{
	height: 100px;
}

.applyTextBox:focus, .deactivateTextBox:focus, #deactivateTextarea:focus, #lostTextBox:focus{
	outline:none;
    border-color: #ff6666;
	border-radius:4px;
	background-color: white;
}

#accountCardsButton, #accountLimitButton, .cardsButton, #applyButton, #deactivateButton, #lostButton{
	width: 150px;
	background-color:#26734d;
	color: white;
	padding: 7px 14px 7px 14px;
	border: solid #26734d 1px;
	border-radius: 3px
}

#accountCardsButton:hover, #accountLimitButton:hover, .cardsButton:hover, #applyButton:hover, #deactivateButton:hover, #lostButton:hover{
	color: white;
	background-color:#e600e6;
	border-color: #e600e6;
}

#errorMessage{
	color: red;
}

#studentMessage, #regularMessage, #businessMessage, #securityMessage{
	margin-left:200px;
}

#message{
	text-align: left;
}

#accountContent a, #cardsContent a, #lostContent a, #request{
	text-decoration: none;
	color: red;
}

#request{
	cursor: pointer;
}
</style>