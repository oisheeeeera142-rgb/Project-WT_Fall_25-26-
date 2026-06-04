<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Patient Dashboard</h2>

            <p class="text-muted">
                Welcome back,
                <?= htmlspecialchars($_SESSION['full_name'] ?? 'Patient'); ?>
            </p>
        </div>

        <div>
            <a href="index.php?page=book-appointment" class="btn btn-primary">
                <i class="fas fa-calendar-plus"></i>
                Book Appointment
            </a>
        </div>

    </div>

    <!-- Search Doctor -->
    <div class="dashboard-card mb-4">

        <form method="GET">
            <input type="hidden" name="page" value="patient-dashboard">

            <div class="row">

                <div class="col-md-10 mb-2">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search Doctor By Name or Specialization">
                </div>

                <div class="col-md-2 mb-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i>
                        Search
                    </button>
                </div>

            </div>
        </form>

    </div>

    <!-- Dashboard Stats -->
    <div class="row">

        <!-- Appointments -->
        <div class="col-md-4 mb-4">

            <a href="index.php?page=appointment-history"
               style="text-decoration:none;color:inherit;">

                <div class="dashboard-card text-center">

                    <i class="fas fa-calendar-check fa-3x text-primary mb-3"></i>

                    <h5>Total Appointments</h5>
                    <h2 id="appointmentCount">
                        <?= count($appointments ?? []); ?>
                    </h2>

                </div>

            </a>

        </div>

        <!-- Doctors -->
        <div class="col-md-4 mb-4">

            <a href="#doctor-list"
               style="text-decoration:none;color:inherit;">

                <div class="dashboard-card text-center">

                    <i class="fas fa-user-doctor fa-3x text-success mb-3"></i>

                    <h5>Total Doctors</h5>
                    <h2 id="doctorCount">
                        <?= count($doctors ?? []); ?>
                    </h2>

                </div>

            </a>

        </div>

        <!-- Prescriptions -->
        <div class="col-md-4 mb-4">

            <a href="index.php?page=patient-prescriptions"
               style="text-decoration:none;color:inherit;">

                <div class="dashboard-card text-center">

                    <i class="fas fa-file-medical fa-3x text-danger mb-3"></i>

                    <h5>Prescriptions</h5>
                    <h2 id="prescriptionCount">
                        <?= count($prescriptions ?? []); ?>
                    </h2>

                </div>

            </a>

        </div>

    </div>

    <!-- Doctor List -->
    <div class="dashboard-card mt-4" id="doctor-list">

        <h4 class="fw-bold mb-4">Available Doctors</h4>

        <div class="row">

            <?php if (!empty($doctors)): ?>

                <?php foreach ($doctors as $doctor): ?>

                    <div class="col-md-4 mb-4">

                        <div class="glass-card p-3 h-100">

                            <h5>
                                <?= htmlspecialchars($doctor['full_name']); ?>
                            </h5>

                            <p class="text-primary fw-bold">
                                <?= htmlspecialchars($doctor['specialization']); ?>
                                <span class="badge bg-success">Available</span>
                            </p>

                            <p>
                                <strong>Degree:</strong>
                                <?= htmlspecialchars($doctor['degree'] ?? 'N/A'); ?>
                            </p>

                            <p>
                                <strong>Experience:</strong>
                                <?= htmlspecialchars($doctor['experience'] ?? 'N/A'); ?>
                            </p>

                            <p>
                                <strong>Chamber:</strong>
                                <?= htmlspecialchars($doctor['chamber_address'] ?? 'N/A'); ?>
                            </p>

                            <a href="index.php?page=book-appointment&doctor_id=<?= $doctor['id']; ?>"
                               class="btn btn-primary btn-sm">
                                Book Appointment
                            </a>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-md-12">
                    <div class="alert alert-warning">
                        No Doctors Found
                    </div>
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>