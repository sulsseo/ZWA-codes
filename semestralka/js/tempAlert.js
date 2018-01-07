function tempAlert(msg, duration) {
    var el = document.createElement("div");
    el.setAttribute("style", 
    "text-size:70px;position:abolute;top:40%;left:20%;background-color:white;");
    el.innerHTML = msg;
    setTimeout(function () {
        el.parentNode.removeChild(el);
        
    }, duration);
    document.body.appendChild(el);
}

tempAlert("Uspesne prihlasen", 3000);
// setTimeout(function() {
//     window.location="http://www.tutorialspoint.com";
// }, 4000);