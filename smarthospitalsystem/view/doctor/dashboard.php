<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2 class="mb-4">Doctor Dashboard</h2>

    <div class="row">

        <!-- Total Appointments -->
        <div class="col-md-4">

            <div class="dashboard-card text-center">

                <h5>Total Appointments</h5>

                <h2>
                    <?= count($appointments); ?>
                </h2>

            </div>

        </div>

        <!-- Pending Appointments -->
        <div class="col-md-4">

            <div class="dashboard-card text-center">

                <h5>Pending Appointments</h5>

                <h2>
                  <?= $pendingAppointments ?? 0; ?>
                </h2>

            </div>

        </div>

        <!-- Approved Appointments -->
        <div class="col-md-4">

            <div class="dashboard-card text-center">

                <h5>Approved Appointments</h5>

                <h2>
                    <?= $approvedAppointments ?? 0; ?>
                </h2>

            </div>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>