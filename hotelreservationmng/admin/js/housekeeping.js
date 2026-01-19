
function toggleForm() {
    var form = document.getElementById("addTaskForm");
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}


function confirmDelete() {
    return confirm("Are you sure you want to delete this task?");
}
