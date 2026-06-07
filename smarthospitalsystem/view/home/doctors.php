<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/navbar.php'; ?>

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            Our Doctors
        </h1>

        <p class="text-muted">
            Meet Our Professional Specialist Doctors
        </p>

    </div>

    <div class="row justify-content-center g-4">

        <?php if(!empty($doctors)): ?>

           <?php foreach($doctors as $doctor): ?>

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

        <div class="card shadow border-0 h-100">

            <div class="card-body text-center">

                <i class="fas fa-user-doctor fa-4x text-primary mb-3"></i>

                <h5 class="fw-bold">
                    <?= htmlspecialchars($doctor['full_name']); ?>
                </h5>

                <p class="text-primary fw-bold">
                    <?= htmlspecialchars($doctor['specialization']); ?>
                </p>

                <span class="badge bg-success mb-3">
                    Available
                </span>

                <hr>

                <p>
                    <strong>Degree:</strong><br>
                    <?= htmlspecialchars($doctor['degree'] ?? 'N/A'); ?>
                </p>

                <p>
                    <strong>Experience:</strong><br>
                    <?= htmlspecialchars($doctor['experience'] ?? 'N/A'); ?>
                </p>

                <p>
                    <strong>Chamber:</strong><br>
                    <?= htmlspecialchars($doctor['chamber_address'] ?? 'N/A'); ?>
                </p>

                <a href="index.php?page=book-appointment&doctor_id=<?= $doctor['id']; ?>"
                   class="btn btn-primary w-100">

                    Book Appointment

                </a>

            </div>

        </div>

    </div>

<?php endforeach; ?>

        <?php else: ?>

            <div class="col-md-12">

                <div class="alert alert-warning text-center">

                    No Doctors Available

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>