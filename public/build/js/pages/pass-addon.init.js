/*
Template Name: Dason - Admin & Dashboard Template
Author:Muestraz
Website: https://Themesdesign.com/
Contact:Muestraz@gmail.com
File: Password Addon Js File
*/

// show password input value
document.getElementById('password-addon').addEventListener('click', function () {
	var passwordInput = document.getElementById("password-input");
	if (passwordInput.type === "password") {
		passwordInput.type = "text";
	} else {
		passwordInput.type = "password";
	}
});