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

    <div class="row">

        <?php if(!empty($doctors)): ?>

            <?php foreach($doctors as $doctor): ?>

                <div class="col-md-4 mb-4">

                    <div class="glass-card p-4 text-center h-100">

                        <img src="public/images/doctor1.jpg"
                             class="rounded-circle mb-3"
                             width="120"
                             height="120">

                        <h4>
                            <?= $doctor['full_name']; ?>
                        </h4>

                        <p class="text-primary fw-bold">
                            <?= $doctor['specialization']; ?>
                        </p>

                        <p>
                            <strong>Degree:</strong>
                            <?= $doctor['degree']; ?>
                        </p>

                        <p>
                            <strong>Experience:</strong>
                            <?= $doctor['experience']; ?>
                        </p>

                        <p>
                            <strong>Chamber:</strong>
                            <?= $doctor['chamber_address']; ?>
                        </p>

                        <!-- LOGIN FIRST -->

                        <a href="index.php?page=login"
                           class="btn btn-primary mt-3">

                            Book Appointment

                        </a>

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