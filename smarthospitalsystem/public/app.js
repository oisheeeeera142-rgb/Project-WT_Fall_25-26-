/* =========================
   DOM READY
========================= */
document.addEventListener("DOMContentLoaded", function () {

    /* =========================
       Sidebar Toggle
    ========================= */
    const sidebarToggle = document.querySelector(".sidebar-toggle");
    const sidebar = document.querySelector(".sidebar");

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
        });
    }

    /* =========================
       SweetAlert Flash Messages
    ========================= */
    const successMessage = document.querySelector("#success-message");
    const errorMessage = document.querySelector("#error-message");

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: successMessage.value,
            showConfirmButton: false,
            timer: 2000
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: errorMessage.value,
            showConfirmButton: false,
            timer: 2000
        });
    }

    /* =========================
       Register Role Toggle
    ========================= */
    const roleSelect = document.getElementById("role");
    const doctorFields = document.getElementById("doctorFields");

    if (roleSelect && doctorFields) {
        roleSelect.addEventListener("change", function () {
            doctorFields.style.display =
                (this.value === "doctor") ? "block" : "none";
        });
    }

    /* =========================
       Appointment Filter
    ========================= */
    const filterInput = document.getElementById("appointmentFilter");

    if (filterInput) {
        filterInput.addEventListener("keyup", function () {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                row.style.display =
                    row.innerText.toLowerCase().includes(value)
                        ? ""
                        : "none";
            });
        });
    }

    /* =========================
       Doctor Schedule Load
    ========================= */
    const doctorSelect = document.getElementById("doctorSelect");
    const scheduleSelect = document.getElementById("scheduleSelect");

    if (doctorSelect && scheduleSelect) {

        doctorSelect.addEventListener("change", function () {

            let doctorId = this.value;

            fetch("index.php?page=get-schedules&doctor_id=" + doctorId)
                .then(res => res.json())
                .then(data => {

                    scheduleSelect.innerHTML =
                        '<option value="">Select Schedule</option>';

                    data.forEach(schedule => {

                        let option = document.createElement("option");

                        option.value = schedule.id;
                        option.text =
                            schedule.available_date +
                            " | " +
                            schedule.start_time +
                            " - " +
                            schedule.end_time;

                        option.setAttribute("data-date", schedule.available_date);
                        option.setAttribute("data-time", schedule.start_time);

                        scheduleSelect.appendChild(option);
                    });

                });
        });

        scheduleSelect.addEventListener("change", function () {

            let selected = this.options[this.selectedIndex];

            document.getElementById("appointmentDate").value =
                selected.getAttribute("data-date");

            document.getElementById("appointmentTime").value =
                selected.getAttribute("data-time");
        });
    }

});