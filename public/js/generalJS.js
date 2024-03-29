
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
const deleteFirstBtn = document.getElementById("deleteUserFirstButton");
const divDeleteUser = document.getElementById("deleteUSerContainer");
const deleteUserReturnButton = document.getElementById("deleteUserReturnButton");

if(deleteFirstBtn !== null){
    deleteFirstBtn.addEventListener("click",function(e){
        deleteFirstBtn.classList.add("hideElement");
        divDeleteUser.classList.remove("hideElement");
    });

    deleteUserReturnButton.addEventListener("click",function(e){
        deleteFirstBtn.classList.remove("hideElement");
        divDeleteUser.classList.add("hideElement");
    })


}



/******* RESPONSIVE NAV PART */
const navResponsiveButton = document.querySelector(".burger_list");
const topNavList = document.querySelector(".topnav_list");

let isOpenNav = 0;

navResponsiveButton.addEventListener("click",function(e){
    if(isOpenNav === 0){
        topNavList.style.display="flex";
        isOpenNav = 1;
    }else{
        topNavList.style.display="none";
        isOpenNav = 0;
    }
    
});