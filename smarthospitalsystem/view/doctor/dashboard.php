<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2>Doctor Dashboard</h2>

    <div class="dashboard-card">

        <h3>Total Appointments</h3>

        <h2><?= count($appointments); ?></h2>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>