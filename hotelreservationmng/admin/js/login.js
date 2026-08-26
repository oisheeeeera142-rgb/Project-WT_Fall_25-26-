document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value.trim();
        var msgBox = document.getElementById("loginResult");
        if (!email || !password) {
            msgBox.style.display = "block";
            msgBox.className = "error";
            msgBox.innerText = "Email and password are required";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var response = JSON.parse(this.responseText);
                msgBox.style.display = "block";
                msgBox.innerText = response.message;
                if (response.success) {
                    msgBox.className = "success";
                    if (response.role === "Admin") {
                        window.location.href = "../view/admindashboardh.php";
                    } else {
                        window.location.href = "../view/guestdashboard.php";
                    }
                } else {
                    msgBox.className = "error";
                }
            }
        };
        xhttp.open("POST", "../controller/login.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(
            "email=" + encodeURIComponent(email) +
            "&password=" + encodeURIComponent(password)
        );
    });

});
