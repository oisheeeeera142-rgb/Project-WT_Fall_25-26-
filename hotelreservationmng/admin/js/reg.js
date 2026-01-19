document.getElementById("regForm").addEventListener("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                var response = JSON.parse(this.responseText);
                alert(response.message);
                if (response.success) {
                    window.location.href = "loginh.php";
                }
            } else {
                alert("Something went wrong. Please try again.");
            }
        }
    };

    xhttp.open("POST", "../controller/reg.php", true);
    xhttp.send(formData);
});

