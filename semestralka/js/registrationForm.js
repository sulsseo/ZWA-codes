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

        email.classList.remove("succ");
        email.classList.add("fail");
    } else {
        email.classList.remove("fail");
        email.classList.add("succ");
    }
}

function pass_check(event) {
    // both are the same?
    if (pass.value === pass2.value && pass !== "" && pass.value.length >= 8) {
        pass.classList.remove("fail");
        pass2.classList.remove("fail");

        pass.classList.add("succ");
        pass2.classList.add("succ");
    } else {
        event.preventDefault();

        pass.classList.remove("succ");
        pass2.classList.remove("succ");

        pass.classList.add("fail");
        pass2.classList.add("fail");
    }

    console.log(pass.value); console.log(pass2.value);
}

var form = document.querySelector("form");

// add event
// form.addEventListener("submit", kontrola);

var email = document.querySelector("#email");
var pass = document.querySelector("[id=password]");
var pass2 = document.querySelector("[id=password2]");


// check if email is correct
email.addEventListener("blur", email_check);

// check if both passwords are the same
pass2.addEventListener("blur", pass_check);