document.getElementById("regForm").addEventListener("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    var msgBox = document.getElementById("msgBox");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            var response = JSON.parse(this.responseText);

            msgBox.style.display = "block";
            msgBox.innerText = response.message;

            if (response.success) {
                msgBox.className = "success";
                setTimeout(function () {
                    window.location.href = "../view/loginh.php";
                }, 1000);

            } else {
                msgBox.className = "error";
            }
        }
    };
    xhttp.open("POST", "../controller/reg.php", true);
    xhttp.send(formData);
});
