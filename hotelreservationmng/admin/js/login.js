document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            alert(response.message);

            if (response.success) {
                
                if (response.role === "Admin") {
                    window.location.href = "admindashboard.php";
                } else {
                    window.location.href = "guestdashboard.php";
                }
            }
        }
    };

    var params = "email=" + encodeURIComponent(email) +
        "&password=" + encodeURIComponent(password);

    xhttp.open("POST", "../controller/login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
});
