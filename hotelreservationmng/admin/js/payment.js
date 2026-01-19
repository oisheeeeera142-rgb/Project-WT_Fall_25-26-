
function toggleForm() {
    var form = document.getElementById("addPaymentForm");
    var button = document.getElementById("switchmotion");

    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
        button.innerHTML = "Hide Add Payment";
    } else {
        form.style.display = "none";
        button.innerHTML = "Add Payment";
    }
}

function confirmDelete() {
    return confirm("Are you sure you want to delete this payment?");
}

function downloadInvoice(paymentId) {
    window.location.href = "invoice.php?payment_id=" + paymentId;
}

