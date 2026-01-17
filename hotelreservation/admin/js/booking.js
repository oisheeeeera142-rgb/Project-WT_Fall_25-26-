function toggleForm() {
    var form = document.getElementById("addBookingForm"); // ✅ সঠিক ID
    var button = document.getElementById("switchmotion");

    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
        button.innerHTML = "Hide Add Booking";
    } else {
        form.style.display = "none";
        button.innerHTML = "Add Booking";
    }
}

function confirmDelete() {
    return confirm("Are you sure you want to delete this booking?");
}
