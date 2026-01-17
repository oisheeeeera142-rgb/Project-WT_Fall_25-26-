
function handlePaymentSubmit() {
    m
    var method = document.getElementById("method").value.trim();
    var status = document.getElementById("status").value.trim();
    var datetime = document.getElementById("datetime").value.trim();

    var errorDiv = document.getElementById("paymentError");
    var outputDiv = document.getElementById("paymentOutput");


    errorDiv.innerHTML = "";
    outputDiv.innerHTML = "";


    if (method === "" || status === "" || datetime === "") {
        errorDiv.innerHTML = "Please fill in all fields.";
        return false;
    }
    var validStatuses = ["Paid", "Pending", "Failed"];
    if (!validStatuses.includes(status)) {
        errorDiv.innerHTML = "Invalid status selected.";
        return false;
    }


    var now = new Date();
    var enteredDate = new Date(datetime);
    if (enteredDate > now) {
        errorDiv.innerHTML = "DateTime cannot be in the future.";
        return false;
    }


    outputDiv.innerHTML = `
<strong>Payment Saved!</strong><br><br>
Method: ${method}<br>
Status: ${status}<br>
DateTime: ${datetime}<br>
`;

    return false;
}