function validateLogin() {
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    var password = document.getElementById("role").value();

    if (email === "" || password === "" || role == "") {
        alert("Email , Password  and role are required!");
        return false;
    }
    return true;
}
