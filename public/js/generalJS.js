
/******* LOGIN PART **/ 
const usernameField = document.getElementById("username");
const passwordField = document.getElementById("password");
const buttonConnexion = document.getElementById("divConnexionButton");
const errorLoginMessage = document.getElementById("errorLoginMessage");

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

/***** DELETE USER PART */
const deleteFirstBtn = getElementById("deleteUserFirstButton");
const divDeleteUser = getElementById("deleteUSerContainer");

if(deleteFirstBtn !== null){
    deleteFirstBtn.addEventListener("click",function(e){
        divDeleteUser.classList.remove("hideElement");
    });
}

