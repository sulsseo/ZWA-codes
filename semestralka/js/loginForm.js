/**
 * Created by kuba on 01.11.17.
 */

// function get parameter with event information
function email_check(event) {

    // search @ in email field
    if (email.value.indexOf("@") === -1) {
        // event ignor
        event.preventDefault();
        // email.style.backgroundColor="red";

        email.classList.remove("bg-success");
        email.classList.add("bg-danger");
    } else {
        email.classList.remove("bg-danger");
        email.classList.add("bg-success");
    }
}

var email = document.querySelector("#email");

// check if email is correct
email.addEventListener("blur", email_check);