<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2>Patient Dashboard</h2>

    <div class="row">

        <div class="col-md-4">

            <div class="dashboard-card">

                <h4>Total Appointments</h4>

                <h2><?= count($appointments); ?></h2>

            </div>

        </div>

        <div class="col-md-4">

            <div class="dashboard-card">

                <h4>Total Doctors</h4>

                <h2><?= count($doctors); ?></h2>

            </div>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>