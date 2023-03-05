

let usernameField = document.getElementById("username");
let passwordField = document.getElementById("password");
let buttonConnexion = document.getElementById("divConnexionButton");
let errorLoginMessage = document.getElementById("errorLoginMessage");

if (usernameField !== null && passwordField !== null && buttonConnexion !== null) {
    if (usernameField.value == "" || passwordField.value == "") {
        buttonConnexion.disabled = true;
    } else {
        buttonConnexion.disabled = false;
    }

    usernameField.addEventListener("keyup", function (e) {
        if (usernameField.value == "" || passwordField.value == "") {
            buttonConnexion.disabled = true;
        } else {
            buttonConnexion.disabled = false;
            errorLoginMessage.classList.add("hideElement");
        }
    });

    passwordField.addEventListener("keyup", function (e) {
        if (usernameField.value == "" || passwordField.value == "") {
            buttonConnexion.disabled = true;
        } else {
            buttonConnexion.disabled = false;
            errorLoginMessage.classList.add("hideElement");
        }
    });


    buttonConnexion.addEventListener("click", function (e) {

        if (usernameField.value == "" || passwordField.value == "") {
            errorLoginMessage.classList.remove("hideElement");
        } else {
            errorLoginMessage.classList.add("hideElement");
        }
    });
}
