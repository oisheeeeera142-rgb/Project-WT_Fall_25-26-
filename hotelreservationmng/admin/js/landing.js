document.addEventListener("DOMContentLoaded", function () {
    console.log("Landing page loaded");

    // Register Button → সরাসরি Registration Page এ যাবে
    document.getElementById("registerBtn").addEventListener("click", function () {
        window.location.href = "regh.php";
    });

    // Login Button → সরাসরি Login Page এ যাবে
    document.getElementById("loginBtn").addEventListener("click", function () {
        window.location.href = "loginh.php";
    });
});
