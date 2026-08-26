<button id="switchmotion" onclick="toggleForm()">Add Payment</button>

<div id="addPaymentForm" style="display:none;">
    <form>
        <!-- form fields -->
    </form>
</div>

<script>
function toggleForm() {
    var form = document.getElementById("addPaymentForm");
    var button = document.getElementById("switchmotion");

    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
        button.textContent = "Hide Add Payment";
    } else {
        form.style.display = "none";
        button.textContent = "Add Payment";
    }
}
</script>
