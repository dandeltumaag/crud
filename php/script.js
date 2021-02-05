// const form = document.getElementById('createdata_form');
// const username = document.getElementById('username');
// const password = document.getElementById('userpassword');
// const button = document.getElementById('submitBtn');
// const errMsg = document.getElementById('errstatus');

// const form2 = document.getElementById('formData')

// if (form2){
//     form2.addEventListener('submit', (e) => {
//         if (confirm("Press a button!")) {
//             form2.submit();
//         } else {
//             e.preventDefault();
//         }
//     });
// }

// if(form){
//     form.addEventListener('submit', (e) => {
//         e.preventDefault();
    
//         checkInputs();
//     });
// }

// function checkInputs() {
//     //get value from the inputs
//     const usernameValue = username.value.trim();
//     const passwordValue = password.value.trim();
//     let unameCheck, emailCheck, pw1, pw2 = false;

//     if(usernameValue === '') {
//         errorMessage = 'Username cannot be blank';
//         errMsg.innerHTML = errorMessage;
//     } else {
//         unameCheck = true;
//     }

//     if (passwordValue === '') {
//         errorMessage = 'Password cannot be blank';
//         errMsg.innerHTML = errorMessage;
//     } else {
//         setSuccessFor(password);
//         pw1 = true;
//     }

//     if (usernameValue === '' && passwordValue === '') {
//         errorMessage = 'Username and Password cannot be blank';
//         errMsg.innerHTML = errorMessage;
//     }

//     //show success message
//     if (unameCheck === true && pw1 === true){
//         form.submit();
//     }
// }

function setErrorFor(input, message) {
    const formControl = input.parentElement; //.form-control
    const small = formControl.querySelector ('small');

    console.log(formControl);
    //add error message inside small
    small.innerText = message;

    //add error class
    formControl.className = 'form_control error' ;
}

function setSuccessFor(input){
    const formControl = input.parentElement; //.form_control
    //add success class
    formControl.className = 'form_control success' ;

}

function isEmail (email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function successMessage() {

    alert("Account Created Successful");
    
}


/* ===============
Registration Form
================*/

const login_form = document.getElementById('login_form')
const login_username = document.getElementById('login-txt_username');
const login_password = document.getElementById('login-txt_password');

login_form.addEventListener('submit', (e)=> {
    e.preventDefault();

    checkLoginInputs();
});

function checkLoginInputs(){
    //get Value of login form
    const login_usernameValue = login_username.value.trim();
    const login_passwordValue = login_password.value.trim();
    let loginUsername, loginPassword = false;

    //check data if blank
    if (login_usernameValue === ''){
        setErrorFor(login_username, 'Username must not be blank');
    } else {
        setSuccessFor(login_username);
        loginUsername = true;
    }

    if (login_passwordValue === ''){
        setErrorFor(login_password, 'password must not be blank');
    } else {
        setSuccessFor(login_password);
        loginPassword = true;
    }

    if (loginUsername === true && loginPassword === true){
        login_form.submit();
    }

}