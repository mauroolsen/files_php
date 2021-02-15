function validar() {
    let pass1 = document.getElementById("pass1").value;
    let pass2 = document.getElementById("pass2").value;
    let name = document.getElementById("nameSign").value;
    let signin = document.getElementById("signin");
    if (validarPass(pass1, pass2) && name.length >= 7) signin.disabled = false;
    else signin.disabled = true;
}

function validarPass(pass, pass2) {
    let response = false;
    if (pass == pass2 && pass != "" && pass.length >= 7) response = true;
    return response;
}

function validarLogin() {
    let pass = document.getElementById("pass").value;
    let name = document.getElementById("username").value;
    let login = document.getElementById("login");
    if (
        pass != '' &&
        name != '' &&
        pass.length >= 7 &&
        name.length >= 7
    ) login.disabled = false;
    else login.disabled = true;
}