function validateForm() {
    var name = document.getElementById("name").value.trim();
    var password = document.getElementById("password").value.trim();
    var email = document.getElementById("email").value.trim();
    var role = document.getElementById("role").value;
    if (name === "") {
        alert("Name cannot be empty!");
        return false;
    }
    var namePattern = /^[A-Za-z][A-Za-z.\-]*(\s+[A-Za-z.\-]+)+$/;
    if (!namePattern.test(name)) {
        alert("Name must start with a letter, contain at least two words, and only include letters, period, or dash.");
        return false;
    }
    if (password === "") {
        alert("Password cannot be empty!");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long!");
        return false;
    }
    if (email === "") {
        alert("Email cannot be empty!");
        return false;
    }
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address!");
        return false;
    }
    if (role === "") {
        alert("Please select a role!");
        return false;
    }
    return true;
}   
