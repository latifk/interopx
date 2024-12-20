function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    // document.cookie = name + "=" + (value || "") + expires + "; path=/";
    document.cookie = name + "=" + value + ";" + expires + ";path=/;secure;samesite=strict";

}

function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
    return null;
}

document.addEventListener('DOMContentLoaded', function() {
    if (document.referrer) {
        setCookie('referrerURL', document.referrer, 7); // Store for 7 days
        // // Usage
        // const referrerURL = getCookie('referrerURL');
        // console.log(referrerURL);
        // alert(referrerURL);
    }
});