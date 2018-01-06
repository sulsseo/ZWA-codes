/**
 * Created by kuba on 01.11.17.
 */

// console.log("test");

// function get parameter with event information
function kontrola(event) {

    // search @ in email field
    if (email.value.indexOf("@") === -1) {
        // event ignor
        event.preventDefault();
        // email.style.backgroundColor="red";

        // more elegant way is to change class
        // email.className = "chyba";
        email.classList.add("failure");
    } else {
        email.classList.remove("failure");
    }
}


var form = document.querySelector("form");

// add event
form.addEventListener("submit", kontrola);

// var email = document.querySelector("[id=email]");
var email = document.querySelector("#email");
email.addEventListener("blur", kontrola);