/**
 * Created by kuba on 01.11.17.
 */

// function get parameter with event information
function kontrola(event) {

    // search @ in email field
    if (email.value.indexOf("@") === -1) {
        // event ignor
        event.preventDefault();
        // email.style.backgroundColor="red";

        email.classList.remove("succ");
        email.classList.add("fail");
    } else {
        email.classList.remove("fail");
        email.classList.add("succ");
    }
}

var email = document.querySelector("#email");

// check if email is correct
email.addEventListener("blur", kontrola);