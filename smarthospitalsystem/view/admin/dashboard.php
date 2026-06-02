<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2 class="mb-4">
        Admin Dashboard
    </h2>

    <div class="row">

        <!-- TOTAL DOCTORS -->

        <div class="col-md-4 mb-4">

            <div class="dashboard-card text-center">

                <h4>Total Doctors</h4>

                <h2>
                    <?php echo $totalDoctors; ?>
                </h2>

            </div>

        </div>

        <!-- TOTAL PATIENTS -->

        <div class="col-md-4 mb-4">

            <div class="dashboard-card text-center">

                <h4>Total Patients</h4>

                <h2>
                    <?php echo $totalPatients; ?>
                </h2>

            </div>

        </div>

        <!-- TOTAL APPOINTMENTS -->

        <div class="col-md-4 mb-4">

            <div class="dashboard-card text-center">

                <h4>Total Appointments</h4>

                <h2>
                    <?php echo $totalAppointments; ?>
                </h2>

            </div>

        </div>

    </div>

    <!-- CHART -->

    <div class="dashboard-card mt-4">

        <h4 class="mb-4">
            Hospital Statistics
        </h4>

        <canvas id="appointmentChart"></canvas>

    </div>

</div>

<!-- CHART JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('appointmentChart'), {

    type: 'bar',

    data: {

        labels: [
            'Doctors',
            'Patients',
            'Appointments'
        ],

        datasets: [{

            label: 'Hospital Statistics',

            data: [
                <?php echo $totalDoctors; ?>,
                <?php echo $totalPatients; ?>,
                <?php echo $totalAppointments; ?>
            ]

        }]
    }

});

</script>

<?php include 'view/layouts/footer.php'; ?>