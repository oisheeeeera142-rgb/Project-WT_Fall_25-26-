document.addEventListener("DOMContentLoaded", function () {
    console.log("Landing page loaded");

    document.getElementById("registerBtn").addEventListener("click", function () {
        window.location.href = "regh.php";
    });


    document.getElementById("loginBtn").addEventListener("click", function () {
        window.location.href = "loginh.php";
    });
});
