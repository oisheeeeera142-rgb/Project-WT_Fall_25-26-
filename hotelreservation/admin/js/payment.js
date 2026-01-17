// ফর্ম toggle করার জন্য
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

// Delete করার আগে confirm message
function confirmDelete() {
    return confirm("Are you sure you want to delete this payment?");
}

// Invoice / Billing Report download trigger
function downloadInvoice(paymentId) {
    // এখানে backend এ একটি PHP script থাকবে যা invoice generate করবে
    // উদাহরণস্বরূপ: invoice.php?payment_id=123
    window.location.href = "invoice.php?payment_id=" + paymentId;
}


function downloadReport() {
    window.location.href = "report.php";
}
