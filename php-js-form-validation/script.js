// SELECTING ALL TEXT ELEMENTS
var username = document.forms['vform']['username'];
var email = document.forms['vform']['email'];
var password = document.forms['vform']['password'];
var password_confirm = document.forms['vform']['password_confirm'];

//**********************************************************************

// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');

//**********************************************************************

// SETTING ALL EVENT LISTENERS
username.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
// validation function

//********************************************************************** */

function Validate() {
  // username cannot be empty
  if (username.value == '') {
    username.style.border = '5px solid red';
    document.getElementById('username_div').style.color = 'red';
    name_error.textContent = 'Username is required';
    username.focus();
    return false;
  }
  // username must be over 6 characters
  if (username.value.length < 6) {
    username.style.border = '5px solid red';
    document.getElementById('username_div').style.color = 'red';
    name_error.textContent = 'Username must be at least 6 characters';
    username.focus();
    return false;
  }
  // email cannot be empty
  if (email.value == '') {
    email.style.border = '5px solid red';
    document.getElementById('email_div').style.color = 'red';
    email_error.textContent = 'Email is required';
    email.focus();
    return false;
  }

  // password cannot be empty
  if (password.value == '') {
    password.style.border = '5px solid red';
    password_confirm.style.border = '5px solid red';
    document.getElementById('password_div').style.color = 'red';
    document.getElementById('pass_confirm_div').style.color = 'red';
    password_confirm.style.border = '5px solid red';
    password_error.textContent = 'Password is required';
    password.focus();
    return false;
  }

  // the two passwords must match
  if (password.value != password_confirm.value) {
    password.style.border = '5px solid red';
    document.getElementById('pass_confirm_div').style.color = 'red';
    password_confirm.style.border = '5px solid red';
    password_error.innerHTML = 'The two passwords do not match';
    return false;
  }
}
//********************************************************************** */

// event handler functions

function nameVerify() {
  // if username is not empty
  if (username.value != '') {
    username.style.border = '1px solid green';
    document.getElementById('username_div').style.color = 'green';
    name_error.innerHTML = '';
    return true;
  }
}

//********************************************************************** */

function emailVerify() {
  //email is not empty
  if (email.value != '') {
    email.style.border = '5px solid green';
    document.getElementById('email_div').style.color = 'green';
    email_error.innerHTML = '';
    return true;
  }
}

//********************************************************************** */

function passwordVerify() {
  // password is not empty
  if (password.value != '') {
    password.style.border = '1px solid green';
    document.getElementById('pass_confirm_div').style.color = 'green';
    document.getElementById('password_div').style.color = 'green';
    password_error.innerHTML = '';
    return true;
  }
  // both passwords are the same
  if (password.value === password_confirm.value) {
    password.style.border = '1px solid green';
    document.getElementById('pass_confirm_div').style.color = 'green';
    password_error.innerHTML = '';
    return true;
  }
}

//********************************************************************** */
