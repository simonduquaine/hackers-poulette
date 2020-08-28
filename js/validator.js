let lastname = document.getElementById('lastname');
let firstname = document.getElementById('firstname');
let email = document.getElementById('email');
const regexEmail = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;

function validStr(string) {
    return /^[A-zÀ-ÿ]+$/g.test(string);
}

function validLastname() {
    if (lastname.value.length > 2 && validStr(lastname.value)) {
        document.getElementById('lastname').style.borderColor = "green";
        lastname.setCustomValidity('');
    } else {
        document.getElementById('lastname').style.borderColor = "red";
        lastname.setCustomValidity('Incorrect Last Name');
    }
}

function validFirstname() {
    if (firstname.value.length > 2 && validStr(firstname.value)) {
        document.getElementById('firstname').style.borderColor = "green";
        firstname.setCustomValidity('');
    } else {
        document.getElementById('firstname').style.borderColor = "red";
        firstname.setCustomValidity('Incorrect First Name');
    }
}

function validEmail() {
    if (regexEmail.test(email.value)) {
        document.getElementById('email').style.borderColor = "green";
        email.setCustomValidity('');
    } else {
        document.getElementById('email').style.borderColor = "red";
        email.setCustomValidity('Inccorect Email');
    }
}