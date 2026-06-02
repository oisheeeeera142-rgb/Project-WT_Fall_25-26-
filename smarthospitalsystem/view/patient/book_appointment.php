<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="dashboard-card">

        <h3 class="mb-4">
            Book Appointment
        </h3>

        <form method="POST">

            <div class="row">

                <!-- Doctor Select -->

                <div class="col-md-6 mb-3">

                    <label>Select Doctor</label>

                    <select
                        name="doctor_id"
                        id="doctor_id"
                        class="form-select"
                        required>

                        <option value="">
                            Choose Doctor
                        </option>

                        <?php foreach($doctors as $doctor): ?>

                            <option value="<?= $doctor['id']; ?>">

                                <?= $doctor['full_name']; ?>
                                -
                                <?= $doctor['specialization']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Schedule -->

                <div class="col-md-6 mb-3">

                    <label>Available Schedule</label>

                    <select
                        name="schedule_id"
                        id="schedule_id"
                        class="form-select"
                        required>

                        <option value="">
                            Select Schedule
                        </option>

                    </select>

                </div>

                <!-- Appointment Date -->

                <div class="col-md-6 mb-3">

                    <label>Appointment Date</label>

                    <input
                        type="date"
                        name="appointment_date"
                        id="appointment_date"
                        class="form-control"
                        required>

                </div>

                <!-- Appointment Time -->

                <div class="col-md-6 mb-3">

                    <label>Appointment Time</label>

                    <input
                        type="time"
                        name="appointment_time"
                        id="appointment_time"
                        class="form-control"
                        required>

                </div>

                <!-- Notes -->

                <div class="col-md-12 mb-3">

                    <label>Notes</label>

                    <textarea
                        name="notes"
                        class="form-control"
                        rows="4"></textarea>

                </div>

            </div>

            <button class="btn btn-primary">

                Book Appointment

            </button>

        </form>

    </div>

</div>

<script>

document.getElementById('doctor_id')
.addEventListener('change', function () {

    let doctorId = this.value;

    fetch(
        'index.php?page=get-schedules&doctor_id='
        + doctorId
    )

    .then(response => response.json())

    .then(data => {

        let scheduleSelect =
            document.getElementById('schedule_id');

        scheduleSelect.innerHTML =
            '<option value="">Select Schedule</option>';

        data.forEach(schedule => {

            scheduleSelect.innerHTML += `

                <option value="${schedule.id}"
                    data-date="${schedule.available_date}"
                    data-time="${schedule.start_time}">

                    ${schedule.available_date}
                    |
                    ${schedule.start_time}
                    - ${schedule.end_time}

                </option>

            `;
        });
    });
});

/*
|--------------------------------------------------------------------------
| AUTO FILL DATE + TIME
|--------------------------------------------------------------------------
*/

document.getElementById('schedule_id')
.addEventListener('change', function () {

    let selected =
        this.options[this.selectedIndex];

    document.getElementById('appointment_date')
        .value = selected.dataset.date;

    document.getElementById('appointment_time')
        .value = selected.dataset.time;
});

</script>

<?php include 'view/layouts/footer.php'; ?>